<?php

class Item
{	

	/**
	* Get teh description
	*
	* @return integer A random integer 
	*/
	public function getDescription()
	{

		return $this->getID() . $this->getToken();
	}

	/**
	* Get a random ID
	*
	* @return integer ID
	*/
	protected function getID()
	{

		return rand();

	}

	/**
	* Get a random token
	*
	* @return string token
	*/
	private function getToken()
	{

		return uniqid();

	}

	/**
	* Get a random token
	* @param string $prefix
	*
	* @return string token
	*/
	private function getPrefixedToken(string $prefix){

		return uniqid($prefix);

	}

}