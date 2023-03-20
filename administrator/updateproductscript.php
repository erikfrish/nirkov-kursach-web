<?php
  error_reporting(E_ALL);
  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                    die();
                  }
  require_once '../connect.php'; //подкл файл



  if(!empty($_FILES['img'])) {
    $file = $_FILES['img'];
    $name = $file['name']; 
    $patchfile = __DIR__.'/imgproduct/'.$name;
    if(!move_uploaded_file($file['tmp_name'], $patchfile)){
        echo 'файл не смогг загрузиться';

    }
}




$id = $_POST['id'];
$title = $_POST['title'];
$opisanie = $_POST['opisanie'];
$price = $_POST['price'];
$category = $_POST['category'];
$xar = $_POST['xar'];


$kart = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '$id'");
$kart = mysqli_fetch_all($kart);
foreach($kart as $kartobect){
    $img1v2 = $kartobect[1];
} 

if(empty($name)){
    $name =  $img1v2;
}



mysqli_query($connect, "UPDATE `product` SET `img` = '$name', `title` = '$title', `opisanie` = '$opisanie', `price` = '$price', `category` = '$category', `xar` = '$xar' WHERE `product`.`id` = '$id' ");

// UPDATE `product` SET `img` = '$name', `title` = '$title', `opisanie` = '$opsanie', `price` = '$price', `category` = '$category', `xar` = '$xar' WHERE `product`.`id` = '$id'

header('Location: admincartproduct.php?id=' .$id);

?>