<?php

namespace Ology\SocialBundle\Forms\Search;

class Search {

    protected $search;
    protected $type;

    public function setSearch($search) {
        $this->search = $search;
    }

    public function getSearch() {
        return $this->search;
    }
    
    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }
}

?>
