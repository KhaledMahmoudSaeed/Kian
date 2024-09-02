<?php

$dsn = "mysql:host=localhost;dbname=m";
$username = "root";
$pass = "";

try {
    $connection = new PDO($dsn, $username, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}
