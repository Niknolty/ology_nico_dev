<?php

namespace Ology\SocialBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Ology\SocialBundle\Utility\S3Loader;

class SitemapCommand extends ContainerAwareCommand
{
//    protected $sitemap_dir; // = '/var/www/ology4/web/bundles/ologysocial/up/sitemap/';
    protected $fn_sitemap = 'sitemap.xml';
    protected $fn_googlenews = 'googlenews.xml';
    protected $router;
    protected $request;
    protected $templating;
    protected $db_connection;
    protected $website_url;
    protected $s3loader;
    protected $tmp_dir;
    protected $sitemap_path;
   
    protected function configure()
    {
        parent::configure();

        $this
                ->setName('ology:sitemap')
                ->setDescription('Generate Sitemap')
                ->addArgument('call', InputArgument::REQUIRED, 'Call_method')
                //->addArgument('sitemap_dir', InputArgument::REQUIRED, 'sitemap_dir')
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
        $this->s3loader         = new S3Loader($this->getContainer());
        $this->tmp_dir          = $this->getContainer()->getParameter('tmp_dir');
        $this->sitemap_path     = $this->getContainer()->getParameter('sitemap_path');

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
//        $this->sitemap_dir = $input->getArgument('sitemap_dir');

//        if (!file_exists($this->sitemap_dir))
//            mkdir($this->sitemap_dir, 0777, true);
       
        if ($arg == 'generate_all')
          $result = $this->generateAllSitemap();
        elseif ($arg == 'generate_sitemap')
          $result = $this->generateSitemap();        
        elseif ($arg == 'generate_googlenews')
          $result = $this->generateGooglenewsSitemap();
        else
          $result = 'Incorrect command';
        
        $output->writeln(sprintf('%s', $result));
    }

    private function generateAllSitemap() {        
        $this->generateGooglenewsSitemap();
        $this->generateSitemap();
        return 'Done.';
    }
    
    private function generateGooglenewsSitemap() {
        $params_array = array();
        // get posts
        $creation_time = time() - 172800;
        $sql = 'SELECT p.id, p.html_title, p.title, p.slug, p.creation_date
                FROM Posts p 
                WHERE p.creation_date >= '. $creation_time .' and (p.is_draft IS NULL or p.is_draft = 0) and p.is_pro = 1
                ORDER BY p.creation_date DESC 
                LIMIT 0, 50000';
        $posts = $this->db_connection->query($sql)->fetchAll();
        
        // fill items
        foreach ($posts as $post) {
            $params_array['posts'][] = array(
                'loc'       => $this->website_url . $this->router->generate('_website_post', array('postId' => $post['id'], 'slug' => $post['slug']), FALSE),
                'name'      => 'Ology',
                'lang'      => 'en',
                'title'     => $post['html_title'],
                'pub_date'  => gmdate('Y-m-d\TH:i:s+00:00',  $post['creation_date'])
                );
        }

        // create response
        $response = $this->templating->render('OlogySocialBundle:FrontEnd:sitemap_google.html.twig', $params_array );
        // create file
        $this->createFile($response, $this->fn_googlenews);
        return 'Done.';
    }
    
    private function generateSitemap() {
        $this->getSitemapPro();
        $this->getSitemapUser();
        
        $params_array['inc_sitemaps'][] = array(
            'loc' => $this->website_url . '/' . $this->fn_sitemap . '?page=1',
            'lastmod' => gmdate('Y-m-d\TH:i\Z', time())
            );
        $params_array['inc_sitemaps'][] = array(
            'loc' => $this->website_url . '/' . $this->fn_sitemap . '?page=2',
            'lastmod' => gmdate('Y-m-d\TH:i\Z', time())
            );

        // create response
        $response = $this->templating->render('OlogySocialBundle:FrontEnd:sitemap.html.twig', $params_array );
        // create file
        $this->createFile($response, $this->fn_sitemap);
        return 'Done.';

    } 
 
