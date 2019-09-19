<?php 

use PHPunit\Framework\TestCase;

Class UserTest extends TestCase
{
	
	protected $user;

	protected $mailer;

	public function setup(): void 
	{

		$this->user = new User('test.phpuni@email.com');

	}

	/**
	* option 3 -> using mockery
	*/
	public function tearDown(): void
	{

		Mockery::close();

	}	

	public function testNotifyReturnTrue()
	{
		// option 1 - Using refactoring method
			// $this->mailer = new Mailer;	
			// $this->mailer = $this->createMock(Mailer::class);
			// $this->mailer->expects($this->once())
			// 			->method('send')
			// 			->willReturn(true);
			// $this->user->setMailer($this->mailer);

		// option 2 - Pass the dependecy as a callable method
			// $this->user->setMailerCallable(function(){
			// 	echo "mocked";
			// 	return true;
			// });
			// OR
			//$this->user->setMailerCallable(array(Mailer::class, 'send'));

		// option 3 - using mockery alias
		$mock = Mockery::mock('alias:Mailer');
		$mock->shouldReceive('send')
				->once()
				->with($this->user->email, 'Sample text')
				->andReturn(true);

		$this->assertTrue($this->user->notify('Sample text'));

	}	

}