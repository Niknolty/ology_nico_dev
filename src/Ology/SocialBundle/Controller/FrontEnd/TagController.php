<?php

namespace Ology\SocialBundle\Controller\FrontEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Description of TagController
 *
 * @author raphael
 */
class TagController extends Controller{

    /**
     * @Route("/getAjaxTags", name = "_tags_autocomplete_ajax")
     */
    public function autoCompleteTags(Request $request) {
        $query = $request->query->get('tag');
        $tagsAutocompleted = $this->get('social.service.tag')->getTagsByPrefix($query);
        $tags = array();
        
        foreach ($tagsAutocompleted as $tag) {
            $tags[] = array('label' => $tag);
        }
        
        $response = new Response(json_encode($tags));
        $response->headers->set('Content-Type', 'text/json');
        return $response;
    }

}

?>
