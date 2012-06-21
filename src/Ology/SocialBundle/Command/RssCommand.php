<?php

namespace Ology\SocialBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Ology\SocialBundle\DAO\PostDAO;
use Ology\SocialBundle\DAO\UserDAO;

use Ology\SocialBundle\Utility\S3Loader;

class RssCommand extends ContainerAwareCommand
{
//    protected $rss_dir; //= '/var/www/ology4/web/bundles/ologysocial/rss/';
    protected $fn_rss = 'rss.xml';
    protected $router;
    protected $templating;
    protected $db_connection;
    protected $website_url;
    protected $user_small_image_path;
    protected $post_small_image_path;
    protected $s3loader;
    protected $tmp_dir;
    protected $rss_path;

    protected function configure()
    {
        parent::configure();

        $this
                ->setName('ology:rss')
                ->setDescription('Generate RSS')
                ->addArgument('call', InputArgument::REQUIRED, 'Call_method')
                //->addArgument('rss_dir', InputArgument::REQUIRED, 'rss_dir')
                //->addOption('user', 'u', InputOption::VALUE_OPTIONAL, 'Username', '')
                //->addOption('passwd', 'p', InputOption::VALUE_OPTIONAL, 'Password', '')
        ;
    }
    
    /**
    * Initialize whatever variables you may need to store beforehand, also load
    * Doctrine from the Container
    */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output); //initialize parent class method    
                
        $this->router           = $this->getContainer()->get('router');        
        $this->templating       = $this->getContainer()->get('templating');
        $this->db_connection    = $this->getContainer()->get('database_connection');
        $this->website_url      = $this->getContainer()->getParameter('website_url');
        $this->user_small_image_path  = $this->getContainer()->getParameter('assets_base_urls') .
                                        $this->getContainer()->getParameter('s3_bucket') . '/' .
                                        $this->getContainer()->getParameter('user_small_image_path');
        $this->post_small_image_path  = $this->getContainer()->getParameter('assets_base_urls') .
                                        $this->getContainer()->getParameter('s3_bucket') . '/' .
                                        $this->getContainer()->getParameter('post_small_image_path');
        $this->s3loader         = new S3Loader($this->getContainer());
        $this->tmp_dir          = $this->getContainer()->getParameter('tmp_dir');
        $this->rss_path         = $this->getContainer()->getParameter('rss_path');
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
        
//        $this->rss_dir = $input->getArgument('rss_dir');

