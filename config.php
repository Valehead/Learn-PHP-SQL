<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->required(['DB_SERVER', 'DB_USERNAME', 'DB_PASSWORD', 'DB_NAME']);
$dotenv->load();

//work
define('DB_SERVER', $_ENV['DB_SERVER']);
define('DB_USERNAME', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_NAME']);



?>
