<?php

$hostname = '';  // localhost para o Apache
$username = '';  // root
$password = '';  // Vazio caso não tenha senha definida no seu BD 
$database = '';  // Nome do banco de dados

$mysqli = new mysqli($hostname, $user, $password, $database); // Tenta fazer a conexão mysql.

if($mysqli->connect_errno) {
    die("Erro na conexão - $mysqli->connect_error");
}