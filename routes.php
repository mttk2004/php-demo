<?php

use Core\Router;

$router = new Router;

$router->get('/', 'home');
$router->get('/about', 'about');
$router->get('/contact', 'contact');

$router->get('/notes', 'notes/index')->only('auth');

// Create note and store note
$router->get('/notes/create', 'notes/create')->only('auth');
$router->post('/notes/create', 'notes/store')->only('auth');

// Show note and delete note
$router->get('/note', 'notes/show')->only('auth');
$router->delete('/note', 'notes/destroy')->only('auth');

// Edit note and update note
$router->get('/note/edit', 'notes/edit')->only('auth');
$router->patch('/note/edit', 'notes/update')->only('auth');

// Registration
$router->get('/register', 'registration/create')->only('guest');
$router->post('/register', 'registration/store')->only('guest');

// Login
$router->get('/login', 'login/create')->only('guest');
$router->post('/login', 'login/store')->only('guest');

// Logout
$router->delete('/login', 'login/destroy')->only('auth');
