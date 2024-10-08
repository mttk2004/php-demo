<?php

use Core\App;
use Core\Database;

// Get database
$db = App::resolve(Database::class);

// Get note id
$noteId = $_POST['id'];

// Check if note exists
$note = $db->query('SELECT * FROM note WHERE id = :id', ['id' => $noteId])->find();

// If note does not exist, return 404
if (!$note) abort(404);

// Check if user owns the note
authorize($note['user'] === 3); // Hardcoded for now

// Delete note
$db->query('DELETE FROM note WHERE id = :id', ['id' => $noteId])->find();

// Redirect to notes
header('Location: /notes');
exit;
