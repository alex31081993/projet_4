<?php

namespace entity;

class Comment extends Entity
{
    private $id;
    private $post_id;
    private $author;
    private $comment;
    private $comment_date;
    private $report;

    public function getId() {
        return $this->id;
    }

    public function setId( $id ) {
        $this->id = $id;
    }

    public function getPostId() {
        return $this->post_id;
    }

    public function setPostId( $post_id ) {
        $this->post_id = $post_id;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor( $author ) {
        $this->author = $author;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setComment( $comment ) {
        $this->comment = $comment;
    }

    public function getCommentDate() {
        return $this->comment_date;
    }

    public function setComment_date_fr( $comment_date ) {
        $this->comment_date = $comment_date;
    }

    public function getReport() {
        return $this->report;
    }

    public function setReport( $report ) {
        $this->report = $report;
    }
}