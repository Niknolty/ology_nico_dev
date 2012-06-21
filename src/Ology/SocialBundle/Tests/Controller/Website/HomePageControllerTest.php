<?php

namespace Ology\SocialBundle\Tests\Controller\Website;

use Ology\SocialBundle\Controller\Website;
//use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageControllerTest /*extends WebTestCase*/{
    public function testViewProfile()
    {
        //$x = new MyClass();
        //$this->assertEquals(1, $x->demo(1));

        
       /* $client = static::createClient();
        $crawler = $client->request('GET', '/splash');*/
        
        // Tester presence d'un texte sur une page html
        // $this->assertEquals(2, $crawler->filter('a:contains("FAQ")')->count());
        //echo ($crawler->text());
        
        // Test a partir de la splash page un clic sur FAQ
       /* $faqlink = $crawler->filter('a:contains("FAQ")')->link();
        $crawler = $client->click($faqlink);
      
        $this->assertEquals(1, $crawler->filter('a:contains("What is Ology?")')->count());*/
       
        
        // Tester soumission formulaire
        /*$loginLink = $crawler->filter('a:contains("Login")')->link();
        $crawler = $client->click($loginLink);
        $form = $crawler->selectButton('_submit')->form();
        $form['_username'] = 'nicolas.ledeaut@gmail.com';
        $form['_password'] = 'test';
        $crawler = $client->submit($form);
        $client->followRedirects();*/

        //$crawler = $client->request('GET', '/home');
        //$this->assertEquals(1, $crawler->filter('a:contains("Invite")')->count());
 
        // Check that the profiler is enabled
       // if ($profile = $client->getProfile()) {
            // check the number of requests
         //   $this->assertLessThan(10, $profile->getCollector('db')->getQueryCount());

            // check the time spent in the framework
            //$this->assertLessThan(0.5, $profile->getCollector('timer')->getTime());
        //}
        
        }     
}
?>
