<?php
  error_reporting(E_ALL);
 
  require_once 'connect.php'; //подкл файл


$idshop = $_POST['idshop'];
$colvo = $_POST['colvo'];
$znak = $_POST['znak'];


if(($colvo > 1)and($znak=='-')){
    $colvo = $colvo - 1;
}

if($znak=='+'){
    $colvo = $colvo + 1;
}

mysqli_query($connect, "UPDATE `shoppincart` SET `colvo` = '$colvo' WHERE `shoppincart`.`id` = '$idshop' ");

header('Location: shopping.php');

?>