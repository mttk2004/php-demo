<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . './util/functions.php';

spl_autoload_register(function ($class) {
  require BASE_PATH . "./{$class}.php";
});

require BASE_PATH . './Core/router.php';