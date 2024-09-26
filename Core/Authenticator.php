<?php

namespace Core;


class Authenticator
{
	public function attempt($email, $password): bool
	{
		// Database
		$db = App::resolve(Database::class);
		
		// Get the user
		$user = $db->query('SELECT * FROM user WHERE email = :email', [
				'email' => $email,
		])->find();
		
		// If the user does not exist, return false
		if (!$user) {
			return false;
		}
		
		// If the password is incorrect, return false
		if (!password_verify($password, $user['password'])) {
			return false;
		}
		
		// Log the user in
		Session::set('user', [
				'email' => $email,
		]);
		
		return true;
	}
}
