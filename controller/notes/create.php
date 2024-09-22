<?php

use Core\Database;
use Core\Validator;

$config = require_once(__DIR__ . '/../../Core/config.php');
$db = new Database($config);
$heading = 'Create Note';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];

  // validate title
  if (!Validator::isValidString($title, 5, 255)) {
    $errors['title'] = 'Title is required and must be between 5 and 255 characters.';
  }

  if (empty($errors)) {
    // insert into database
    $db->query('insert into note(title, user) values (:title, :user)', [
      ':title' => $title,
      ':user' => 3 // hardcoded for now
    ]);
  }
}

// view
view('notes/create', [
  'heading' => 'Create Note',
  'errors' => $errors
]);