<?php


  error_reporting(E_ALL);
  
  session_start();
  if(($_SESSION['login'])!='admin') {
    header('Location: ../main.php' ); 
  }

  require_once '../connect.php'; //подкл файл

$categoria = $_POST['categoria'];



mysqli_query($connect, "INSERT INTO `category` (`id`, `category`) VALUES (NULL, '$categoria')");


  header('Location: /administrator/admincatalog.php'); 


?>