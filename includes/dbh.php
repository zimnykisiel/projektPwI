<?php
$servername = 'localhost';
$dBUsername = 'root';
$dBPassword = '';
$dBName = 'militaria1';

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Błąd w komunikacji: ".mysqli_connect_error());
}