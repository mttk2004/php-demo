<?php

use Core\Authenticator;
use Core\Session;
use Forms\LoginForm;


// Get the data
$email = $_POST['email'];
$password = $_POST['password'];

// LoginForm
$form = new LoginForm();

if ($form->validate($email, $password)) {
	$auth = new Authenticator();
	
	if ($auth->attempt($email, $password)) {
		// Redirect to the home page
		redirect('/');
	} else {
		// Add an error
		$form->addError('email', 'Not found user with this email and password');
	}
}

//Set the session for error
Session::flash('errors', $form->getErrors());
Session::flash('old', [
	'email' => $email,
]);

// Redirect back
redirect('/login');
