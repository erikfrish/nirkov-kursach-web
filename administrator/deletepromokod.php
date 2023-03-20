<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                    die();
                  }
  require_once '../connect.php'; //подкл файл

$id = $_POST['id'];




mysqli_query($connect, "DELETE FROM `promokods` WHERE `promokods`.`id` = $id");


  header('Location: adminpromokod.php' ); 


?>