    private function getSitemapPro() {
        $params_array = array();
        
        // get posts that have 'is_pro' = 1
        $sql = 'SELECT p.id, p.title, p.slug, p.creation_date, p.update_date
                FROM Posts p 
                WHERE (p.is_draft IS NULL or p.is_draft = 0) and p.is_pro = 1
                ORDER BY p.creation_date DESC 
                LIMIT 0, 49999';
        $posts = $this->db_connection->query($sql)->fetchAll();

        // fill post items
        foreach ($posts as $post) {
            $lastmod = $post['update_date'] != NULL ? $post['update_date'] : $post['creation_date'];
            $params_array['posts'][] = array(
                'loc'           => $this->website_url . $this->router->generate('_website_post', array('postId' => $post['id'], 'slug' => $post['slug']), FALSE),
                'lastmod'       => gmdate('Y-m-d\TH:i\Z',  $lastmod),
                'changefreq'    => 'yearly',
                'priority' => '0.5'
                );
        }

        // fill other parameters         
        $params_array['main_page'] = array(
            'loc' => $this->website_url . '/',
            'changefreq' => 'hourly',
            'priority' => '1.0'            
            );        
        
        // create response
        $response = $this->templating->render('OlogySocialBundle:FrontEnd:sitemap_page.html.twig', $params_array );
        // create file
        $this->createFile($response, 'p1_' . $this->fn_sitemap);
        return 'Done.';
    }

    private function getSitemapUser() {
        $params_array = array();

        // fill channel items            
        $sql = 'SELECT c.id, c.name , c.stub FROM Channels c';
        $channels = $this->db_connection->query($sql)->fetchAll();
        foreach ($channels as $channel) {
            $params_array['posts'][] = array(
                'loc'           =>  $this->website_url . $this->router->generate('_website_channel', array('stub' => $channel['stub']), FALSE),
                'changefreq'    => 'hourly',
                'priority' => '0.8'
                );
        }            

        // fill ology items
        $sql = 'SELECT o.id, o.slug, o.update_date, o.creation_date FROM Ologies o';
        $ologies = $this->db_connection->query($sql)->fetchAll();
        foreach ($ologies as $ology) {
            $lastmod = $ology['update_date'] != NULL ? $ology['update_date'] : $ology['creation_date'];
            $params_array['posts'][] = array(
                'loc'           => $this->website_url . $this->router->generate('_website_ology', array('id' => $ology['id'], 'slug' => $ology['slug']), FALSE),
                'lastmod'       => gmdate('Y-m-d\TH:i\Z',  $lastmod),
                'changefreq'    => 'daily',
                'priority' => '0.5'
                );
        }

        if ( count($params_array['posts']) < 50000) { 
            // get posts that have 'is_pro' <> 1
            $limit = 50000 - count($params_array['posts']);
            $sql = 'SELECT p.id, p.title, p.slug, p.creation_date, p.update_date 
                    FROM Posts p 
                    WHERE (p.is_draft IS NULL or p.is_draft = 0) and (p.is_pro = 0 or p.is_pro IS NULL)
                    ORDER BY p.creation_date DESC 
                    LIMIT 0, '. $limit;
            $posts = $this->db_connection->query($sql)->fetchAll();

            // fill post items
            foreach ($posts as $post) {
                $lastmod = $post['update_date'] != NULL ? $post['update_date'] : $post['creation_date'];
                $params_array['posts'][] = array(
                    'loc'           => $this->website_url . $this->router->generate('_website_post', array('postId' => $post['id'], 'slug' => $post['slug']), FALSE),
                    'lastmod'       => gmdate('Y-m-d\TH:i\Z',  $lastmod),
                    'changefreq'    => 'yearly',
                    'priority' => '0.5'
                    );
            }
        }
    
        // create response
        $response = $this->templating->render('OlogySocialBundle:FrontEnd:sitemap_page.html.twig', $params_array );
        // create file
        $this->createFile($response, 'p2_' . $this->fn_sitemap);
        return 'Done.';
    }

    protected function createFile($response, $file_name){

        $f_curr_aws = $this->sitemap_path . $file_name;
        $f_temp_aws = $this->sitemap_path . 'temp_' . $file_name;
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

