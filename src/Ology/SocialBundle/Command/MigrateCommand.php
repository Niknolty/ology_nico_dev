<?php

namespace Ology\SocialBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Ology\SocialBundle\Entity\Rating;
use Ology\SocialBundle\Entity\Genre;
use Ology\SocialBundle\Entity\ParentalRating;
use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\DAO\PostDAO;
use Ology\SocialBundle\Entity\PostsOlogies;
use Ology\SocialBundle\Entity\PostsChannels;
use Ology\SocialBundle\Entity\PostType;
use Ology\SocialBundle\Entity\User;
use PDO;
use Ology\SocialBundle\Utility\ImagickService;
use Ology\SocialBundle\Utility\Slug;



class MigrateCommand extends ContainerAwareCommand
{
    // change the timeout value in php.ini before importing
    protected $drupal_host;
    protected $drupal_db;
    protected $drupal_user;
    protected $drupal_pass;
    protected $drupal_image_path; // = '/var/www/ology2/sites/default/files/';
    protected $symfony_image_path; // = '/var/www/ology4/web/bundles/ologysocial/up/img/';
    protected $symfony_image_path_small; // = '/bundles/ologysocial/up/img/';

    protected $post_dir = 'post/';
    protected $post_prefix = 'post_';
    protected $cite_dir = 'cite/';
    protected $cite_prefix = 'cite_';
    protected $embedded_dir = 'embedded/';
    protected $embedded_prefix = 'embedded_';
    
    protected $default_first_channel_id; // = 10;
    protected $default_author_id; // = 1;
    protected $default_ology_id; // = 1;

    protected $logPath = '/tmp/migration.log';
    protected $prev_type = 'message';
    protected $_ch; // curl
    protected $_em; // Container
    protected $ct_images; // image content-types
    protected $authors; // authors list
    protected $movie_genres; // genres list
    protected $movie_parental_ratings; // parental_ratings list
    protected $movie_channels; // channels list
    protected $movie_ratings; //ratings list

    
    protected function configure()
    {
        parent::configure();

        $this
                ->setName('ology:migrate')
                ->setDescription('Migrate data from drupal 6')
                ->addArgument('call', InputArgument::REQUIRED, 'Call_method')
                
                ->addArgument('drupal_host', InputArgument::REQUIRED, 'Drupal_host')
                ->addArgument('drupal_db', InputArgument::REQUIRED, 'Drupal_db')
                ->addArgument('drupal_user', InputArgument::REQUIRED, 'Drupal_user')
                ->addArgument('drupal_pass', InputArgument::REQUIRED, 'Drupal_pass')
                
                ->addArgument('drupal_image_path', InputArgument::REQUIRED, 'Drupal_image_path')
                ->addArgument('symfony_image_path', InputArgument::REQUIRED, 'Symfony_image_path')
                ->addArgument('symfony_image_path_small', InputArgument::REQUIRED, 'Symfony_image_path_small')
                
                ->addArgument('default_first_channel_id', InputArgument::REQUIRED, 'Default_first_channel_id')
                ->addArgument('default_author_id', InputArgument::REQUIRED, 'default_author_id')
                ->addArgument('default_ology_id', InputArgument::REQUIRED, 'default_ology_id')
                
                ->addArgument('offset', InputArgument::OPTIONAL, 'Offset')
                ->addArgument('row', InputArgument::OPTIONAL, 'Row')
                //->addOption('user', 'u', InputOption::VALUE_OPTIONAL, 'Username', '')
                //->addOption('passwd', 'p', InputOption::VALUE_OPTIONAL, 'Password', '')
        ;
    }
    
//    /**
//    * Initialize whatever variables you may need to store beforehand, also load
//        * Doctrine from the Container
//    */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output); //initialize parent class method        
        
        $this->drupal_host = $input->getArgument('drupal_host');
        $this->drupal_db = $input->getArgument('drupal_db');
        $this->drupal_user = $input->getArgument('drupal_user');
        $this->drupal_pass = $input->getArgument('drupal_pass');
        
        $this->drupal_image_path = $input->getArgument('drupal_image_path');
        $this->symfony_image_path = $input->getArgument('symfony_image_path');
        $this->symfony_image_path_small = $input->getArgument('symfony_image_path_small');
        
        $this->default_first_channel_id = $input->getArgument('default_first_channel_id');
        $this->default_author_id = $input->getArgument('default_author_id');
        $this->default_ology_id = $input->getArgument('default_ology_id');
        
        $this->_em = $this->getContainer()->get('doctrine')->getEntityManager(); 
        $this->_ch = curl_init();
        $this->full_log = fopen('/tmp/full_import_log.log', 'a');        
        $configuration = $this->_em->getConnection()->getConfiguration();
        $configuration->setSQLLogger(null); 
        
        $this->ct_images = array(
                            'image/gif', //: GIF image; Defined in RFC 2045 and RFC 2046
                            'image/jpeg', //: JPEG JFIF image; Defined in RFC 2045 and RFC 2046
                            'image/pjpeg', //: JPEG JFIF image; Associated with Internet Explorer; Listed in ms775147(v=vs.85) - Progressive JPEG, initiated before global browser support for progressive JPEGs (Microsoft and Firefox).
                            'image/png', //: Portable Network Graphics; Registered,[8] Defined in RFC 2083
                            'image/svg+xml', //: SVG vector image; Defined in SVG Tiny 1.2 Specification Appendix M
                            'image/tiff', //: Tag Image File Format (only for Baseline TIFF); Defined in RFC 3302
                            'image/vnd.microsoft.icon', //: ICO image; Registered[9]
                            'image/x-bitmap',
                            'image/bmp'
                            );
        
        // 'Movie Genres' (drupal id=16)  <-> 'Genres'
        // id   Name            <->     id  Name
        // 5763	Action/Adventure        1   Action/Adventure   
        // 5764	Animation               2   Animation
        // 8740	Biopic                  3   Biopic
        // 5765	Comedy                  4   Comedy
        // 5766	Documentary             5   Documentary
        // 5767	Drama                   6   Drama
        // 5770	Family                  7   Family
        // 5768	Foreign                 8   Foreign
        // 5769	Horror                  9   Horror
        // 9343	Musicals                10  Musicals
        // 5771	Romance                 11  Romance
        // 5772	Sci-Fi/Fantasy          12  Sci-Fi/Fantasy
        // 8739	Silent                  13  Silent
        // 5773	Thriller                14  Thriller
        $this->movie_genres = array(
                    5763 => 1,
                    5764 => 2,
                    8740 => 3,
                    5765 => 4,
                    5766 => 5,
                    5767 => 6,
                    5770 => 7,
                    5768 => 8,
                    5769 => 9,
                    9343 => 10,
                    5771 => 11,
                    5772 => 12,
                    8739 => 13,
                    5773 => 14
        );
        // 'Movie Parental Ratings' (drupal id=19) <-> 'ParentalRatings'
        // id   Name    <-> id   Name
        //                  -1	N/A
        //                  1	None
        // 7499	G           2	G
        // 7503	NC-17       3	PG
        // 7500	PG          4	PG-13
        // 7501	PG-13       5	R
        // 7502	R           6	NC-17        
        $this->movie_parental_ratings = array(
                    'NULL' => 1,
                    7499 => 2,
                    7503 => 3,
                    7500 => 4,
                    7501 => 5,
                    7502 => 6
        ); 			        
        // 'Subchannel Pages' (drupal id=19) <-> 'Channels'
        // id       Name                <-> id  Name
        //                                  1	Film
        //                                  6	Geek
        // 17665    Arts
        // 26129    Breaking Dawn
        // 14       Celebs and Gossip       4	Celebs
        // 21541    Cheese
        // 17303    Dew
        // 15       Fashion and Beauty      5	Fashion
        // 23831    First
        // 25904    Gifts
        // 11066    Humor                   7	Humor
        // 12       Music                   3	Music
        // 19044    Politics                9	Politics
        // 13       Screen                  1   film
        // 27559    Shake Things Up
        // 14924    Sports                  8	Sports
        // 16932    Summer
        // 16703    Summer Test
        // 17       Technology              6 geek
        // 15919    Truth
        // 20019    TV                      2	TV
        // 18235    Vampire
        //                                  10	Other        
        $this->movie_channels = array(
                        17665 => 10,
                        26129 => 10,
                        14 => 4,
                        21541 => 10,
                        17303 => 10,
                        15 => 5,
                        23831 => 10,
                        25904 => 10,
                        11066 => 7,
                        12 => 3,
                        19044 => 9,
                        13 => 1,
                        27559 => 10,
                        14924 => 8,
                        16932 => 10,
                        16703 => 10,
                        17 => 6,
                        15919 => 10,
                        20019 => 2,
                        18235 => 10
        );
        
