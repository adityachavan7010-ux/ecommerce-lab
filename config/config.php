<?php

// Database configuration
$dbHost = 'localhost';
$dbName = 'ecommerce_lab';
$dbUser = 'root';
$dbPass = '';

// MySQLi connection
$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

?>