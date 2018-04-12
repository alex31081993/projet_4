<?php

namespace entity;


abstract class Entity {

	public function hydrate($data)
	{
		foreach ($data as $key => $value) {

			$setter = 'set' . ucfirst($key);
			$this->$setter($value);
		}
	}
}