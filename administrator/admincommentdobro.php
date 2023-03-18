<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                  }
  require_once '../connect.php'; //подкл файл

  $idcomment = $_POST['idcomment'];
  $table = mysqli_query($connect, "UPDATE `comments` SET `moderation` = 'yes' WHERE `comments`.`id` = '$idcomment';");
  
header('Location: admincomment.php');

?>