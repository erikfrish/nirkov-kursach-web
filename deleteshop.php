<?php
error_reporting(E_ALL);

require_once 'connect.php'; //подкл файл

$id = $_POST['idshop'];




mysqli_query($connect, "DELETE FROM shoppincart WHERE `shoppincart`.`id` = $id");


  header('Location: shopping.php' ); 


?>