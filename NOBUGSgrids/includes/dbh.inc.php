<?php

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPasswordname = '';
$dbName = 'filemanager';


$conn = mysqli_connect($dbServername, $dbUsername, $dbPasswordname, $dbName)
        or die("Falha ao connectar ao Banco de Dados!");
