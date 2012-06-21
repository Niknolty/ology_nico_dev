<?php

namespace Ology\SocialBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PDO;
use Ology\SocialBundle\DAO\PostDAO;

class AuthorsCommand extends ContainerAwareCommand
{
    // change the timeout value in php.ini before importing
    protected $drupal_host;
    protected $drupal_db;
    protected $drupal_user;
    protected $drupal_pass;
    protected $authors; // authors list
    protected $db_connection;
    protected $bdd;
    protected $prev_type = 'message';
    
    protected function configure()
    {
        parent::configure();

        $this
                ->setName('ology:author')
                ->setDescription('Change authors to correct')
                ->addArgument('call', InputArgument::REQUIRED, 'Call_method')
                
                ->addArgument('drupal_host', InputArgument::REQUIRED, 'Drupal_host')
                ->addArgument('drupal_db', InputArgument::REQUIRED, 'Drupal_db')
                ->addArgument('drupal_user', InputArgument::REQUIRED, 'Drupal_user')
                ->addArgument('drupal_pass', InputArgument::REQUIRED, 'Drupal_pass')
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
        
        $this->db_connection    = $this->getContainer()->get('database_connection');
        
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $this->bdd = new \PDO('mysql:host=' . $this->drupal_host . ';dbname=' . $this->drupal_db, $this->drupal_user, $this->drupal_pass, $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
        // Emails from my.Ology       
        //Firstname Lastname    email in ology.com, id in my.Ology
        //Sharon    Tharp       sharon@ology.com, 30
        //Anthony   Schneck     anthony.schneck@ology.com, 99
        //Bison     Messink     bison.messink@ology.com, 3791
        //Noah      Rothman     noah.rothman@ology.com, 1071
        //Terron    R. Moore    terron@ology.com, 81
        //Emily     Cheever     emily.cheever@ology.com, 110
        //Lauren    Caruso      lauren.caruso@ology.com, 166
        //Stephanie Webber      stephanie.webber@ology.com, 1079
        //JT        Langley     jt@ology.com, 28
        //Brett     Warner      brett@ology.com, 108  
        
        $this->authors = array(
            // email OLOGY2                   ID and email from OLOGY4                 //posts in OLOGY2
            'sharon.tharp@ologycorp.com'   => 30,   // 'sharon@ology.com',              //2128
            'anthony.schneck@ology.com'    => 99,   // 'anthony.schneck@ologycorp.com', //1500
            'anthony.schneck@ologycorp.com'=> 99,                                       //5
            'bison.messink@ology.com'      => 3791, // 'bison.messink@ology.com',       //656
            'noah.rothman@ology.com'       => 1071, // 'noah.rothman@ology.com',        //1051
            'terron@ology.com'             => 81,   // 'terron@ology.com',              //1937
            'emily@ology.com'              => 110,  // 'emily.cheever@ology.com',       //1569
            'lauren.caruso@ologycorp.com'  => 166,  // 'lauren.caruso@ology.com',       //1358
            //'lauren.caruso@ology.com'                                                 //0
            'stephanie.webber@ology.com'   => 1079, // 'webberstephanie@yahoo.com',     //1124
            'jt.langley@ology.com'         => 28,   // 'jt.langley@ology.com',          //2318
            'brett@ology.com'              => 108   // 'brett@ology.com'                //1974        
        );

// from OLOGY4 DB     
// Select id, email from Users where id in (30,99,3791,1071,81,110,166,1079,28,108);        
//|   28 | jt.langley@ology.com          |
//|   30 | sharon@ology.com              |
//|   81 | terron@ology.com              |
//|   99 | anthony.schneck@ologycorp.com |
//|  108 | brett@ologycorp.com           |
//|  110 | emily.cheever@ology.com       |
//|  166 | lauren.caruso@ology.com       |
//| 1071 | noah.rothman@ology.com        |
//| 1079 | webberstephanie@yahoo.com     |
//| 3791 | bison.messink@ology.com  

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

        if ($arg == 'correct')
          $result = $this->correctAuthors();
        else
          $result = 'incorrect command';

        $output->writeln(sprintf('%s', $result));
    }


    private function correctAuthors() {

        // get nodes that belong to the authors list
        $this->_logProgress('message', 'Get node-user relationships from ology2');
       
        $condition = "";
        foreach ($this->authors as $author_o2 => $author_o4){
            if (!$condition)
                $condition .= "(u.mail = '$author_o2')";
            else
                $condition .= " or (u.mail = '$author_o2')";
        }
        
        $this->bdd->query("SET NAMES 'utf8'");
        
        $reponse = $this->bdd->query("
        SELECT  n.nid AS nid,
                n.status AS node_status,
                u.mail AS user_mail                
        FROM node AS n        
        LEFT JOIN content_field_author AS f_author ON n.vid = f_author.vid
        LEFT JOIN users AS u ON f_author.field_author_uid = u.uid
        WHERE n.type in ('post','movie_review') and n.status = 1 and ($condition)");
        
        
        $changed_posts = 0;
        $num = 0;
        $count_nodes = $reponse->rowCount();
        $this->_logProgress('message', "Find $count_nodes nodes");
        
        while ($node = $reponse->fetch()) {
            
            
            $num++;
            $nid = $node['nid'];
            
            $sql = "SELECT p.id, p.author_id
                FROM Posts p                
                WHERE p.old_id = $nid";
            $post = $this->db_connection->query($sql)->fetchAll();
            
            if (!count($post)){
                continue;
            } 
            
            $id_post = $post[0]['id'];
            $old_author_id = $post[0]['author_id'];
            $new_author_id = $this->authors[$node['user_mail']];
            $this->_logProgress('progress', 'Check post: %d of %d (%1.2f%%). (id ='.$id_post.')', $num, $count_nodes);
            if ($old_author_id != $new_author_id){
                $this->_logProgress('progress', 'Check post: %d of %d (%1.2f%%). (id ='.$id_post.') (update)', $num, $count_nodes);

                $sql = "UPDATE Posts p
                    SET p.author_id = $new_author_id
                    WHERE p.old_id = $nid";
                $upd_post = $this->db_connection->query($sql);

                $sql = "UPDATE PostsOlogies po
                    SET po.user_id = $new_author_id
                    WHERE po.post_id = $id_post and po.user_id = $old_author_id";
                $upd_ologies = $this->db_connection->query($sql);

                $sql = "UPDATE PostsChannels po
                    SET po.user_id = $new_author_id
                    WHERE po.post_id = $id_post and po.user_id = $old_author_id";
                $upd_channels = $this->db_connection->query($sql);
                
                $changed_posts++;
                
            }
            
        }
        $this->_logProgress('message', "Changed $changed_posts posts.");
        return 'Done.';
    }
    
    private function _logProgress($type, $message = '', $num = 1, $goal = 1) {
        if (($this->prev_type == 'progress') && ($type != 'progress') ) {
                echo "\n";                
        }       
        
        if ($type == 'message') {
            $this->prev_type = $type;
            $logMessage = $message."\n";
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
            $this->prev_type = $type;            
            echo str_repeat(chr(8), 150);
            echo str_pad($logMessage, 150, " ");
        }
        else {
            return FALSE;
        }
        return TRUE;
    }
}

