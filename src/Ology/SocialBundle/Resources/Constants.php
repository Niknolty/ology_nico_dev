<?php

namespace Ology\SocialBundle\Resources;

/**
 * This class allow to set some constants like web links.
 * Use can use it for Twig template for example.
 *
 * @author raphael
 */
class Constants {
    
    /* ---------- HTTP LINKS ---------- */
    const FACEBOOK_FOLLOW_LINK = "https://www.facebook.com/ology.media";
    const TWITTER_FOLLOW_LINK = "https://twitter.com/#!/ologize";
    
    /* ---------- Const Array ---------- */
    private static $topOlogiesIdArray = array(533, 483, 229, 155, 35, 140, 13, 163, 726, 961, 855, 856, 455, 133, 134, 83, 959, 76, 119, 30, 135, 114, 474, 859, 469, 150, 970, 602, 75, 106, 904, 103, 170, 212, 180, 11, 992, 236, 555, 794, 497, 793);
    
    public static function getTopOlogiesIdArray() {
        return self::$topOlogiesIdArray;
    }
}

?>
