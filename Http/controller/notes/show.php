<?php

use Core\App;
use Core\Database;

$heading = 'Single Note';
// Get database
$db = App::resolve(Database::class);

// Get note id
$noteId = $_GET['id'] ?? null;

// Check if id exists
if (!$noteId) abort(404);

$note = $db->query('SELECT * FROM note WHERE id = :id', ['id' => $noteId])->findOrFail();

// Authorize access to the note
authorize($note['user'] === 3); // Hardcoded for now

// View
view('notes/show', [
	'heading' => 'Single Note',
	'note' => $note
]);
