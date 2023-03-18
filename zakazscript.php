<?php 
error_reporting(E_ALL);

require_once 'connect.php'; 

$itog = $_POST['itog'];
$login = $_POST['login'];
$status = $_POST['status'];
$data = $_POST['data'];
$name = $_POST['name'];
$adress = $_POST['adress'];
$mobile = $_POST['mobile'];
// $promokod = //скидка в процентах

 


   $kart = mysqli_query($connect, "SELECT * FROM `promologin` WHERE login = '$login' ");
   $kart = mysqli_fetch_all($kart);
   foreach($kart as $elotzuv){ 
   $salepromo = $elotzuv[2];
   }
//    $result_cost = $itog - ($itog * $salepromo / 100);

// echo $result_cost;


mysqli_query($connect, "INSERT INTO `zakaz` (`id`, `data`, `status`, `login`, `adress`, `name`, `mobile`, `promokod`) VALUES (NULL, '$data', '$status', '$login', '$adress', '$name', '$mobile', '$salepromo') ");

$kart = mysqli_query($connect, "SELECT * FROM `shoppincart`");
$kart = mysqli_fetch_all($kart);
foreach($kart as $kartobect){
    $loginkorzina = $kartobect[1];
    $idobuvkorzina = $kartobect[2];
    $idmodific = $kartobect[3];
    $colvokor = $kartobect[4];
    if($loginkorzina == $login){
        $karts = mysqli_query($connect, "SELECT * FROM `zakaz` ORDER BY `id` DESC LIMIT 1 ");
        $karts = mysqli_fetch_all($karts);
        foreach($karts as $kartobects){
            $idzakaza = $kartobects[0];
            mysqli_query($connect, "INSERT INTO `shopidzakazidprod` (`id`, `idzakaz`, `idproduct`, `idmodification`, `colvo`) VALUES (NULL, '$idzakaza', '$idobuvkorzina', '$idmodific', '$colvokor')");
         
        }
    }
} 


mysqli_query($connect, "DELETE FROM shoppincart WHERE `shoppincart`.`login` = '$login' ");
mysqli_query($connect, "DELETE FROM promologin WHERE `promologin`.`login` = '$login' ");

// header('Location: orders.php');

header('Location: orders.php');



?>