<?php

namespace Ology\SocialBundle\Controller\Admin;

use Ology\SocialBundle\Entity\FeaturedOlogy;
use Ology\SocialBundle\Entity\MostViewedPost;
use Ology\SocialBundle\Forms\Ology\FeaturedOlogiesForm;
use Ology\SocialBundle\Forms\Post\MostViewedPostsForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ology\SocialBundle\Entity\Role;

class FeaturedController extends Controller {

    /**
     * @Route("/featured", name="_featured_display")
     * @Template("OlogySocialBundle:Admin:featured.html.twig")
     */
    public function displayFeaturedOlogies() {
        $ologyService = $this->get('social.service.ology');
        $ologies = $ologyService->getFeaturedOlogies();

        $list = "";
        foreach ($ologies as $ology) {
            $list = $list . ($ology->getId()) . ("-");
        }

        $fOlogy = new FeaturedOlogy();
        $fOlogy->setList($list);
        $form = $this->createForm(new FeaturedOlogiesForm(), $fOlogy);

        return array('ologies' => $ologies, 'form' => $form->createView());
    }
    
    /**
     * @Route("/mostviewed", name="_mostviewed_display")
     * @Template("OlogySocialBundle:Admin:mostviewed.html.twig")
     */
    public function displayMostViewedPosts() {
        $postService = $this->get('social.service.post');
        $posts = $postService->getMostViewed();

        $list = "";
        foreach ($posts as $post) {
            $list = $list . ($post->getId()) . ("-");
        }

        $mvPosts = new MostViewedPost();
        $mvPosts->setList($list);
        $form = $this->createForm(new MostViewedPostsForm(), $mvPosts);

        return array('posts' => $posts, 'form' => $form->createView());
    }
    
    /**
     * @Route("/blacklisted", name="_blacklisted_display")
     * @Template("OlogySocialBundle:Admin:blacklisted.html.twig")
     */
    public function displayBlacklistedOlogies() {
        $ologyService = $this->get('social.service.ology');
        $ologies = $ologyService->getBlacklistedOlogies();

        $list = "";
        foreach ($ologies as $ology) {
            $list = $list . ($ology->getId()) . ("-");
        }

        $fOlogy = new FeaturedOlogy();
        $fOlogy->setList($list);
        $form = $this->createForm(new FeaturedOlogiesForm(), $fOlogy);

        return array('ologies' => $ologies, 'form' => $form->createView());
    }

    /**
     * @Route("/featured/store", name="_featured_store")
     */
    public function storeFeaturedOlogies(Request $request) {
        $fOlogy = new FeaturedOlogy();
        $form = $this->createForm(new FeaturedOlogiesForm(), $fOlogy);
        $form->bindRequest($request);

        $ologyIds = explode("-", $fOlogy->getList());

        $ologyService = $this->get('social.service.ology');
        $ologyService->setFeaturedOlogies($ologyIds);

        return $this->redirect($this->generateUrl('_featured_display'));
    }
    
    /**
     * @Route("/blacklisted/store", name="_blacklisted_store")
     */
    public function storeBlacklistedOlogies(Request $request) {
        $fOlogy = new FeaturedOlogy();
        $form = $this->createForm(new FeaturedOlogiesForm(), $fOlogy);
        $form->bindRequest($request);

        $ologyIds = explode("-", $fOlogy->getList());

        $ologyService = $this->get('social.service.ology');
        $ologyService->setBlacklistedOlogies($ologyIds);

        return $this->redirect($this->generateUrl('_blacklisted_display'));
    }
    
    /**
     * @Route("/mostviewed/store", name="_mostviewed_store")
     */
    public function storeMostViewedPosts(Request $request) {
        $mvPosts = new MostViewedPost();
        $form = $this->createForm(new MostViewedPostsForm(), $mvPosts);
        $form->bindRequest($request);

        $postIds = explode("-", $mvPosts->getList());

        $postService = $this->get('social.service.post');
        $postService->setMostViewed($postIds);

        return $this->redirect($this->generateUrl('_mostviewed_display'));
    }
}

?>
