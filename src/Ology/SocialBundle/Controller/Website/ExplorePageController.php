<?php

namespace Ology\SocialBundle\Controller\Website;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ExplorePageController extends BaseWebController {
    
    /**
     * @Route("/explore/{sort}", name="_website_explore", defaults={"sort"="recent"})
     * @Template("OlogySocialBundle:FrontEnd:explore.html.twig")
     */
    public function getExplorePage() {
        $this->preExecute(false, false);
        $this->get('social.service.appmanager')->initApplication();

        $this->setPageIdInSession(self::EXPLORE_PAGE, "");
        //$posts = $this->get('social.service.post')->getMostRecentByOlogies(0, $this->nbPostsOnExplore);
        $membershipService = $this->get('social.service.membership');
        $ologyService = $this->get('social.service.ology');
        $ologies = $ologyService->getMostRecentByLabels(array(), 0, 15);
        $memberships = array();
        $stats = array();
        foreach ($ologies as $ology) {
            $oId = $ology->getId();
            if ($this->array['loggedIn']) {
                if ($membershipService->isMemberOfOlogy($this->user->getId(), $oId)) {
                    $memberships[$oId] = true;
                }
            }
            $stats[$oId] = $ologyService->getStats($oId);
        }

        $this->array['memberships'] = $memberships;
        $this->array['ologies'] = $ologies;
        $this->array['n'] = $this->nbPostsOnExplore;
        $this->array['statss'] = $stats;

        return $this->array;
    }
    
    /**
     * @Route("/explore/{offset}/{n}/you", name="_website_explore_you_pag", requirements = {"n" = "\d+", "offset" = "\d+"})
     * @Template("OlogySocialBundle:Post:list_explore.html.twig")
     */
    public function getPostsPaginatedYouForExplore($offset, $n) {
        $this->commonPreTasks($offset, $n);
        $interests = $this->get('social.service.user')->getInterests($this->user->getId());
        $ologies = $this->get('social.service.ology')->getMostRecentByInterests($interests, $offset, $n);
        $this->commonPostTasks($ologies);        
        $this->array['type'] = 'you';

        return $this->array;
    }
    
    /**
     * @Route("/explore/{offset}/{n}/{labels}", name="_website_explore_pag", requirements = {"n" = "\d+", "offset" = "\d+"})
     * @Template("OlogySocialBundle:Post:list_explore.html.twig")
     */
    public function getPostsPaginatedLabelsForExplore($offset, $n, $labels) {
        $this->commonPreTasks($offset, $n);
        
        $labelsArrayUnfiltered = explode('-', $labels);
        $labelsArray = array();
        foreach ($labelsArrayUnfiltered as $label) {
            if (is_numeric($label))
                $labelsArray[] = $label;
        }
        
        $ologies = $this->get('social.service.ology')->getMostRecentByLabels($labelsArray, $offset, $n);
        $this->commonPostTasks($ologies);        
        $this->array['type'] = 'labels';
        $this->array['labels'] = $labels;

        return $this->array;
    }

    /**
     * @Route("/explore/{offset}/{n}", name="_website_explore_recent_pag", requirements = {"n" = "\d+", "offset" = "\d+"})
     * @Template("OlogySocialBundle:Post:list_explore.html.twig")
     */
    public function getPostsPaginatedRecentForExplore($offset, $n) {
        $this->commonPreTasks($offset, $n);
        $ologies = $this->get('social.service.ology')->getMostRecentByLabels(array(), $offset, $n);
        $this->commonPostTasks($ologies);        
        $this->array['type'] = 'recent';

        return $this->array;
    }
    
    private function commonPreTasks($offset, $n) {
        $this->preExecute(false, false);
        $ologyService = $this->get('social.service.ology');
        $postService = $this->get('social.service.post');
        $postService->setOlogyService($ologyService);
        
        $this->array['n'] = $n;
        $this->array['nextPage'] = $offset + 1;
    }
    
    private function commonPostTasks($ologies) {
        shuffle($ologies);

        $membershipService = $this->get('social.service.membership');
        $ologyService = $this->get('social.service.ology');        
        $memberships = array();
        $stats = array();
        foreach ($ologies as $ology) {
            $oId = $ology->getId();
            if ($this->array['loggedIn']) {
                if ($membershipService->isMemberOfOlogy($this->user->getId(), $oId)) {
                    $memberships[$oId] = true;
                }
            }
            $stats[$oId] = $ologyService->getStats($oId);
        }
        $this->array['memberships'] = $memberships;
        $this->array['statss'] = $stats;
        $this->array['ologies'] = $ologies;
        $this->array['scroll'] = (count($ologies) > 0);
    }
}
?>
