<?php

$router = new \Core\Router;

$router->get('/', 'home');
$router->get('/about', 'about');
$router->get('/contact', 'contact');

$router->get('/notes', 'notes/index');

// Create note and store note
$router->get('/notes/create', 'notes/create');
$router->post('/notes/create', 'notes/store');

// Show note and delete note
$router->get('/note', 'notes/show');
$router->delete('/note', 'notes/destroy');

// Edit note and update note
$router->get('/note/edit', 'notes/edit');
$router->patch('/note/edit', 'notes/update');

// Registration
$router->get('/register', 'registration/create');
$router->post('/register', 'registration/store');
