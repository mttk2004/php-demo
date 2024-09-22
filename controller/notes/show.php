<?php

use Core\Database;

$heading = 'Single Note';
$config = require_once(__DIR__ . '/../../Core/config.php');
$db = new Database($config);


// if id not exist
if (!isset($_GET['id'])) {
  abort(404);
}

$note = $db->query('SELECT * FROM note where id = :id', ['id' => $_GET['id']])->findOrFail();

// dd($note);

// if found but not the user
authorize($note['user'] === 3); // hardcoded for now

// view
view('notes/show', [
  'heading' => 'Single Note',
  'note' => $note
]);