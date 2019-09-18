<?php

class Product
{
		
	/**
	* @var integer
	*/
	protected $product_id;

	/**
	* @return void 
	*/
	public function __construct()
	{

		$this->product_id = rand();

	}

}