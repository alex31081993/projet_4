<?php

namespace entity;

class Admin extends Entity
{
    private $id;
    private $pseudo;
    private $pass;

    public function getId() {
        return $this->id;
    }

    public function setId( $id ) {
        $this->id = $id;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function setPseudo( $pseudo ) {
        $this->pseudo = $pseudo;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass( $pass ) {
        $this->pass = $pass;
    }
}