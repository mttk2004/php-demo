<?php

use Core\App;
use Core\Database;

$heading = 'Notes';
// Get database
$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM note where user = 3')->findAll(); // hardcoded for now

// view
view('notes/index', [
  'heading' => 'Notes',
  'notes' => $notes
]);
