<?php

use Core\Database;

$heading = 'Notes';
$config = require_once(__DIR__ . '/../../Core/config.php');
$db = new Database($config);

$notes = $db->query('SELECT * FROM note where user = 3')->findAll(); // hardcoded for now


// view
view('notes/index', [
  'heading' => 'Notes',
  'notes' => $notes
]);