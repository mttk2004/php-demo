<?php

use Core\App;
use Core\Database;

// Get note id
$noteId = $_GET['id'] ?? null;

// Check if id exists
if (!$noteId) abort(404);

// Get database
$db = App::resolve(Database::class);

// Get note
$note = $db->query('SELECT * FROM note WHERE id = :id', ['id' => $noteId])->findOrFail();

// Authorize access to the note
authorize($note['user'] === 3); // Hardcoded for now

view('notes/edit', [
	'heading' => 'Edit Note ...',
	'errors' => [],
	'note' => $note
]);
