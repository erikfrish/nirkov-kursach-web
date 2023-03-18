
<?php
error_reporting(E_ALL);

require_once 'connect.php'; //подкл файл

$idtovar = $_POST['idtovar'];
$login = $_POST['login'];
$modification = $_POST['modification'];
$colvo = $_POST['colvo'];
$otkuda = $_POST['otkuda']; //cart or catalog
$position = $_POST['position'];

$proverka = 0;
$kart = mysqli_query($connect, "SELECT * FROM `shoppincart` WHERE login='$login' ");
$kart = mysqli_fetch_all($kart);
foreach($kart as $count){
    if(($count[2]==$idtovar)and($count[3]==$modification)){
        $proverka = $proverka+1;
    }
}

if($proverka!=0){
    if($otkuda=='cart'){
        header('Location: cartproduct.php?id=' .$idtovar); 
        } else{
         header('Location: catalog.php?position=' .$position);  
        }
}else{
    mysqli_query($connect, "INSERT INTO `shoppincart` (`id`, `login`, `idproduct`, `idmodification`, `colvo`) VALUES (NULL, '$login', '$idtovar', '$modification', '1')");

    if($otkuda=='cart'){
    header('Location: cartproduct.php?id=' .$idtovar); 
    } else{
     header('Location: catalog.php?position=' .$position);  
    }
}

// if($otkuda=='cart'){
// header('Location: cartproduct.php?id=' .$idtovar); 
// } else{
//  header('Location: catalog.php?position=' .$position);  
// }

?>
