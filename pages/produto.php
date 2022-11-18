<?php
$id = intval($_GET['id']);
if($id==0)
    header('Location: index.php');
$sql_query = $mysqli->query("SELECT * FROM produtos WHERE id = '$id'");
$produto = $sql_query->fetch_assoc();

?>
