<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                  }
  require_once '../connect.php'; //подкл файл

$id = $_POST['id'];
$idcomment = $_POST['idcomment'];



mysqli_query($connect, "DELETE FROM commentproduct WHERE `commentproduct`.`id` = $idcomment");


  header('Location: /administrator/admincartproduct.php?id=' .$id); 


?>