<?php

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
	public function testSendMessageReturnsTrue()
	{

		$this->assertTrue(Mailer::send('tes.phpuni@email.com', 'Test Mailer'));
	
	}

	public function testInvalidArgumentExceptionIfEmailIsEmpty()
	{	

		$this->expectException(InvalidArgumentException::class);

		$this->assertTrue(Mailer::send('', 'Test Mailer'));

	}

}