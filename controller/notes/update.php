<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$title = $_POST['title'];
$id = $_POST['id'];
$errors = [];

// 1. Find the corresponding note
$note = $db->query('SELECT * FROM note WHERE id = :id', [
		':id' => $id,
])->findOrFail();

// 2. Authorize the user can edit the note
authorize($note['user'] === 3); // hardcoding the user id for now

// 3. Validate the form data
if (!Validator::isValidString($title, 3, 255)) {
	$errors['title'] = 'Title must be between 3 and 255 characters.';
	
	view('notes/edit', [
			'heading' => 'Edit Note',
			'errors' => $errors,
			'title' => $title,
			'note' => $note,
	]);
	die();
}

// 4. Update the note
$db->query('UPDATE note SET title = :title WHERE id = :id', [
		':title' => $title,
		':id' => $id,
]);

// 5. Redirect to the note page
header('Location: /note?id=' . $id);

