<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                  }
  require_once '../connect.php'; //подкл файл

$status = $_POST['status'];
$idzakaza = $_POST['idzakaza'];



mysqli_query($connect, "UPDATE `zakaz` SET `status` = '$status' WHERE `zakaz`.`id` = '$idzakaza' ");


header('Location: adminshopping.php');

?>