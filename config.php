<?php

$host       = "sql313.epizy.com";
$username   = "epiz_23675750";
$password   = "CmrmbW3s";
$dbname     = "epiz_23675750_tracker"; // will use later
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