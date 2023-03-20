<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                    die();
                  }
  require_once '../connect.php'; //подкл файл
  
  $idcommentdelete = $_POST['idcommentdelete'];
  $table1 = mysqli_query($connect, "DELETE FROM comments WHERE `comments`.`id` = '$idcommentdelete' ");
  
header('Location: admincomment.php');

?>