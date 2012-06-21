<?php

namespace Ology\SocialBundle\Entity;

/**
 * IPostLink is an interface for relations between a Post and a Post container 
 * like PostOlogy, PostChannel, PostStash...
 * 
 * Useful to know if we can reOlogize or not a Post for example.
 *
 * @author raphael
 */
interface IPostLink {
    
    /**
     * Get post
     *
     * @return Ology\SocialBundle\Entity\Post 
     */
    public function getPost();
    
    /**
     * Get the container post id.
     * 
     * Example: the ology id
     */
    public function getContainerId();
    
    /**
     * Get the user who did the reologized link 
     */
    public function getUser();
}

?>
