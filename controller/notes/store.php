<?php

use Core\App;
use Core\Validator;
use Core\Database;

$title = $_POST['title'];
$errors = [];

if (!Validator::isValidString($title, 3, 255)) {
	$errors['title'] = 'Title is required and must be between 3 and 255 characters';
}

if (!empty($errors)) {
	view('notes/create', [
			'heading' => 'Create Note ...',
			'errors' => $errors,
			'title' => $title,
	]);
	
	return null;
}

// Get database
$db = App::resolve(Database::class);

// Insert note
$db->query('INSERT INTO note (title, user) VALUES (:title, :user)', [
		'title' => $title,
		'user' => 3, // Hardcoded for now
]);

// Redirect to notes
header('Location: /notes');
die();
