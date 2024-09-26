<?php

namespace Forms;


use Core\App;
use Core\Database;
use Core\Validator;


class RegistrationForm
{
	private array $errors = [];
	
	public function validate($email, $password): bool
	{
		// Database
		$db = App::resolve(Database::class);
		
		// 1. Validate the data
		// - Email
		if (!Validator::isValidEmail($email)) {
			$this->errors['email'] = 'Email is invalid';
		}
		
		// - Password
		if (!Validator::isValidString($password, 6, 24)) {
			$this->errors['password']
					= 'Password must be at least 6 characters and at most 24 characters';
		}
		
		// 2. Check if the email is already in use
		// (Only check if the email and password are valid)
		if (empty($this->errors)) {
			$existingUser = $db->query('SELECT * FROM user WHERE email = :email', [
					'email' => $email,
			])->find();
			
			if ($existingUser) {
				$this->errors['email'] = 'Email is already in use';
			}
		}
		
		return empty($this->errors);
	}
	
	public function register($email, $password): void
	{
		// Database
		$db = App::resolve(Database::class);
		
		// Save the data to the database
		$db->query('INSERT INTO user (email, password) VALUES (:email, :password)', [
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT),
		]);
	}
	
	public function getErrors(): array
	{
		return $this->errors;
	}
}
