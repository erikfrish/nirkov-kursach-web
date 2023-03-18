<?php
    error_reporting(E_ALL);
    require_once 'connect.php'; 
    $name = $_POST['name']; 
    $data = $_POST['data']; 
    $comment = $_POST['comment']; 
    $id = $_POST['id']; 

    mysqli_query($connect, "INSERT INTO `commentproduct` (`id`, `idproduct`, `name`, `data`, `comment`) VALUES (NULL, '$id', '$name', '$data', '$comment');");
    header('Location: cartproduct.php?id=' .$id); 
?>