<?php

use Core\Validator;
use Core\App;
use Core\Database;

// Get the data
$email = $_POST['email'];
$password = $_POST['password'];

// Database
$db = App::resolve(Database::class);

// 1. Validate the data
$errors = [];
if (!Validator::isValidEmail($email)) {
	$errors['email'] = 'Email is invalid';
}

if (!Validator::isValidString($password, 6, 24)) {
	$errors['password'] = 'Password must be at least 6 characters and at most 24 characters';
}

// 2. Check if the email is already in use
if (empty($errors)) {
	$existingUser = $db->query('SELECT * FROM user WHERE email = :email', [
			'email' => $email,
	])->find();
	
	if ($existingUser) {
		$errors['email'] = 'Email is already in use';
	}
}

// 3. If the data is invalid, show the form again with the errors
if (count($errors)) {
	view('registration/create', [
			'heading' => 'Create Account',
			'errors' => $errors,
	]);
	exit;
}

// 4. If the data is valid, save the data to the database,
// then log the user in and redirect them to the home page
$db->query('INSERT INTO user (email, password) VALUES (:email, :password)', [
		'email' => $email,
		'password' => $password,
]);


// Log the user in
$_SESSION['user'] = [
		'email' => $email,
];

// Redirect to the home page
header('Location: /');
