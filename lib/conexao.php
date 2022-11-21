<?php

$hostname = 'localhost';  // localhost para o Apache
$username = 'root';  // root
$password = '';  // Vazio caso não tenha senha definida no seu BD 
$database = 'loja_manga';  // Nome do banco de dados

$mysqli = new mysqli($hostname, $username, $password, $database); // Tenta fazer a conexão mysql.

if($mysqli->connect_errno) {
    die("Erro na conexão - $mysqli->connect_error");
}

