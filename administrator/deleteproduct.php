<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                  }
  require_once '../connect.php'; //подкл файл

$idproduct = $_POST['id'];




mysqli_query($connect, "DELETE FROM product WHERE `product`.`id` = $idproduct");


  header('Location: /administrator/admincatalog.php'); 


?>