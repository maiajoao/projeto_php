<?php

$hostname = '';
$username = '';
$password = '';
$database = '';

$mysqli = new mysqli($hostname, $user, $password, $database);

if($mysqli->connect_errno) {
    die("Erro na conexão - $mysqli->connect_error");
}