<?php

use Core\Session;
use Forms\RegistrationForm;


// Get the data
$email = $_POST['email'];
$password = $_POST['password'];

$form = new RegistrationForm();

// If the data is invalid, show the form again with the errors
if (!$form->validate($email, $password)) {
	view('registration/create', [
			'heading' => 'Create Account',
			'errors' => $form->getErrors(),
	]);
	exit;
}

// Else:
// 1. Save the data to the database
$form->register($email, $password);

// 2. Log the user in
Session::set('user', [
		'email' => $email,
]);

// 3. Redirect to the home page
header('Location: /');

