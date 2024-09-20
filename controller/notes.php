<?php

$heading = 'Notes';
$config = require_once(__DIR__ . '/../config.php');
$db = new Database($config);

$notes = $db->query('SELECT title FROM note')->fetchAll();  


// view
require_once(__DIR__ . '/../view/notes.view.php');