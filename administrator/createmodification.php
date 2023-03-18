<?php
  error_reporting(E_ALL);
  
  session_start();
  if(($_SESSION['login'])!='admin') {
    header('Location: ../main.php' ); 
  }

  require_once '../connect.php'; //подкл файл

$id = $_POST['idproduct'];
$srok = $_POST['srok'];
$price = $_POST['price'];


mysqli_query($connect, "INSERT INTO `modification` (`id`, `idproduct`, `time`, `price`) VALUES (NULL, '$id', '$srok', '$price')");


  header('Location: /administrator/admincartproduct.php?id=' .$id); 


?>