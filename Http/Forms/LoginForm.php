<?php

namespace Forms;


use Core\Validator;

class LoginForm
{
	private array $errors = [];
	
	public function validate($email, $password): bool
	{
		// Validate the data
		// - Check the email is valid
		if (!Validator::isValidEmail($email)) {
			$this->errors['email'] = 'Invalid email';
		}
		// - Check the password is valid
		if (!Validator::isValidString($password, 6, 24)) {
			$this->errors['password'] = 'Password must be at least 6 characters and at most 24 characters';
		}
		
		return empty($this->errors);
	}
	
	public function addError($key, $value): void
	{
		$this->errors[$key] = $value;
	}
	
	public function getErrors(): array
	{
		return $this->errors;
	}
}
