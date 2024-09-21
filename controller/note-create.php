<?php

require __DIR__ . '/../Validator.php';
$config = require_once(__DIR__ . '/../config.php');
$db = new Database($config);
$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];
  $title = $_POST['title'];

  // validate title
  if (!Validator::isValidString($title, 1, 255)) {
    $errors['title'] = 'Title is required and must be between 1 and 255 characters.';
  }

  if (empty($errors)) {
    // insert into database
    $db->query('insert into note(title, user) values (:title, :user)', [
      ':title' => $title,
      ':user' => 3 // hardcoded for now
    ]);
  }
}

require_once(__DIR__ . '/../view/note-create.view.php');