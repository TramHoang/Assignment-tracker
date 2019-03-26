<?php

$host       = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "tracker"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}