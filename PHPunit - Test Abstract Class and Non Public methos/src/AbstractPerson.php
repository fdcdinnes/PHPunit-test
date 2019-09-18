<?php

abstract class AbstractPerson
{

	/**
	* @var string
	*/
	protected $surname;


	/**
	* @return void
	*/
	public function __construct(string $surname)
	{

		$this->surname = $surname;
	
	}

	abstract protected function getTitle();


	/**
	* @return string
	*/
	public function getNameAndTitle()
	{

		return $this->getTitle() . ' ' . $this->surname;

	}


}