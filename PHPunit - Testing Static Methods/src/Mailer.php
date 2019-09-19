<?php

	
class Mailer
{
	
	/**
	* @param string $email
	* @param string $message
	*
	* @throws InvalidArgumentException if $email is empty
	*
	* @return boolean
	* original -> public static function send(string $email, string $message)
	* option 1 -> public function send(string $email, string $message) | refactor or remove static methods
	* option 2 ->
	* option 3 ->	
	*/
	
	public static function send(string $email, string $message)
	{

		if (empty($email)) {

			throw new InvalidArgumentException;

		}

		echo "Send '$message' to '$email'";

		return true;

	}


}