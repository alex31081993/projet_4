<?php

namespace entity;

class Post
{
    private $id;
    private $title;
    private $chapeau;
    private $content;
    private $creation_date;

    public function getId() {
        return $this->id;
    }

    public function setId( $id ) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle( $title ) {
        $this->title = $title;
    }

    public function getChapeau() {
        return $this->chapeau;
    }

    public function setChapeau( $chapeau ) {
        $this->chapeau = $chapeau;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent( $content ) {
        $this->content = $content;
    }

    public function getCreationDate() {
        return $this->creation_date;
    }

    public function setCreation_date_fr( $creation_date ) {
        $this->creation_date = $creation_date;
    }
}