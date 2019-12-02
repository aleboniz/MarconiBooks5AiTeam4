<?php

require_once "configLibro.php";

$id = $_GET['id'];
$utente = $_GET['utente'];

$query = "DELETE FROM `books` WHERE `id` LIKE '%".$id."%'";

$connect = mysqli_connect("localhost", "root", "", "booksdb");

$delete = mysqli_query($connect, $query);

header("location: utente.php?utente=$utente");
?>
