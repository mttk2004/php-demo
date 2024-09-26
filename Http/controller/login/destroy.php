<?php

use Core\Session;


// Log the user out
Session::unset('user');


// Redirect to the home page
header('Location: /');