        $this->movie_ratings = array(
                        'NULL' => -1, // N/A
                        20 => 1, //	A+
			10 => 2, //	A
			0 => 3, //	A-
			50 => 4, //	B+
			40 => 5, //	B
			30 => 6, //	B-
			80 => 7, //	C+
			70 => 8, //	C
			60 => 9, //	C-
			90 => 10, //    D
			100 => 11, //	F
        );
        
        // Emails from my.Ology       
        //Firstname Lastname    email in ology.com, id in my.Ology
        //Sharon    Tharp       sharon@ology.com, 30
        //+ Anthony Schneck     anthony.schneck@ology.com, 99
        //+ Bison   Messink     bison.messink@ology.com, 3791
        //Noah      Rothman     noah.rothman@ology.com, 1071
        //Terron    R. Moore    terron@ology.com, 81
        //Emily     Cheever     emily.cheever@ology.com, 110
        //Lauren    Caruso      lauren.caruso@ology.com, 166
        //Stephanie Webber      stephanie.webber@ology.com, 1079
        //JT        Langley     jt@ology.com, 28
        //+ Brett   Warner      brett@ology.com, 108  
        
        $this->authors = array(
            'sharon@ology.com' => 30, 
            'anthony.schneck@ology.com' => 99,
            'bison.messink@ology.com'=> 3791,
            'noah.rothman@ology.com'=> 1071,
            'terron@ology.com'=> 81,
            'emily.cheever@ology.com'=> 110,
            'lauren.caruso@ology.com'=> 166,
            'stephanie.webber@ology.com' => 1079,
            'jt@ology.com' => 28,
            'brett@ology.com' => 108
        );
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface  $input  An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return integer 0 if everything went fine, or an error code
     *
     * @throws \LogicException When this abstract class is not implemented
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $arg = $input->getArgument('call');
        $offset = $input->getArgument('offset');
        $row = $input->getArgument('row');
        switch ($arg) {
            case 'all':
                $result = $this->importAll($offset,$row);
                break;
            case 'posts':
                $result = $this->importPosts($offset,$row);
                break;
            case 'post_to_ology':
                $result = $this->importPostOlogy();
                break;
            case 'post_to_channel':
                $result = $this->importPostChannel();
                break;
            case 'files':
                $result = $this->importFiles();
                break;
            case 'cite_files':
                $result = $this->importCiteFiles();
                break;
            case 'embedded_files':
                $result = $this->importEmbeddedFiles();
                break;
            case 'embedded_objects':
                $result = $this->importEmbeddedObjects();
                break;
            default:
                $result = 'incorrect command';
        }
        fclose($this->full_log);
        //$options = $input->getOptions();
        //$output->writeln(sprintf('name = %s , pass = %s, arg1 = %s', $options['user'], $options['passwd'], $arg1 ));
        $output->writeln(sprintf('%s', $result));
    }

    private function cleanMail($email) {
        return preg_replace("/[^A-Za-z0-9\s\s+\.\:\-\/%+\(\)\*\&\$\#\!\@\"\';\_]/", "", $email);
    }

    private function cleanText($text) {
        //return preg_replace('/[^(\x20-\x8F)]*/', '', $text);
        return $text;
    }

    private function importAll($offset = 0,$row = 0) { 
        $result[] = $this->importPosts($offset,$row);
        $result[] = $this->importPostOlogy();
        $result[] = $this->importPostChannel();
        $result[] = $this->importFiles();
        $result[] = $this->importCiteFiles();
        $result[] = $this->importEmbeddedFiles(); 
        $result[] = $this->importEmbeddedObjects();
        return 'DONE.';
    }
    
    private function importPosts($offset = 0,$row = 0) {
        $s = microtime(true);
        $this->_logProgress('message', 'Start to import posts');
        $this->_logProgress('memory', "Memory usage start: " . (memory_get_usage() / 1024) . " KB");

        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new \PDO('mysql:host=' . $this->drupal_host . ';dbname=' . $this->drupal_db, $this->drupal_user, $this->drupal_pass, $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $limit = '';
        if ($row > 0 && $offset >= 0)
            $limit = ' limit '.(int)$offset.','.(int)$row;
        
        $this->_logProgress('message', 'Get posts from database. Please wait ...');
        
        $bdd->query("SET NAMES 'utf8'");
        
        $reponse = $bdd->query("
        SELECT  n.nid AS nid,
                n.type AS type,
                n.title AS title,
                n.created AS post_creation_date,
                n.changed AS post_update_date,                
                nr.body AS content,
                n.status AS node_status,
                u.mail AS user_mail,               
                UNIX_TIMESTAMP(ctp.field_date_value) AS field_date_value,
                
                ctp.field_cite_article_url AS cite_url,
                ctp.field_cite_article_title AS cite_title,
                ctp.field_cite_image_url AS cite_image,
                
                ctm.field_director_value AS movie_director,
                UNIX_TIMESTAMP(ctm.field_opening_value) AS movie_opening_date,
                ctm.field_starring_value AS movie_starring,
                ctm.field_runtime_value AS movie_runtime,
                ctm.field_rating_rating AS movie_rating,
                GROUP_CONCAT(DISTINCT td_genre.tid SEPARATOR ', ') AS movie_genres,
                td_p_rating.tid AS movie_parental_rating,

                cfs.field_summary_value AS summary,
                
                files_cfi.filepath AS field_image_filepath,
                files_cfi.filename AS image_file,
                
                GROUP_CONCAT(DISTINCT td_channel.tid SEPARATOR ', ') AS field_channel,
                GROUP_CONCAT(DISTINCT td_tags.name SEPARATOR ', ') AS field_tags,
                
                nw_d.content as field_description,
                nw_k.content as field_keywords
                
        FROM node AS n        
        LEFT JOIN content_field_author AS f_author ON n.vid = f_author.vid
        LEFT JOIN users AS u ON f_author.field_author_uid = u.uid
        LEFT JOIN node_revisions AS nr ON n.vid = nr.vid  
        LEFT JOIN content_type_post AS ctp ON n.vid = ctp.vid
        LEFT JOIN content_type_movie_review AS ctm ON n.vid = ctm.vid
        
        LEFT JOIN term_data AS td_p_rating ON ctm.field_parental_rating_value = td_p_rating.tid
        
        LEFT JOIN content_field_summary AS cfs ON n.vid = cfs.vid
        
        LEFT JOIN content_field_image AS cfi ON n.vid = cfi.vid        
        LEFT JOIN files AS files_cfi ON cfi.field_image_fid = files_cfi.fid
        
        LEFT JOIN content_field_channel AS field_channel ON n.vid = field_channel.vid
        LEFT JOIN term_data AS td_channel ON field_channel.field_channel_value = td_channel.tid
        
        LEFT JOIN content_field_tags AS field_tags ON n.vid = field_tags.vid
        LEFT JOIN term_data AS td_tags ON field_tags.field_tags_value = td_tags.tid
        
        LEFT JOIN content_field_genre AS field_genre ON n.vid = field_genre.vid
        LEFT JOIN term_data AS td_genre ON field_genre.field_genre_value = td_genre.tid
        
        LEFT JOIN nodewords AS nw_d ON n.nid = nw_d.id AND nw_d.name = 'description' AND nw_d.type = 5
        LEFT JOIN nodewords AS nw_k ON n.nid = nw_k.id AND nw_k.name = 'keywords' AND nw_k.type = 5  
        
        WHERE n.type in ('post','movie_review') and n.status = 1
        GROUP BY n.nid".
        $limit);
        
        $i = 0;
        $metadata_errors = 0;
        $num = 0;
        $count_steps = $reponse->rowCount();
        
        $this->_logProgress('memory', "Memory usage after query: " . (memory_get_usage() / 1024) . " KB");
        while ($donnees = $reponse->fetch()) {
            $num++;
            $this->_logProgress('progress', 'Import posts: %d of %d (%1.2f%%). (create) (drupal nid ='.$donnees['nid'].')', $num, $count_steps);
            
            $res = $this->_em->getRepository('OlogySocialBundle:Post')->findByOldId($donnees['nid']);
            if(count($res)){                
                continue;
            }else{            
                $i++;
            }

            // create new post
            $post = new Post();

            //find author
            $user = NULL;            
            if ($donnees['user_mail'] && isset($this->authors[$donnees['user_mail']]) ) { 
                $res = $this->_em->getRepository('OlogySocialBundle:User')->findById($this->authors[$donnees['user_mail']]);
                $user = $res[0];
            }
            if (!$user){
                $res = $this->_em->getRepository('OlogySocialBundle:User')->findById($this->default_author_id);
                $user = $res[0];
            }

            $post->setAuthor($user);
            
            // find first ology
            $res = $this->_em->getRepository('OlogySocialBundle:Ology')->findById($this->default_ology_id);
            $default_ology = $res[0];
            $post->setFirstOlogy($default_ology);
            
            // find post type
            if ($donnees['type'] == 'post') {
                $postType =  $this->_em->getReference('OlogySocialBundle:PostType', PostType::HTML);
            }
            elseif ($donnees['type'] == 'movie_review') {
                $postType = $this->_em->getReference('OlogySocialBundle:PostType', PostType::MOV_REVIEW);
            }
            $post->setPostType($postType);
            
            $post->setTitle($this->cleanText($donnees['title']));
            $post->setSlug(Slug::str_slug($this->cleanText($donnees['title'])));
            $post->setHtmlContent($this->cleanText($donnees['content']));
            //            $post->setTextContent(NULL);
            
            $post->setImageUrl($donnees['image_file']);
            //            $post->setAudioUrl(NULL);
            //            $post->setVideoUrl(NULL);
            
            $post->setCreationDate($donnees['post_creation_date']);
            $post->setUpdateDate($donnees['post_update_date']);

            // find first_chanels
            $first_channel = $this->default_first_channel_id;
            if ($donnees['field_channel']) {
                $terms = explode(', ', $donnees['field_channel']);
                $first_channel = $this->movie_channels[$terms[0]];
            }            
            $res = $this->_em->getRepository('OlogySocialBundle:Channel')->findById($first_channel);
            $post->setFirstChannel($res[0]);
            
            $post->setLastSaved($donnees['post_update_date']);
            
            // find keywords
            $keywords = NULL;            
            if ($donnees['field_keywords']){
                $keywords = @unserialize($donnees['field_keywords']);                
                if ($keywords !== FALSE)
                    $keywords = $keywords['value'];
                else 
                    $metadata_errors++;
            }
            $post->setMetaKeywords($keywords);
            
            // find description
            $description = NULL;            
            if ($donnees['field_description']){   
                $description = @unserialize($donnees['field_description']);
                if ($description !== FALSE)
                    $description = $description['value'];
                else
                    $metadata_errors++;
            }            
            $post->setMetaDescription($description);
            
            $post->setHtmlTitle($this->cleanText($donnees['title']));
            $post->setMetaTitle($this->cleanText($donnees['title']));
            $post->setTags($donnees['field_tags']);
            
            $post->setSummary($donnees['summary']);
            
            //            $post->setScheduledPublish(NULL);
            //            $post->setScheduleUnpublish(NULL);
            //            $post->setPriority(NULL);
            $post->setIsProfessional(1);
            //            $post->setIsDraft(NULL); //is_draft
            //            $post->setAlbumArtist(NULL); //album_artist
            //            $post->setAlbumTitle(NULL); //album_title
            //            $post->getAlbumLabel(NULL); //album_label
            //            $post->setAlbumReleaseDate(NULL); // album_release_date

            // ONLY FOR POST
            if ($donnees['type'] == 'post') {
                $post->setCiteTitle($donnees['cite_title']);
                $post->setCiteUrl($donnees['cite_url']);
                $post->setCiteImageUrl($donnees['cite_image']);
            }
            // ONLY FOR MOVIE REVIEW
            if ($donnees['type'] == 'movie_review') {
                $movie_rating = NULL;
                if ( isset($this->movie_ratings[$donnees['movie_rating']]) ) { 
                    $res = $this->_em->getRepository('OlogySocialBundle:Rating')->findById($this->movie_ratings[$donnees['movie_rating']]);
                    $movie_rating = $res[0];
                } 
                else{
                    $res = $this->_em->getRepository('OlogySocialBundle:Rating')->findById($this->movie_ratings['NULL']);
                    $movie_rating = $res[0];
                }
                if ($movie_rating){
                    $post->setRating($movie_rating); //rating_id
                }

                // find movie_genres
                $movie_genres = NULL; 
                if ($donnees['movie_genres']) {
                    $terms = explode(', ', $donnees['movie_genres']);                
                    $res = $this->_em->getRepository('OlogySocialBundle:Genre')->findById($this->movie_genres[$terms[0]]);
                    $movie_genres = $res[0];
                }
                if ($movie_genres){
                    $post->setMovieGenre($movie_genres); //movie_genre_id
                }

                // find movie_parrent_rating
                $movie_parrent_rating = NULL;
                if ($donnees['movie_parental_rating']) {
                    $terms = explode(', ', $donnees['movie_parental_rating']);
                    $res = $this->_em->getRepository('OlogySocialBundle:ParentalRating')->findById($this->movie_parental_ratings[$terms[0]]);
                    $movie_parrent_rating = $res[0];
                } 
                else {
                    $res = $this->_em->getRepository('OlogySocialBundle:ParentalRating')->findById($this->movie_parental_ratings['NULL'] );
                    $movie_parrent_rating = $res[0];
                }
                if ($movie_parrent_rating){
                    $post->setMovieParentalRating($movie_parrent_rating); //movie_parental_rating
                }            
            
                $post->setMovieDirector($donnees['movie_director']); //movie_director
                $post->setMovieStarring($donnees['movie_starring']); //movie_starring
                $post->setMovieOpeningDate($donnees['movie_opening_date']); //movie_open_date
                $post->setMovieRuntime($donnees['movie_runtime']); //movie_runtime
            }

            // set old_id 
            $post->setOldId($donnees['nid']); //old_id
            //
            // find and set old_alias
            $reponse_alias = $bdd->query("
            SELECT DISTINCT ua.dst AS alias            
            FROM url_alias AS ua 
            WHERE CONCAT('node\/', " . $donnees['nid'] . ") = ua.src
            ");
            $alias = $reponse_alias->fetch();
            if(isset($alias['alias'])){                
                $post->setOldAlias($alias['alias']); //old_alias
            }           
            
            // add to container
            $this->_em->persist($post);
            
            unset($reponse_alias);
            unset($donnees);
            unset($post);
            unset($user);
            unset($ology);
            unset($postType);
            unset($movie_parrent_rating);
            unset($movie_genres);
            unset($movie_rating);
            
            // save N entities
            if ($i == 500) {
                $i = 0;
                $this->_logProgress('progress', 'Save new posts: %d of %d (%1.2f%%).', $num, $count_steps );
                $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");                
                $this->_em->flush();
                $this->_em->clear();                
                $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
            }
        }
        // save N entities
        if ($i > 0) {
            $this->_logProgress('progress', 'Save new posts: %d of %d (%1.2f%%).', $num, $count_steps );                    
            $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
            $this->_em->flush();
            $this->_em->clear();
            $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
        }
        $this->_logProgress('message', 'Finish');
        $this->_logProgress('message', 'Metadata_errors = ' . $metadata_errors);        
        $this->_logProgress('message', "Result : $count_steps posts were migrated.");
        $e = microtime(true);
        $this->_logProgress('time', 'Inserted ' . $num . ' objects in ' . ($e - $s) . ' seconds');
        return TRUE;
    }
    
    private function importPostOlogy() {
        $s = microtime(true);
        $this->_logProgress('message', 'Start to create post_to_ology relation');
        $this->_logProgress('memory', "Memory usage: " . (memory_get_usage() / 1024) . " KB");
        $this->_logProgress('message', 'Get posts from database. Please wait ...');

        // get count of posts
        $query_get_count = $this->_em->createQuery("SELECT count(p.id) as count_id FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult_get_count = $query_get_count->iterate();  
        $row = $iterableResult_get_count->next();
        $count_steps = $row[0]['count_id'];
        // get all post
        $query = $this->_em->createQuery("SELECT p FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult = $query->iterate();  
        $this->_logProgress('memory', "Memory usage after query: " . (memory_get_usage() / 1024) . " KB");

        $i = 0;
        $num = 0;
        $new_relation = 0;
        while (($row = $iterableResult->next()) !== false) { 
            $post = $row[0];
            $num++;            

            $this->_logProgress('progress', 'Import entities: %d of %d (%1.2f%%).', $num, $count_steps);
            
            // perhapse relation is already exist. if yes then continue
            $relation = $this->_em->getRepository('OlogySocialBundle:PostsOlogies')->findOneBy(array('post' => $post->getId()));
            if ($relation) {
                unset($relation);
                continue;
            }
            
            $i++;
            $new_relation++;
            // create new relation
            $postOlogies = new PostsOlogies();
            $postOlogies->setOlogy($post->getFirstOlogy());
            $postOlogies->setPost($post);
            $postOlogies->setPostedAt($post->getCreationDate());
            $postOlogies->setPostedBy($post->getAuthor());
            
            // add to container
            $this->_em->persist($postOlogies); 
            unset($relation);
            unset($post);
            unset($postOlogies);
            
            // save N post_to_ology
            if ($i == 500) {
                $i = 0;
                $this->_logProgress('progress', 'Save new entities: %d of %d (%1.2f%%).', $num, $count_steps);
                $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
                $this->_em->flush(); 
                $this->_em->clear();
                $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
            }                
        }
        // save N post_to_ology 
        if ($i > 0) {
            $this->_logProgress('progress', 'Save new entities: %d of %d (%1.2f%%).', $num, $count_steps);
            $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");        
            $this->_em->flush();        
            $this->_em->clear();        
            $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
        }
        $this->_logProgress('message', 'Finish');
        $this->_logProgress('message', "Result : $new_relation post_to_ology were created");
        $e = microtime(true);
        $this->_logProgress('time', 'Inserted ' . $new_relation . ' objects in ' . ($e - $s) . ' seconds');
        return TRUE;
    }
    
    private function importPostChannel() {
        $s = microtime(true);
        $this->_logProgress('message', 'Start to create post_to_channel relation');
        $this->_logProgress('memory', "Memory usage: " . (memory_get_usage() / 1024) . " KB");
        $this->_logProgress('message', 'Get posts from database. Please wait ...');

        // get count of posts
        $query_get_count = $this->_em->createQuery("SELECT count(p.id) as count_id FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult_get_count = $query_get_count->iterate();  
        $row = $iterableResult_get_count->next();
        $count_steps = $row[0]['count_id'];
        // get all post
        $query = $this->_em->createQuery("SELECT p FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult = $query->iterate();  
        $this->_logProgress('memory', "Memory usage after query: " . (memory_get_usage() / 1024) . " KB");

        $i = 0;
        $num = 0;
        $new_relation = 0;
        foreach ($iterableResult AS $row) {
        //while (($row = $iterableResult->next()) !== false) { 
            $post = $row[0];
            $num++;            

            $this->_logProgress('progress', 'Import entities: %d of %d (%1.2f%%).', $num, $count_steps);
            
            // perhapse relation is already exist. if yes then continue
            $relation = $this->_em->getRepository('OlogySocialBundle:PostsChannels')->findOneBy(array('post' => $post->getId()));
            if ($relation) {
                unset($relation);
                continue;
            }
            
            $i++;
            $new_relation++;
            // create new relation            
            $postChannel = new PostsChannels();
            $postChannel->setPost($post);
            $postChannel->setChannel($post->getFirstChannel());
            $postChannel->setPromotedBy($post->getAuthor());
            
            // add to container
            $this->_em->persist($postChannel); 

            unset($row);
            unset($relation);
            unset($post);
            unset($postChannel);            
            // save N post_to_channel
            if ($i == 500) {
                $i = 0;
                $this->_logProgress('progress', 'Save new entities: %d of %d (%1.2f%%).', $num, $count_steps);
                $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
                
                $this->_em->flush(); 
                $this->_em->clear();
                $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
            }                
        }
        // save N post_to_channel 
        if ($i > 0) {
            $this->_logProgress('progress', 'Save new entities: %d of %d (%1.2f%%).', $num, $count_steps);
            $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");        
            $this->_em->flush();        
            $this->_em->clear();        
            $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
        }
        $this->_logProgress('message', 'Finish');
        $this->_logProgress('message', "Result : $new_relation post_to_channel were created");
        $e = microtime(true);
        $this->_logProgress('time', 'Inserted ' . $new_relation . ' objects in ' . ($e - $s) . ' seconds');
        return TRUE;
    }
    
    private function importFiles() {
        $s = microtime(true);
        $this->_logProgress('message', 'Start to import image files');
        $this->_logProgress('memory', "Memory usage: " . (memory_get_usage() / 1024) . " KB");
        $this->_logProgress('message', 'Get posts from database. Please wait ...');    
        
        // destination path
        $path = $this->symfony_image_path . $this->post_dir;
        // check destination folders
        if (!file_exists($path))
            mkdir($path, 0777, true);
        if (!file_exists($path . PostDAO::POST_IMG_SMA))
            mkdir($path . PostDAO::POST_IMG_SMA, 0777, true);
        if (!file_exists($path . PostDAO::POST_IMG_MID))
            mkdir($path . PostDAO::POST_IMG_MID, 0777, true);
        if (!file_exists($path . PostDAO::POST_IMG_BIG))
            mkdir($path . PostDAO::POST_IMG_BIG, 0777, true);        

        // get count of posts
        $query_get_count = $this->_em->createQuery("SELECT count(p.id) as count_id FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult_get_count = $query_get_count->iterate();  
        $row = $iterableResult_get_count->next();
        $count_steps = $row[0]['count_id'];
        // get all posts 
        $query = $this->_em->createQuery("SELECT p FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult = $query->iterate();
        $this->_logProgress('memory', "Memory usage after query: " . (memory_get_usage() / 1024) . " KB");
    
        $i = 0; 
        $changed_posts = 0;
        $moved_images = 0;
        $skipped_images = 0;
        $deleted_images = 0;
        $num = 0;     
        
        while (($row = $iterableResult->next()) !== false) { 
            $post = $row[0];
            $num++;
            $this->_logProgress('progress', 'Get image from Post: %d of %d (%1.2f%%).', $num, $count_steps);
            
            $currentIMG = str_replace(' ', '%20', trim( $post->getImageUrl() )); 
            
            if ($currentIMG && $currentIMG != 'miley.jpeg' && !preg_match("/^(" . $this->post_prefix . "([[:alnum:]]){14}\.)/", $currentIMG)) {
                $i++;
                
                $this->_logProgress('image_info', 'Image ' . $currentIMG);

                // get type
                $type = str_replace('.', '', strrchr($currentIMG, '.'));
                // generate new file name
                $newFileName = uniqid($this->post_prefix, true) . "." . $type;
                //get current file path
                $file_path = $this->drupal_image_path . $currentIMG;                
                // move the file
                $move = NULL;
                if (file_exists($file_path)) {
                    $move = copy($file_path, $path . $newFileName);                    
                }
                // delete file if it's size = 0
                if($move && !@filesize($path . $newFileName)){                    
                    unlink($path . $newFileName);
                    $move = NULL;
                }
                if ($move) {                    
                    $this->_logProgress('image_info', 'Resize image ' . $path . $newFileName);
                    $moved_images++;                    
                    // resize image 
                    try {
                        ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_SMA . $newFileName, PostDAO::POST_IMG_SMA_WSIZE);
                        ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_MID . $newFileName, PostDAO::POST_IMG_MID_WSIZE);
                        ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_BIG . $newFileName, PostDAO::POST_IMG_BIG_WSIZE);
                    } catch (\Exception $e) {
                        $this->_logProgress('exception', 'Caught exception: ' . $e->getMessage());
                    }     
                    // change image url in db
                    $post->setImageUrl($newFileName);
                    $changed_posts++;
                } else {
                    $this->_logProgress('image_info', 'Delete image.');
                   // change image url in db
                    $post->setImageUrl(NULL);
                    $changed_posts++;
                    $deleted_images++;
                }  
                // add to conteiner
                $this->_em->persist($post);
                unset($post);
                // save N posts
                if ($i == 20) { 
                    $i = 0;
                    $this->_logProgress('progress', 'Save changed posts: %d of %d (%1.2f%%). (save)', $num, $count_steps);
                    $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
                    $this->_em->flush();
                    $this->_em->clear();
                    $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
                    sleep(1);
                }        
            }
            else {
                $skipped_images++;                
            }                        
        }
                            
        // save N posts
        if ($i > 0) {
            $this->_logProgress('progress', 'Save changed posts: %d of %d (%1.2f%%). (save)', $num, $count_steps);
            $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
            $this->_em->flush();
            $this->_em->clear();
            $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
        }
        $this->_logProgress('message', 'Finish');
        $this->_logProgress('message', "Result : changed_posts = $changed_posts, moved_images = $moved_images, skipped_images = $skipped_images, deleted_images = $deleted_images"); 
        $e = microtime(true);
        $this->_logProgress('time', 'Changed ' . $changed_posts . ' objects in ' . ($e - $s) . ' seconds');
        return TRUE;
    }

    private function importCiteFiles() {
        $s = microtime(true);
        $this->_logProgress('message', 'Start to import cite files');
        $this->_logProgress('memory', "Memory usage: " . (memory_get_usage() / 1024) . " KB");
        $this->_logProgress('message', 'Get posts from database. Please wait ...');
        
        // destination path
        $path = $this->symfony_image_path . $this->cite_dir;
        // check destination folders
        if (!file_exists($path))
            mkdir($path, 0777, true);
        if (!file_exists($path . PostDAO::POST_IMG_SMA))
            mkdir($path . PostDAO::POST_IMG_SMA, 0777, true);
        if (!file_exists($path . PostDAO::POST_IMG_MID))
            mkdir($path . PostDAO::POST_IMG_MID, 0777, true);
        if (!file_exists($path . PostDAO::POST_IMG_BIG))
            mkdir($path . PostDAO::POST_IMG_BIG, 0777, true);        

        // get count of posts
        $query_get_count = $this->_em->createQuery("SELECT count(p.id) as count_id FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult_get_count = $query_get_count->iterate();  
        $row = $iterableResult_get_count->next();
        $count_steps = $row[0]['count_id'];
        // get all posts
        $query = $this->_em->createQuery("SELECT p FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult = $query->iterate();
        $this->_logProgress('memory', "Memory usage after query: " . (memory_get_usage() / 1024) . " KB");

        $i = 0; 
        $changed_posts = 0;
        $moved_images = 0;
        $skipped_images = 0;
        $deleted_images = 0;
        $num = 0;     

        while (($row = $iterableResult->next()) !== false) { 
            $post = $row[0];        
            $num++;

            $this->_logProgress('progress', 'Get cite_image from post: %d of %d (%1.2f%%).', $num, $count_steps);

            $currentIMG = str_replace(' ', '%20', trim( $post->getCiteImageUrl() ));
            
            if ($currentIMG && $currentIMG != 'miley.jpeg' && !preg_match("/^(" . $this->cite_prefix . "([[:alnum:]]){14}\.)/", basename($currentIMG) )) {
                $i++;

                $this->_logProgress('image_info', 'Image ' . $currentIMG);

                // get image header and check Content-type              
                $ct_image = $this->_getImageHeader($currentIMG);
                $error = 0;
                if(!in_array($ct_image , $this->ct_images)){
                    $error = 1;
                }
                $move = NULL;
                if (!$error){                    
                    // get image name and type
                    $image_url = parse_url($currentIMG);
                    $path_info = pathinfo($image_url['path']);
                    $image_name = $path_info['basename'];
                    $image_type = isset($path_info['extension']) ? $path_info['extension'] : 'jpg';
                    // generate new file name
                    $newFileName = uniqid($this->cite_prefix, true) . "." . $image_type;  
                    // move the file
                    $image = $this->_getImage($currentIMG); 
                    $move = file_put_contents($path . $newFileName, $image);       
                }
                // delete file if it's size = 0
                if($move && !@filesize($path . $newFileName)){                    
                    unlink($path . $newFileName);
                    $move = NULL;
                }
                if ($move) {
                    $moved_images++;
                    $this->_logProgress('image_info', 'Resize image ' . $path . $newFileName);
                    // resize image
                    try {
                        ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_SMA . $newFileName, PostDAO::POST_IMG_SMA_WSIZE);
                        ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_MID . $newFileName, PostDAO::POST_IMG_MID_WSIZE);
                        ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_BIG . $newFileName, PostDAO::POST_IMG_BIG_WSIZE);
                    } catch (\Exception $e) {
                        $this->_logProgress('exception', 'Caught exception: ' . $e->getMessage());
                    }
                    // change image url in db
                    $post->setCiteImageUrl($newFileName);
                    $changed_posts++;
                } else {  
                    $this->_logProgress('image_info', 'Delete image.');
                    // change image url in db
                    $post->setCiteImageUrl(NULL);
                    $changed_posts++;
                    $deleted_images++;
                }
                // add to container
                $this->_em->persist($post);
                unset($post);

                // save N posts
                if ($i == 20) {                    
                    $i = 0;
                    $this->_logProgress('progress', 'Save changed posts: %d of %d (%1.2f%%). (save)', $num, $count_steps);
                    $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
                    $this->_em->flush();
                    $this->_em->clear();
                    $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
                    sleep(1);
                }        
            }
            else {
                $skipped_images++;
            }                      
        }
        // save N posts
        if($i > 0){
            $this->_logProgress('progress', 'Save changed posts: %d of %d (%1.2f%%). (save)', $num, $count_steps);        
            $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
            $this->_em->flush();
            $this->_em->clear();
            $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
        }
        $this->_logProgress('message', 'Finish');
        $this->_logProgress('message', "Result : changed_posts = $changed_posts, moved_images = $moved_images, skipped_images = $skipped_images, deleted_images = $deleted_images"); 
        $e = microtime(true);
        $this->_logProgress('time', 'Changed ' . $changed_posts . ' objects in ' . ($e - $s) . ' seconds');
        return TRUE;
    }
    
    private function importEmbeddedFiles() {
        $s = microtime(true);
        $this->_logProgress('message', 'Start to import embedded files');
        $this->_logProgress('memory', "Memory usage : " . (memory_get_usage() / 1024) . " KB");
        $this->_logProgress('message', 'Get posts from database. Please wait ...');
        
        // destination path
        $path = $this->symfony_image_path . $this->embedded_dir;
        $small_path = $this->symfony_image_path_small . $this->embedded_dir;
        // check destination folders
        if (!file_exists($path))
            mkdir($path, 0777, true);
        // Resize functionality for embedded images was commented
//        if (!file_exists($path . PostDAO::POST_IMG_SMA))
//            mkdir($path . PostDAO::POST_IMG_SMA, 0777, true);
//        if (!file_exists($path . PostDAO::POST_IMG_MID))
//            mkdir($path . PostDAO::POST_IMG_MID, 0777, true);
//        if (!file_exists($path . PostDAO::POST_IMG_BIG))
//            mkdir($path . PostDAO::POST_IMG_BIG, 0777, true);        
        
        // get count of posts
        $query_get_count = $this->_em->createQuery("SELECT count(p.id) as count_id FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult_get_count = $query_get_count->iterate();  
        $row = $iterableResult_get_count->next();
        $count_steps = $row[0]['count_id'];
        // get all posts     
        $query = $this->_em->createQuery("SELECT p FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult = $query->iterate();
        $this->_logProgress('memory', "Memory usage after query: " . (memory_get_usage() / 1024) . " KB");
        
        $i = 0; 
        $changed_posts = 0;
        $moved_images = 0;
        $skipped_images = 0;
        $deleted_images = 0;
        $num = 0;     
          
        while (($row = $iterableResult->next()) !== false) { 
            $post = $row[0];        
            $num++;
            $this->_logProgress('progress', 'Get embedded images from Post: %d of %d (%1.2f%%).', $num, $count_steps);
            
            // get images from html_content field
            $html_content = $post->getHtmlContent();
            if (preg_match_all( '~<img[^>]*src=("|\')([^"\'>]*)("|\')[^>]*>~iU', $html_content, $media ) == FALSE) {
                continue;
            }
            $image_count = count($media[0]);            
            if ( $image_count == 0 ) {
                continue;
            }
            $changed_image_count = 0;  
            
            // check each image
            for ( $image_number = 0; $image_number < $image_count; $image_number++ ) {
                $image_number_log = $image_number+1;
                //get current image
                $currentIMGcode = $media[0][$image_number];
                $currentIMG = $media[2][$image_number];
                
                $this->_logProgress('progress', 'Get embedded images from Post: %d of %d (%1.2f%%). Image ' . $image_number_log .' of ' . $image_count . '.', $num, $count_steps);
                
                //skip if this image is 'data:image'
                if (strpos($currentIMG, 'data:image') === 0) {                    
                    continue;
                }
                
                $currentIMG = str_replace(' ', '%20', trim( $currentIMG ));
                
                if ($currentIMG && $currentIMG != 'miley.jpeg'&& !preg_match("~^(" . $this->embedded_prefix . "([[:alnum:]]){14}\.)~", basename($currentIMG) )) {
                    
                    $this->_logProgress('image_info', 'Image ' . $currentIMG);

                    // get image header and check Content-type              
                    $ct_image = $this->_getImageHeader($currentIMG);                        
                    $error = 0;
                    if(!in_array(strtolower($ct_image) , $this->ct_images)){
                        $error = 1;
                    }

                    $move = NULL;
                    if (!$error){                            
                        // get image name and type
                        $image_url = parse_url($currentIMG);
                        $path_info = pathinfo($image_url['path']);
                        $image_name = $path_info['basename'];
                        $image_type = isset($path_info['extension']) ? $path_info['extension'] : 'jpg';
                        // generate new file name
                        $newFileName = uniqid($this->embedded_prefix, true) . "." . $image_type;  
                        // move the file
                        $image = $this->_getImage($currentIMG); 
                        $move = file_put_contents($path . $newFileName, $image);                                 
                    }
                    // delete file if it's size = 0
                    if($move && !@filesize($path . $newFileName)){                    
                        unlink($path . $newFileName);
                        $move = NULL;
                    }
                    if ($move) {                                
                        $moved_images++;
                        // Resize functionality for embedded images was commented
//                        $this->_logProgress('image_info', 'Resize image '. $path . $newFileName);
//                        // resize image
//                        try {
//                            ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_SMA . $newFileName, PostDAO::POST_IMG_SMA_WSIZE);
//                            ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_MID . $newFileName, PostDAO::POST_IMG_MID_WSIZE);
//                            ImagickService::resizeImage($path . $newFileName, $path . PostDAO::POST_IMG_BIG . $newFileName, PostDAO::POST_IMG_BIG_WSIZE);
//                        } catch (\Exception $e) {
//                            $this->_logProgress('exception', 'Caught exception: ' . $e->getMessage());
//                        }
                        // replace old image path to new image path
                        $html_content = str_replace($currentIMG, $small_path . $newFileName, $html_content);
                        $changed_image_count++;
                    } else {
                        $this->_logProgress('image_info', 'Delete image.');
                        // remove bad image code from html content
                        $html_content = str_replace($currentIMGcode, "", $html_content);
                        $changed_image_count++;
                        $deleted_images++;
                    }                            
                }
                else {
                    $skipped_images++;
                }
            }            
            if ($changed_image_count){
                $i++;
                $changed_posts++;
                $post->setHtmlContent($html_content);
            }
            // add to conteiner
            $this->_em->persist($post);
            unset($post);     
            
            // save N posts
            if ($i == 20) {
                $i = 0;
                $this->_logProgress('progress', 'Save changed posts: %d of %d (%1.2f%%). (save)', $num, $count_steps);
                $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
                $this->_em->flush(); 
                $this->_em->clear(); 
                $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
                sleep(1);
            }
        }
        // save N posts
        if($i > 0){
            $this->_logProgress('progress', 'Save changed posts: %d of %d (%1.2f%%). (save)', $num, $count_steps);        
            $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
            $this->_em->flush();
            $this->_em->clear(); 
            $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
        }
        $this->_logProgress('message', 'Finish');
        $this->_logProgress('message', "Result : changed_posts = $changed_posts, moved_images = $moved_images, skipped_images = $skipped_images, deleted_images = $deleted_images" ); 
        $e = microtime(true);
        $this->_logProgress('time', 'Changed ' . $changed_posts . ' objects in ' . ($e - $s) . ' seconds');
        return TRUE;
    }
    
    private function importEmbeddedObjects() {
        $s = microtime(true);
        $this->_logProgress('message', 'Start to import embedded youtube objects');
        $this->_logProgress('memory', "Memory usage : " . (memory_get_usage() / 1024) . " KB");
        $this->_logProgress('message', 'Get posts from database. Please wait ...');
       
        // get count of posts
        $query_get_count = $this->_em->createQuery("SELECT count(p.id) as count_id FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult_get_count = $query_get_count->iterate();  
        $row = $iterableResult_get_count->next();
        $count_steps = $row[0]['count_id'];
        // get all posts     
        $query = $this->_em->createQuery("SELECT p FROM Ology\SocialBundle\Entity\Post p WHERE p.oldId IS NOT NULL");
        $iterableResult = $query->iterate();
        $this->_logProgress('memory', "Memory usage after query: " . (memory_get_usage() / 1024) . " KB");
        
        $i = 0; 
        $changed_posts = 0;
        $changed_objects_count = 0;
        $deleted_objects_count = 0;
        $num = 0;
        
        while (($row = $iterableResult->next()) !== false) { 
            $post = $row[0];        
            $num++;
            $this->_logProgress('progress', 'Get embedded objects from Post: %d of %d (%1.2f%%).', $num, $count_steps);
            
            // get html_content field            
            $html_content = $post->getHtmlContent();
            $change_content = 0;
            
            // replace all embedded YOUTUBE videos like the following:
            //    <object ... >...<param type="movie" value="PATH" ...>...</object>            
            //    <object ... >...<param type="src" value="PATH"...>...</object>
            //    <object ... >...<embeded src="PATH" ...>...</object>
            if (preg_match_all( '~<object[^>]*>(?!<\/object>).*((<embed[^>]*src=("|\')([^"\'>]*)("|\')[^>]*>)|(<param[^>]*(movie|src)[^>]*value=("|\')([^"\'>]*)("|\')[^>]*>)).*<\/object>~iU', $html_content, $media ) != FALSE) {
                $media_count = count($media[0]);
                for($j = 0; $j < $media_count; $j++){
                    $media_link = $media[9][$j];
                    if(preg_match('~(http|https):\/\/(www\.)?(youtube\.com[^\]]*(v=|v\/)|youtu\.be\/)([^"&?/ ]{11})~iU', $media_link, $media_link_path) != FALSE){
                        $new_video_tag = '<iframe width="560" src="http://www.youtube.com/embed/' . $media_link_path[5] . '?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                        $html_content = str_replace($media[0][$j],  $new_video_tag, $html_content);
                        $change_content = 1;
                        $changed_objects_count++;
                    }
                }
            }
            unset($media);
            // replace embedded YOUTUBE videos like the following:
            //    [video:https://www.youtube.com/v/{VIDEO_ID}]
            //    [video: http://www.youtube.com/watch?v={VIDEO_ID}]
            //    [video:http://www.youtube.com/watch?v={VIDEO_ID}&amp;feature=related]
            //    [video:<span style="...">http://www.youtube.com/watch?v={VIDEO_ID}]
            if (preg_match_all( '~\[video:[^\]]*(http|https):\/\/(www\.)?(youtube\.com[^\]]*(v=|v\/)|youtu\.be\/)([^"&?/ ]{11})([^\]]*)\]~iU', $html_content, $media ) != FALSE) {
                $media_count = count($media[0]);
                for($j = 0; $j < $media_count; $j++ ){
                    $new_video_tag = '<iframe width="560" src="http://www.youtube.com/embed/' . $media[5][$j] . '?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
                    $html_content = str_replace($media[0][$j],  $new_video_tag, $html_content);
                    $change_content = 1;
                    $changed_objects_count++;
                }               
            }
            unset($media);
            // replace embedded Vimeo videos like the following:
            //  [video:http://vimeo.com/12563032]
            if (preg_match_all( '~\[video:[^\]]*vimeo\.com\/([0-9]+)[^\]]*\]~i', $html_content, $media ) != FALSE) {
                $media_count = count($media[0]);
                for($j = 0; $j < $media_count; $j++ ){
                    $new_video_tag = 
                    '<object type="application/x-shockwave-flash" width="560" height="315" data="http://www.vimeo.com/moogaloop.swf?clip_id='.$media[1][$j].'&amp;server=www.vimeo.com&amp;fullscreen=1&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;autoplay=">
                        <param name="movie" value="http://www.vimeo.com/moogaloop.swf?clip_id='.$media[1][$j].'&amp;server=www.vimeo.com&amp;fullscreen=1&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;autoplay=">
                        <param name="wmode" value="transparent">
                        <param name="allowFullScreen" value="true">
                    </object>';
                    $html_content = str_replace($media[0][$j],  $new_video_tag, $html_content);                    
                    $change_content = 1;
                    $changed_objects_count++;
                }               
            }
            unset($media);
            // replace embedded Dailymotion videos like the following:
            //    [video:http://www.dailymotion.com/video/xnff3w_21214134_lifestyle#rel-page-under-2]
            if (preg_match_all( '~\[video:[^\]]*(dailymotion\.com\/.*video\/([a-z0-9]+))_([^\]]*)\]~iU', $html_content, $media ) != FALSE) {
                $media_count = count($media[0]);
                for($j = 0; $j < $media_count; $j++ ){
                    $new_video_tag = 
                    '<object type="application/x-shockwave-flash" width="560" height="315" data="http://www.dailymotion.com/swf/'.$media[2][$j].'">
                        <param name="movie" value="http://www.dailymotion.com/swf/'.$media[2][$j].'">
                        <param name="wmode" value="transparent">
                        <param name="allowFullScreen" value="true">
                    </object>';
                    $html_content = str_replace($media[0][$j],  $new_video_tag, $html_content);
                    $change_content = 1;
                    $changed_objects_count++;
                }               
            }   
            unset($media);
            // replace embedded Collegehumor videos like the following:
            //    [video:http://www.collegehumor.com/video:1942081]
            if (preg_match_all( '~\[video:[^\]]*collegehumor\.com\/video\:([0-9]+)[^\]]*\]~i', $html_content, $media ) != FALSE) {
                $media_count = count($media[0]);
                for($j = 0; $j < $media_count; $j++ ){
                    $new_video_tag = 
                    '<object width="560" height="315" data="http://www.collegehumor.com/moogaloop/moogaloop.swf?clip_id='.$media[1][$j].'&amp;fullscreen=1" type="application/x-shockwave-flash">
                        <param value="http://www.collegehumor.com/moogaloop/moogaloop.swf?clip_id='.$media[1][$j].'&amp;fullscreen=1" name="movie">
                        <param value="transparent" name="wmode">
                        <param value="true" name="allowFullScreen">
                    </object>';
                    $html_content = str_replace($media[0][$j],  $new_video_tag, $html_content);
                    $change_content = 1;
                    $changed_objects_count++;
                }               
            }
            unset($media);
            // delete others [video:..]
            if (preg_match_all( '~\[video:[^\]]*\]~i', $html_content, $media ) != FALSE) {
                $media_count = count($media[0]);
                for($j = 0; $j < $media_count; $j++ ){
                    $html_content = str_replace($media[0][$j],  '', $html_content);
                    $change_content = 1;
                    $deleted_objects_count++;                    
                }
            }
           
            // add to conteiner
            if ($change_content){ 
                //$this->_logProgress('message', "Changed $num post");
                $i++;
                $changed_posts++;
                $post->setHtmlContent($html_content);
                $this->_em->persist($post);
            }
            unset($post);
            unset($html_content);
            unset($media);
            
            // save N posts
            if ($i == 20) {
                $i = 0;
                $this->_logProgress('progress', 'Save changed posts: %d of %d (%1.2f%%). (save)', $num, $count_steps);
                $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
                $this->_em->flush(); 
                $this->_em->clear(); 
                $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
                sleep(1);
            }
        }
        // save N posts
        if($i > 0){
            $this->_logProgress('progress', 'Save changed posts: %d of %d (%1.2f%%). (save)', $num, $count_steps);        
            $this->_logProgress('memory', "Memory usage before save: " . (memory_get_usage() / 1024) . " KB");
            $this->_em->flush();
            $this->_em->clear(); 
            $this->_logProgress('memory', "Memory usage after clear cache: " . (memory_get_usage() / 1024) . " KB");
        }
        $this->_logProgress('message', 'Finish');
        $this->_logProgress('message', "Result : changed_posts = $changed_posts, changed_objects_count = $changed_objects_count, deleted_objects_count = $deleted_objects_count" ); 
        $e = microtime(true);
        $this->_logProgress('time', 'Changed ' . $changed_posts . ' objects in ' . ($e - $s) . ' seconds');
        return TRUE;
    }

    private function _logProgress($type, $message = '', $num = 1, $goal = 1) {
        if (($this->prev_type == 'progress') && ($type != 'progress') ) {
                echo "\n";                
        }       
        
        if ($type == 'message') {
            $this->prev_type = $type;
            $logMessage = $message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        elseif ($type == 'exception') {
            $this->prev_type = $type;
            $logMessage = $message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        elseif ($type == 'image_info') {
            $this->prev_type = $type;
            $logMessage = ' '.$message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        elseif ($type == 'time') {
            $this->prev_type = $type;
            $logMessage = ' ==== '.$message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        elseif ($type == 'memory') {
            $this->prev_type = $type;
            $logMessage = '      '.$message."\n";
            fwrite($this->full_log, $logMessage);
            echo $logMessage;
        }
        else
            if ($type == 'progress' ) {
            if ($message == ''){
                $message = 'Progress: %d of %d (%1.2f%%)';
            }
            if ($goal == 0){
                $goal = 1;  
            }            
            $logMessage = sprintf($message, $num, $goal, $num/$goal*100);
            fwrite($this->full_log, $logMessage."\n");
            $this->prev_type = $type;            
            echo str_repeat(chr(8), 150);
            echo str_pad($logMessage, 150, " ");
        }
        else {
            return FALSE;
        }
        return TRUE;
    }
    
    private function _getImage($url) {         
        //$headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
        //$headers[] = 'Connection: Keep-Alive';         
        //$headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
        $user_agent = 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/535.7 (KHTML, like Gecko) Ubuntu/11.04 Chromium/16.0.912.77 Chrome/16.0.912.77 Safari/535.7';         
        //$user_agent = 'Mozilla';
        //$process = curl_init($url);         
        //curl_setopt($this->_ch, CURLOPT_HTTPHEADER, $headers);   
        curl_setopt($this->_ch, CURLOPT_URL, $url);
        curl_setopt($this->_ch, CURLOPT_HEADER, 0);
        curl_setopt($this->_ch, CURLOPT_NOBODY, 0);
        curl_setopt($this->_ch, CURLOPT_USERAGENT, $user_agent);         
        curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, 1);         
        curl_setopt($this->_ch, CURLOPT_FOLLOWLOCATION, 1);         
        curl_setopt($this->_ch, CURLOPT_TIMEOUT, 30);
        //$return = curl_exec($this->_ch);         
        //curl_close($process);         
        return curl_exec($this->_ch); 
    } 
    
    private function _getImageHeader($url) {       
        $user_agent = 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/535.7 (KHTML, like Gecko) Ubuntu/11.04 Chromium/16.0.912.77 Chrome/16.0.912.77 Safari/535.7';         
        //$user_agent = 'Mozilla';
        curl_setopt($this->_ch, CURLOPT_URL, $url);
        curl_setopt($this->_ch, CURLOPT_HEADER, 1);
        curl_setopt($this->_ch, CURLOPT_NOBODY, 1);
        curl_setopt($this->_ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->_ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->_ch, CURLOPT_TIMEOUT, 10);

        curl_exec($this->_ch);         
        return curl_getinfo($this->_ch, CURLINFO_CONTENT_TYPE);
    }
}

