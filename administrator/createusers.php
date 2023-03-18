<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                  }
  require_once '../connect.php'; //подкл файл




$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];



mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES (NULL, '$name', '$login', '$password')");


  header('Location: adminsignin.php'); 


?>