<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Ology\SocialBundle\Service\UserService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ology\SocialBundle\Forms\Search\Search;
use Ology\SocialBundle\Forms\Search\SearchForm;
use Symfony\Component\HttpFoundation\Request;
use Ology\SocialBundle\Service\OlogyService;

class SearchController extends Controller {

    /**
     * @Route("/all", name="_all_search")
     * @Template("OlogySocialBundle:Search:search.html.twig")
     */
    public function searchAction() {
        $search = new Search();
        $form = $this->createForm(new SearchForm(), $search);

        return array('form' => $form->createView());
    }

        /**
     * @Route("/ology", name="_ology_search")
     * @Template("OlogySocialBundle:Search:search_ology.html.twig")
     */
    public function searchOlogyAction() {
        $search = new Search();
        $form = $this->createForm(new SearchForm(), $search);

        return array('form' => $form->createView());
    }

        /**
     * @Route("/post", name="_post_search")
     * @Template("OlogySocialBundle:Search:search_post.html.twig")
     */
    public function searchPostAction() {
        $search = new Search();
        $form = $this->createForm(new SearchForm(), $search);

        return array('form' => $form->createView());
    }

        /**
     * @Route("/user", name="_user_search")
     * @Template("OlogySocialBundle:Search:search_user.html.twig")
     */
    public function searchUserAction() {
        $search = new Search();
        $form = $this->createForm(new SearchForm(), $search);

        return array('form' => $form->createView());
    }

    /**
     * @Route("/get", name="_get_all_search")
     * @Template("OlogySocialBundle:Search:results.html.twig")
     */
    public function makeSearchAction(Request $request) {
        $search = new Search();
        $form = $this->createForm(new SearchForm(), $search);
        $form->bindRequest($request);

        $service = $this->get('social.service.search');

        $users = $service->searchUser($search->getSearch());
        $ologies = $service->searchOlogy($search->getSearch());
        $posts = $service->searchPost($search->getSearch());

        return array('users' => $users,
            'ologies' => $ologies,
            'posts' => $posts,
            'search' => $search->getSearch());
    }

    /**
     * @Route("/get/user", name="_get_user_search")
     * @Template("OlogySocialBundle:Search:results.html.twig")
     */
    public function makeSearchUser(Request $request) {
        $search = new Search();
        $form = $this->createForm(new SearchForm(), $search);
        $form->bindRequest($request);

        $service = $this->get('social.service.search');

        $users = $service->searchUser($search->getSearch());

        return array('users' => $users,
            'search' => $search->getSearch());
    }

    /**
     * @Route("/get/ology", name="_get_ology_search")
     * @Template("OlogySocialBundle:Search:results.html.twig")
     */
    public function makeSearchOlogy(Request $request) {
        $search = new Search();
        $form = $this->createForm(new SearchForm(), $search);
        $form->bindRequest($request);

        $service = $this->get('social.service.search');

        $ologies = $service->searchOlogy($search->getSearch());

        return array('ologies' => $ologies,
            'search' => $search->getSearch());
    }

    /**
     * @Route("/get/post", name="_get_post_search")
     * @Template("OlogySocialBundle:Search:results.html.twig")
     */
    public function makeSearchPost(Request $request) {

        $search = new Search();
        $form = $this->createForm(new SearchForm(), $search);
        $form->bindRequest($request);

        $service = $this->get('social.service.search');

        $posts = $service->searchPost($search->getSearch());
        ;
        return array('posts' => $posts,
            'search' => $search->getSearch());
    }

}

?>
