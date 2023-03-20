<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                    die();
                  }
  require_once '../connect.php'; //подкл файл

$idorder = $_POST['idorder'];



mysqli_query($connect, "DELETE FROM shopidzakazidprod WHERE `shopidzakazidprod`.`id` = $idorder");


  header('Location: /administrator/adminshopping.php'); 


?>