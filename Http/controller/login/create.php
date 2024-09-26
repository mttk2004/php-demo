<?php

use Core\Session;


view('login/create', [
		'heading' => 'Login to your account',
		'errors' => Session::getFlash('errors') ?? [],
]);
