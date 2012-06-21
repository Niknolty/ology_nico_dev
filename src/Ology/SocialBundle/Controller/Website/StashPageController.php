<?php

namespace Ology\SocialBundle\Controller\Website;

use Ology\SocialBundle\Entity\Post;
use Ology\SocialBundle\Forms\Post\PostForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class StashPageController extends BaseWebController {

    /**
     * @Route("/stash/{id}", name="_website_stash", requirements = {"id" = "\d+"})
     * @Template("OlogySocialBundle:FrontEnd:stash.html.twig")
     */
    public function getStashPage($id) {
        $this->preExecute(true, true);
        $this->get('social.service.appmanager')->initApplication();
        $this->setPageIdInSession(self::STASH_PAGE, $id);

        $stash = $this->get('social.service.stash')->getStash($id);
        $tags = $this->get('social.service.tag')->getTagsForStash($stash->getId());
        $postsStashes = $this->get('social.service.post')->getPostsByStash($id, 0, $this->nbPostsStashPage);

        foreach ($postsStashes as $postStash) {
            if ($postStash->getPost()->getIsDraft() == 1)
                continue;
            $postStash->getPost()->stripTextContent(0);
        }

        //if ($this->array['loggedIn'])
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($postsStashes, $this->user->getId());

        $this->array['unStashable'] = $this->array['loggedIn'] && $stash->getFounder()->getId() == $this->user->getId();
        $this->array['postsStashes'] = $postsStashes;
        $this->array['tags'] = $tags;
        $this->array['stash'] = $stash;

        return $this->array;
    }

    /**
     * @Route("/stash/{id}/{offset}/{n}", name="_website_stash_pag", requirements={"id" = "\d+", "offset" = "\d+", "n" = "\d+"})
     * @Template("OlogySocialBundle:Post:list_stash.html.twig")
     */
    public function getStashPagePaginated($id, $offset, $n) {
        $this->preExecute(false, false);
        $postsStashes = $this->get('social.service.post')->getPostsByStash($id, $offset, $n);

        foreach ($postsStashes as $postStash) {
            if ($postStash->getPost()->getIsDraft() == 1)
                continue;
            $postStash->getPost()->stripTextContent(0);
        }
        if ($this->array['loggedIn'])
            $this->array['likes'] = $this->get('social.service.likes')->getLikesForPosts($postsStashes, $this->user->getId());
        $nextVal = $offset + 1;

        $scroll = true;
        if (count($postsStashes) == 0)
            $scroll = false;
        
        $this->array['id'] = $id;
        $this->array['postsStashes'] = $postsStashes;
        $this->array['page'] = 'stash';
        $this->array['scroll'] = $scroll;
        $this->array['nextPage'] = $nextVal;
        $this->array['n'] = $n;

        return $this->array;
    }
    
    /**
     * @Route("/stash/{stashId}/unstash/{postId}", name="_stash_unstash", requirements = {"postId" = "\d+"})
     */
    public function unStash($stashId, $postId) {
        $user = $this->get('security.context')->getToken()->getUser();
        $stash = $this->get('social.service.stash')->unStash($user, $stashId, $postId);

        return new Response("OK");
    }

    /**
     * @Route("/stash/{stashId}/delete", name="_stash_delete", requirements = {"stashId" = "\d+"})
     */
    public function deleteStash($stashId) {
        $user = $this->get('security.context')->getToken()->getUser();
        $this->get('social.service.stash')->deleteStash($user, $stashId);

        return new Response("OK");
    }
}

?>
