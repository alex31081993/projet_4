<?php

namespace entity;

class Post extends Entity
{

	private $id;
	private $title;
	private $chapeau;
	private $content;
	private $creation_date;

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
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}

	/**
	 * @return mixed
	 */
	public function getChapeau() {
		return $this->chapeau;
	}

	/**
	 * @param mixed $chapeau
	 */
	public function setChapeau( $chapeau ) {
		$this->chapeau = $chapeau;
	}

	/**
	 * @return mixed
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param mixed $content
	 */
	public function setContent( $content ) {
		$this->content = $content;
	}

	/**
	 * @return mixed
	 */
	public function getCreationDate() {
		return $this->creation_date;
	}

	/**
	 * @param mixed $creation_date
	 */
	public function setCreation_date_fr( $creation_date ) {
		$this->creation_date = $creation_date;
	}
}