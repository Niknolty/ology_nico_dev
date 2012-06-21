<?php

namespace Ology\SocialBundle\Entity;

/**
 * Description of Notif
 *
 * @author raphael
 */
class Notif {
    
    protected $id;
    protected $type;
    protected $data;
    
    function __construct() {
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getData() {
        return $this->data;
    }
    
    public function setData($data) {
        $this->data = $data;
    }
}

?>
