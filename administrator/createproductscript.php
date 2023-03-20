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




$title = $_POST['title'];
$opisanie = $_POST['opisanie'];
$opisanie = $_POST['opisanie'];
$price = $_POST['price'];
$category = $_POST['category'];
$xar = $_POST['xar'];



mysqli_query($connect, "INSERT INTO `product` (`id`, `img`, `title`, `opisanie`, `price`, `category`, `xar`) VALUES (NULL, '$name', '$title', '$opisanie', '$price', '$category', '$xar')");


  header('Location: /administrator/admincatalog.php'); 


?>