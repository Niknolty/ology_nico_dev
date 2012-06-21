<?php

namespace Ology\SocialBundle\Service;

use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\EntityManager;

/**
 * This service allow to activate / disable tips prompt.
 * It's activating after a registration and saved in DB.
 *
 * @author raphael
 */
class TipsPromptService {
    // Set by injection
    protected $context;
    protected $em;
    
    // Static order id lists
    private $tipsList = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17); // 14 tip (Read more ...) is missing because not avalaible on all pages
    private $ologyPageOrder = array(16, 5, 1, 17, 15, 9, 8, 3, 10); // last should be Featured ology tip11 but its not in the page
    private $homePageOrder = array(5, 1, 17, 9, 15, 3, 10, 11);
    private $profilePageOrder = array(7, 8, 9, 12, 17);
    private $settingsPageOrder = array(13);
    private $postPageOrder = array(15, 2);
    private $mediaPageOrder = array(6);
    private $editPageOrder = array(4);

    public function __construct(SecurityContext $context, EntityManager $em) {
        $this->context = $context;
        $this->em = $em;
    }

    /**
     * Set an array of tips id representing non-read tips.
     * This set the original full list.
     */
    public function initTips() {
        $this->saveTipsList($this->tipsList);
    }

    /**
     * This is the main function of this service.
     * For a given page (ex. 'home') and a given current tip id (ex. 15),
     * this return the next tip id to display (here 3 in our example).
     * 
     * @param string $currentPage
     * @param int $currentTipId
     * @return int 
     */
    public function getNextTipId($currentPage, $currentTipId = 0) {
        $this->refreshDBList($currentTipId);

        $listOrder =  $this->getListOrder($currentPage);
        
        // Return the next tip id in the current page in function to the page order
        foreach ($listOrder as $nextTipId) {
            if (in_array($nextTipId, $this->tipsList) )
                return $nextTipId;
        }
        
        // No more tip to display
        $this->closeTipsPrompt();
        
        return 0;
    }

    /**
     * Set the tipsList attribute in DB to NULL.
     * Tips prompt will no longer get displayed. 
     */
    public function closeTipsPrompt() {
        $this->saveTipsList(NULL);
    }
    
    /**
     * If the user click to see the next item, we refresh the current list in DB (delete current id tip).
     * 
     * @param int $currentTipId 
     */
    private function refreshDBList($currentTipId) {
        // Refresh list
        $this->tipsList = $this->loadTipsList();
            
        if ($currentTipId != 0) {
            // Get the tip id index
            $pos = array_search($currentTipId, $this->tipsList);
            // Delete the current tip from the queue
            unset($this->tipsList[$pos]);
            // Save the new queue
            $this->saveTipsList($this->tipsList);
        }
    }
    
    /**
     * In function to the page where user is, the tips will display in different order.
     * So here we return the correct order.
     * 
     * @param string $currentPage
     * @return array 
     */
    private function getListOrder($currentPage) {
        switch ($currentPage) {
            case 'home':
                return $this->homePageOrder;
                break;
            case 'ology':
                return $this->ologyPageOrder;
                break;
            case 'profile':
                return $this->profilePageOrder;
                break;
            case 'settings':
                return $this->settingsPageOrder;
                break;
            case 'post':
                return $this->postPageOrder;
                break;
            case 'media':
                return $this->mediaPageOrder;
                break;
            case 'edit':
                return $this->editPageOrder;
                break;
            default:
                return array();
                break;
        }
    }
    
    /**
     * Save the given list into DB.
     * 
     * @param array $list 
     */
    private function saveTipsList($list) {
        if (!empty($list)) {
            $list = implode(',', $list);
        } else {
            $list = NULL;
        }
        
        $this->getCurrentUser()->setTipsList($list);
        $this->em->flush();
    }
    
    /**
     * This return the array of tip id left.
     * 
     * @return array 
     */
    private function loadTipsList() {
        $serializedList = $this->getCurrentUser()->getTipsList();
        $list = explode(',', $serializedList);
        
        return $list;
    }
    
    private function getCurrentUser()
    {
        return $this->context->getToken()->getUser();
    }
    
}

?>
