<?php

namespace Ology\SocialBundle\Forms\Invite;

class InviteList {

    protected $email1;
    protected $email2;
    protected $email3;
    protected $email4;
    protected $email5;
    protected $email6;
    protected $msg;
    protected $ologyId;
    protected $isGeneral;

    public function setIsGeneral($isGeneral) {
        $this->isGeneral = $isGeneral;
    }

    public function getIsGeneral() {
        return $this->isGeneral;
    }
    
    public function setOlogyId($ologyId) {
        $this->ologyId = $ologyId;
    }

    public function getOlogyId() {
        return $this->ologyId;
    }
    
    public function setMsg($msg) {
        $this->msg = $msg;
    }

    public function getMsg() {
        return $this->msg;
    }
    
    public function setEmail1($email) {
        $this->email1 = $email;
    }

    public function getEmail1() {
        return $this->email1;
    }
    
    public function setEmail2($email) {
        $this->email2 = $email;
    }

    public function getEmail2() {
        return $this->email2;
    }
    
    public function setEmail3($email) {
        $this->email3 = $email;
    }

    public function getEmail3() {
        return $this->email3;
    }
    
    public function setEmail4($email) {
        $this->email4 = $email;
    }

    public function getEmail4() {
        return $this->email4;
    }
    
    public function setEmail5($email) {
        $this->email5 = $email;
    }

    public function getEmail5() {
        return $this->email5;
    }
    
    public function setEmail6($email) {
        $this->email6 = $email;
    }

    public function getEmail6() {
        return $this->email6;
    }
}

?>
