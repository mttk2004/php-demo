<?php

require './Database.php';

$config = require './config.php';

$db = new Database($config);

$result = $db->query('SELECT * FROM `post`')->fetchAll();

foreach ($result as $row) {
  echo "<p>" . $row['title'] . "</p>";
}

require './util/functions.php';
require './router.php';