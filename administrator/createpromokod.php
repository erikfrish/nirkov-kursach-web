<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                  }
  require_once '../connect.php'; //подкл файл

$promokod = $_POST['promokod'];
$sale = $_POST['sale'];



mysqli_query($connect, "INSERT INTO `promokods` (`id`, `promokod`, `sale`) VALUES (NULL, '$promokod', '$sale');");


  header('Location: adminpromokod.php'); 


?>