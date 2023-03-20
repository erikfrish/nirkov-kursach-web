<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                    die();
                  }
  require_once '../connect.php'; //подкл файл

$id = $_POST['idproduct'];
$idmod = $_POST['idmod'];



mysqli_query($connect, "DELETE FROM modification WHERE `modification`.`id` = $idmod");


  header('Location: /administrator/admincartproduct.php?id=' .$id); 


?>