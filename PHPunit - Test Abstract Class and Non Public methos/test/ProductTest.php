<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
	
	protected $product;

	public function setup(): void
	{

		$this->product = new Product;

	}

	public function testIDIsAnteger(){

		$reflector = new ReflectionClass(Product::class);

		$property = $reflector->getProperty('product_id');

		$property->setaccessible(true);

		$value = $property->getValue($this->product);

		$this->assertIsInt($value);

	}


}