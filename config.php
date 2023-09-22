<?php
session_start();

$base = 'http://localhost:8888/b7-review-php/mod13-OO-Devsbook2';

// $db_name = 'devsbook_mod13_220622';
$db_name = 'devsbook';
// $db_name = 'Mod13-Devsbookoo';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';

// $maxWidth = 800;
// $maxHeight = 800;

$pdo = new PDO('mysql:dbname='.$db_name.';host='.$db_host, $db_user, $db_pass);