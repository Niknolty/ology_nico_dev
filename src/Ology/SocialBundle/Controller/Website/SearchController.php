<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Forms\Search\Search;
use Ology\SocialBundle\Forms\Search\SearchForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends BaseWebController {

    private function findOlogies($term){
        $ology_finder = $this->get('foq_elastica.finder.website.ology');
        $nameQuery = new \Elastica_Query_Text();
        $nameQuery->setFieldQuery('name', $term);
        $nameQuery->setFieldParam('name', 'analyzer', 'snowball');
        $descriptionQuery = new \Elastica_Query_Text();
        $descriptionQuery->setFieldQuery('description', $term);
        $descriptionQuery->setFieldParam('description', 'analyzer', 'snowball');
        $boolQuery = new \Elastica_Query_Bool();
        $boolQuery->addShould($nameQuery);
        $boolQuery->addShould($descriptionQuery);
        return $ology_finder->find($boolQuery);
    }

    private function findPosts($term){
        $post_finder = $this->get('foq_elastica.finder.website.post');
        $titleQuery = new \Elastica_Query_Text();
        $titleQuery->setFieldQuery('title', $term);
        $titleQuery->setFieldParam('title', 'analyzer', 'snowball');
        return $post_finder->find($titleQuery);
    }

    private function findUsers($term){
        $ology_finder = $this->get('foq_elastica.finder.website.user');
        $usernameQuery = new \Elastica_Query_Text();
        $usernameQuery->setFieldQuery('username', $term);
        $usernameQuery->setFieldParam('username', 'analyzer', 'snowball');
        $firstNameQuery = new \Elastica_Query_Text();
        $firstNameQuery->setFieldQuery('firstName', $term);
        $firstNameQuery->setFieldParam('firstName', 'analyzer', 'snowball');
        $lastNameQuery = new \Elastica_Query_Text();
        $lastNameQuery->setFieldQuery('lastName', $term);
        $lastNameQuery->setFieldParam('lastName', 'analyzer', 'snowball');
        $top1Query = new \Elastica_Query_Text();
        $top1Query->setFieldQuery('top1', $term);
        $top1Query->setFieldParam('top1', 'analyzer', 'snowball');
        $top2Query = new \Elastica_Query_Text();
        $top2Query->setFieldQuery('top2', $term);
        $top2Query->setFieldParam('top2', 'analyzer', 'snowball');
        $top3Query = new \Elastica_Query_Text();
        $top3Query->setFieldQuery('top3', $term);
        $top3Query->setFieldParam('top3', 'analyzer', 'snowball');

        $boolQuery = new \Elastica_Query_Bool();
        $boolQuery->addShould($usernameQuery);
        $boolQuery->addShould($firstNameQuery);
        $boolQuery->addShould($lastNameQuery);
        $boolQuery->addShould($top1Query);
        $boolQuery->addShould($top2Query);
        $boolQuery->addShould($top3Query);

        return $ology_finder->find($boolQuery);
    }
    /**
     * @Route("/search", name="_website_search")
     */
    public function getSearchPage(Request $request) {
        $this->preExecute(true, false);

        $search = new Search();
        $form = $this->createForm(new SearchForm(), $search);
        $form->bindRequest($request);

        // old search
        //$searchService = $this->get('social.service.search');
        //$ologies = $searchService->searchOlogy($search->getSearch());
        //$posts = $searchService->searchPost($search->getSearch());
        //$users = $searchService->searchUser($search->getSearch());

        //new search
        $term = $search->getSearch();
        $ologies = $this->findOlogies($term);
        $posts = $this->findPosts($term);
        $users = $this->findUsers($term);


        for ($i = 0; $i < count($posts); $i++) {
            $p = $posts[$i];
            if ($p->getIsDraft() == 1)
                unset($posts[$i]);
        }
        $posts = array_values($posts);
        
        $memberships = array();
        if ($this->array['loggedIn']) {
            $membershipService = $this->get('social.service.membership');
            $userOlogies = $membershipService->getOlogiesForUser($this->user->getId(), $this->nbOlogies);

            foreach ($ologies as $ology) {
                if ($membershipService->isMemberOfOlogy($this->user->getId(), $ology->getId())) {
                    $memberships[$ology->getId()] = true;
                } else {
                    $memberships[$ology->getId()] = false;
                }
            }
        }

        switch ($search->getType()) {
            case "ology":
                $template = "OlogySocialBundle:FrontEnd:search_ology.html.twig";
                break;
            case "post":
                $template = "OlogySocialBundle:FrontEnd:search_post.html.twig";
                break;
            case "user":
                $template = "OlogySocialBundle:FrontEnd:search_user.html.twig";
                break;
            default:
                die($search->getType() . 'sfs');
        }

        $this->array['ologies'] = $ologies;
        $this->array['posts'] = $posts;
        $this->array['users'] = $users;
        $this->array['memberships'] = $memberships;
        $this->array['searchForm'] = $form->createView();
        $this->array['term'] = $search->getSearch();

        return $this->render($template, $this->array);
    }
    
    /**
     * @Route("/all/{term}", name="_search_all_link")
     * @Template("OlogySocialBundle:FrontEnd:search_post.html.twig")
     */
    public function searchViaLinks($term) {
        $this->preExecute(true, false);

        // old search
        //$service = $this->get('social.service.search');
        //$users = $service->searchUser($term);
        //$ologies = $service->searchOlogy($term);
        //$posts = $service->searchPost($term);

        //new search
        $ologies = $this->findOlogies($term);
        $posts = $this->findPosts($term);
        $users = $this->findUsers($term);

        for ($i = 0; $i < count($posts); $i++) {
            $p = $posts[$i];
            if ($p->getIsDraft() == 1)
                unset($posts[$i]);
        }
        $posts = array_values($posts);
        
        $memberships = array();
        if ($this->array['loggedIn']) {
            $membershipService = $this->get('social.service.membership');
            $userOlogies = $membershipService->getOlogiesForUser($this->user->getId(), $this->nbOlogies);

            foreach ($ologies as $ology) {
                if ($membershipService->isMemberOfOlogy($this->user->getId(), $ology->getId())) {
                    $memberships[$ology->getId()] = true;
                } else {
                    $memberships[$ology->getId()] = false;
                }
            }
        }
        
        $this->array['ologies'] = $ologies;
        $this->array['posts'] = $posts;
        $this->array['users'] = $users;
        $this->array['memberships'] = $memberships;
        $this->array['term'] = $term;
        
        return $this->array;
    }
}

?>