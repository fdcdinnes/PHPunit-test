<?php

class User
{
	
	/**
	* @var string
	*/
	public $email;

	/**
	* using option 1
	*/
	protected $mailer;

	/**
	* using option 2
	*/
	protected $mailer_callable;

	/**
	* @param string $email
	* @return void
	*/
	public function __construct(string $email)
	{

		$this->email = $email;

	}

	// Option 1 creater a setter method after static method removed
	public function setMailer(Mailer $mailer)
	{

		$this->mailer = $mailer;

	}

	public function setMailerCallable(callable $mailer_callable)
	{

		$this->mailer_callable = $mailer_callable;

	}

	/**
	* @param string $message 
	* @return boolean
	* original -> return $this->mailer::send($this->email, $message);
	* option 1 -> return $this->mailer->send($this->email, $message);
	* option 2 -> return call_user_func(array(Mailer::class, 'send'), $this->email, $message); "OR"
	* option 2 -> return call_user_func($this->mailer_callable, $this->email, $message);
	*/
	public function notify(string $message)
	{

		return Mailer::send($this->email, $message);

	}


}