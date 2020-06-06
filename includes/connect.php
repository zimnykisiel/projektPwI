<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'militaria1';

try {
    $db = new PDO("mysql:host=$host;dbname=$database", $user, $password, 
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));  
} catch (PDOException $e) {
    die("Blad przy laczeniu");
} 