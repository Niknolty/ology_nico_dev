<?php

namespace Ology\SocialBundle\Utility;

class Slug {
    public static function str_slug($str) {
	$str = strtolower(trim($str));
	$str = preg_replace('/[^a-z0-9-]/', '-', $str);
	$str = preg_replace('/-+/', "-", $str);
        
	return $str;
    }
}
?>
