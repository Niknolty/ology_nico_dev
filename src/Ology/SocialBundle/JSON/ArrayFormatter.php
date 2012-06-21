<?php

namespace Ology\SocialBundle\JSON;

use Ology\SocialBundle\Entity\Ology;

class ArrayFormatter {
    public static function OlogyListToArray($ologyList) {
        $res = array();
        foreach ($ologyList as $ology) {
            $res[] = $ology->toArray();
        }
        return $res;
    }
}

?>
