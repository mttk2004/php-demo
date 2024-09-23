<?php

$router = new \Core\Router;

$router->get('/', 'home');
$router->get('/about', 'about');
$router->get('/contact', 'contact');

$router->get('/notes', 'notes/index');

$router->get('/notes/create', 'notes/create');
$router->post('/notes/store', 'notes/store');

$router->get('/note', 'notes/show');
$router->delete('/note', 'notes/destroy');
