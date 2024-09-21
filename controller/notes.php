<?php

$heading = 'Notes';
$config = require_once(__DIR__ . '/../config.php');
$db = new Database($config);

$notes = $db->query('SELECT * FROM note where user = 3')->findAll(); // hardcoded for now


// view
require_once(__DIR__ . '/../view/notes.view.php');