//        if (!file_exists($this->rss_dir))
//            mkdir($this->rss_dir, 0777, true);
        
        if ($arg = 'generate_all')
          $result = $this->generateAll();
        else
          $result = 'Incorrect command';
        
        $output->writeln(sprintf('%s', $result));
    }

    protected function generateAll() { 
        $this->genereteRssLast();
        $this->generateChannelRss();
        return 'Done.';
    }
        
    private function genereteRssLast() {

        // get images path
        //$path = $this->website_url . '/bundles/ologysocial/up/img/post/' . PostDAO::POST_IMG_SMA;
        //$avatarPath = $this->website_url . '/bundles/ologysocial/up/img/user/user_small/';
        
        // get last posts from db
        $sql = 'SELECT p.id, p.html_title, p.html_content, p.slug, p.creation_date, p.image_url, 
                       u.first_name, u.last_name
                FROM Posts p 
                LEFT JOIN Users u ON u.id = p.author_id
                WHERE (p.is_draft IS NULL or p.is_draft = 0) and p.is_pro = 1                
                ORDER BY p.creation_date DESC 
                LIMIT 0, 20';
        $posts = $this->db_connection->query($sql)->fetchAll();
        
        $commentsCount = array();
        $comments = array();
        // fill items
        foreach ($posts as $post) {
            $id = $post['id'];
            $comments[$id] = array();
            
            // get comments
            $sqlc = 'SELECT c.id, c.content, c.creation_date,
                            u.image_url, u.first_name, u.last_name
                    FROM Comments c 
                    LEFT JOIN Users u ON u.id = c.author_id
                    WHERE c.post_id = ' . $id . '
                    ORDER BY c.creation_date DESC';
            
            $dbComments = $this->db_connection->query($sqlc)->fetchAll();
            $commentsArray = array();
            foreach($dbComments as $dbComment){
                $comments[$id][] = array('content' => $dbComment['content'],
                                        'date' => $dbComment['creation_date'],
                                        'user_avatar' => $this->user_small_image_path . ($dbComment['image_url'] == NULL ? 'default.jpg' : $dbComment['image_url']),
                                        'user_firstname' => $dbComment['first_name'],
                                        'user_lastname' => $dbComment['last_name']);
            }
            $commentsCount[$id] = count($comments[$id]);
            
            // get categories == related channels
            $categories = array();
            $pch_sql = 'SELECT ch.id, ch.name, ch.stub
                FROM Channels ch 
                LEFT JOIN PostsChannels pch ON pch.channel_id = ch.id
                WHERE pch.post_id = ' .  $post['id'];
            
            $post_channels = $this->db_connection->query($pch_sql)->fetchAll();
            foreach($post_channels as $post_channel){
                $pch_title = $post_channel['name'];
                $pch_link = $this->website_url . $this->router->generate('_website_channel', array('stub'=>$post_channel['stub']), FALSE);
                $categories[] = array('title'=>$pch_title, 'link'=>$pch_link);
            }
 
            // get leadImage path            
            $leadImage = $post['image_url'] == NULL? '' : $this->post_small_image_path . $post['image_url'];

            $link_to_post = $this->website_url . $this->router->generate('_website_post', array('postId' => $post['id'], 'slug' => $post['slug']), FALSE);
            // fill params_array['posts']
            $params_array['posts'][] = array(
                'id'           => $post['id'], 
                'title'        => $post['html_title'], 
                'description'  => $post['html_content'], 
                'link'         => $link_to_post,
                'leadImage'    => $leadImage,
                'category_domain' => array(''),
                'pubDate'      => date("r", $post['creation_date']),
                'dc_creator'   => trim($post['first_name'] . ' ' . $post['last_name']),
                'guid_isPermaLink' => $link_to_post,
                'categories' => $categories
                );
        }
        
        $params_array['count_posts']    = count($posts); 
        $params_array['rss_link']       = $this->website_url .'/feed';
        $params_array['rss_title']      = 'Ology';
        $params_array['rss_description'] = '';
        $params_array['rss_language']   = 'en';
        $params_array['count_comments']   = $commentsCount;
        $params_array['comments']   = $comments;
        
        // create response
        $response = $this->templating->render('OlogySocialBundle:FrontEnd:rss.html.twig', $params_array );
        // create file
        $this->createFile($response, $this->fn_rss);
        return 'Done.';
    } 
    
    private function generateChannelRss() {
        // get images path
        //$path = $this->website_url . '/bundles/ologysocial/up/img/post/' . PostDAO::POST_IMG_SMA;
        //$avatarPath = $this->website_url . '/bundles/ologysocial/up/img/user/user_small/';
        
        // fill channel items            
        $sql = 'SELECT c.id, c.name ,c.stub FROM Channels c';
        $channels = $this->db_connection->query($sql)->fetchAll();

        foreach ($channels as $channel) {
            $params_array = array();

            // get last posts from db
            $post_sql = 'SELECT p.id, p.html_title, p.html_content, p.slug, p.creation_date, p.image_url, 
                        u.first_name, u.last_name
                    FROM Posts p 
                    LEFT JOIN Users u ON u.id = p.author_id
                    LEFT JOIN PostsChannels pch ON pch.post_id = p.id                    
                    WHERE (p.is_draft IS NULL or p.is_draft = 0) and p.is_pro = 1 and pch.channel_id = '. $channel['id'] .'
                    ORDER BY p.creation_date DESC 
                    LIMIT 0, 20';
            $posts = $this->db_connection->query($post_sql)->fetchAll();

            // fill items
            $commentsCount = array();
            $comments = array();
            foreach ($posts as $post) {
                $id = $post['id'];
                $comments[$id] = array();

                // get comments
                $sqlc = 'SELECT c.id, c.content, c.creation_date,
                                u.image_url, u.first_name, u.last_name
                        FROM Comments c 
                        LEFT JOIN Users u ON u.id = c.author_id
                        WHERE c.post_id = ' . $id . '
                        ORDER BY c.creation_date DESC';

                $dbComments = $this->db_connection->query($sqlc)->fetchAll();
                $commentsArray = array();
                foreach($dbComments as $dbComment){
                    $comments[$id][] = array('content' => $dbComment['content'],
                                            'date' => $dbComment['creation_date'],
                                            'user_avatar' => $this->user_small_image_path . ($dbComment['image_url'] == NULL ? 'default.jpg' : $dbComment['image_url']),
                                            'user_firstname' => $dbComment['first_name'],
                                            'user_lastname' => $dbComment['last_name']);
                }
                $commentsCount[$id] = count($comments[$id]);

                // get categories == related channels
                $categories = array();
                $pch_sql = 'SELECT ch.id, ch.name, ch.stub
                    FROM Channels ch 
                    LEFT JOIN PostsChannels pch ON pch.channel_id = ch.id
                    WHERE pch.post_id = ' .  $post['id'];

                $post_channels = $this->db_connection->query($pch_sql)->fetchAll();
                foreach($post_channels as $post_channel){
                    $pch_title = $post_channel['name'];
                    $pch_link = $this->website_url . $this->router->generate('_website_channel', array('stub'=>$post_channel['stub']), FALSE);
                    $categories[] = array('title'=>$pch_title, 'link'=>$pch_link);
                }

                // get leadImage path            
                $leadImage = $post['image_url'] == NULL? '' : $this->post_small_image_path . $post['image_url'];

                $link_to_post = $this->website_url . $this->router->generate('_website_post', array('postId' => $post['id'], 'slug' => $post['slug']), FALSE);
                // fill params_array['posts']
                $params_array['posts'][] = array(
                    'id'           => $post['id'],
                    'title'        => $post['html_title'], 
                    'description'  => $post['html_content'], 
                    'link'         => $link_to_post,
                    'leadImage'    => $leadImage,
                    'category_domain' => array(''),
                    'pubDate'      => date("r", $post['creation_date']),
                    'dc_creator'   => trim($post['first_name'] . ' ' . $post['last_name']),
                    'guid_isPermaLink' => $link_to_post,
                    'categories' => $categories
                    );
            }

            $params_array['count_posts']    = count($posts); 
            $params_array['rss_link'] = $this->website_url . '/' . $channel['stub'] . '/feed';
            $params_array['rss_title'] = $channel['name'] . 'ology';
            $params_array['rss_description'] = '';
            $params_array['rss_language'] = 'en';
            $params_array['count_comments']   = $commentsCount;
            $params_array['comments']   = $comments;

            // create response
            $response = $this->templating->render('OlogySocialBundle:FrontEnd:rss.html.twig', $params_array );
            // create file
            $this->createFile($response, $channel['stub'] . '_' . $this->fn_rss);
        }
            
        return 'Done.';
    }

    protected function createFile($response, $file_name){

        $f_curr_aws = $this->rss_path . $file_name;
        $f_temp_aws = $this->rss_path . 'temp_' . $file_name;
        $f_temp = $this->tmp_dir . 'temp_' . $file_name;

        file_put_contents($f_temp , $response);

        $this->s3loader->createObject($f_temp , $f_temp_aws);
        unlink($f_temp);
        if ($this->s3loader->ifObjectExist($f_curr_aws)){
            $this->s3loader->deleteObject($f_curr_aws);
        }
        $this->s3loader->copyObject($f_temp_aws, $f_curr_aws);
        $this->s3loader->deleteObject($f_temp_aws);
    }
}

