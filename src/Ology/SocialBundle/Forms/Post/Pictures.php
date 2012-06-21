<?php

namespace Ology\SocialBundle\Forms\Post;

class Pictures {
    
    protected $picture;

    public function setPicture($picture) {
        $this->picture = $picture;
    }

    public function getPicture() {
        return $this->picture;
    }
}

?>
