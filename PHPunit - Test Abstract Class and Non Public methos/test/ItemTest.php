<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
	
	protected $item;

	protected $itemChild;

	public function setup(): void
	{

		$this->item = new Item;

		$this->itemChild = new ItemChild;

	}

	/**
	* Call a public menthods 
	*/
	public function testDescriptionIsNotEmpty(){

		$this->assertNotEmpty($this->item->getDescription());

	}

	/**
	* Call a protected menthods 
	*/
	public function testIDisAnInteger()
	{

		$this->assertIsInt($this->itemChild->getID());

	}

	/**
	* Call a private menthods  using reflection class or refactoring
	*/
	public function testTokenisAString()
	{

		$reflector = new ReflectionClass(Item::class);

		$method = $reflector->getMethod('getToken');

		$method->setAccessible(true);

		$result = $method->invoke($this->item);

		$this->assertIsString($result);

	}

	/*
	* Call private method having an arguments
	*/
	public function testPrefixTokenStartWithPrefix()
	{

		$reflector = new ReflectionClass(Item::class);

		$method = $reflector->getMethod('getPrefixedToken');

		$method->setAccessible(true);

		$result = $method->invokeArgs($this->item, ['example']);

		$this->assertStringStartsWith('example', $result);

	}

}