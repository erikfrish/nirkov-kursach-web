<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                  }
  require_once '../connect.php'; //подкл файл

$idcat = $_POST['idcat'];



mysqli_query($connect, "DELETE FROM category WHERE `category`.`id` = '$idcat'");


  header('Location: /administrator/admincatalog.php'); 


?>