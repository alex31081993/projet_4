<?php

namespace entity;

class Comment {

	private $id;
	private $post_id;
	private $author;
	private $comment;
	private $comment_date;
	private $report;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getPostId() {
		return $this->post_id;
	}

	/**
	 * @param mixed $post_id
	 */
	public function setPostId( $post_id ) {
		$this->post_id = $post_id;
	}

	/**
	 * @return mixed
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * @param mixed $author
	 */
	public function setAuthor( $author ) {
		$this->author = $author;
	}

	/**
	 * @return mixed
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * @param mixed $comment
	 */
	public function setComment( $comment ) {
		$this->comment = $comment;
	}

	/**
	 * @return mixed
	 */
	public function getCommentDate() {
		return $this->comment_date;
	}

	/**
	 * @param mixed $comment_date
	 */
	public function setCommentDate( $comment_date ) {
		$this->comment_date = $comment_date;
	}

	/**
	 * @return mixed
	 */
	public function getReport() {
		return $this->report;
	}

	/**
	 * @param mixed $report
	 */
	public function setReport( $report ) {
		$this->report = $report;
	}
}