<?php


session_start();
if(isset($_SESSION['login'])) {
$login = $_SESSION['login']; }


$key = $_POST['key'];

require_once 'connect.php'; //подкл файл

$kart = mysqli_query($connect, "SELECT * FROM `promokods` WHERE promokod = '$key' ");
$kart1 = mysqli_fetch_assoc($kart);


if(isset($kart1['sale'])){

    $perem = $kart1['sale'];
}
// $kart1['sale']


if(!empty($perem)) {
mysqli_query($connect, "INSERT INTO `promologin` (`id`, `login`, `promo`) VALUES (NULL, '$login', '$perem');");
}

if(isset($kart1['sale'])){
    $result_cost = $_POST['cost'] - ($_POST['cost'] * $kart1['sale'] / 100);
    echo $result_cost;
}else{
    echo 'неверный промокод';
}
// $result_cost = $_POST['cost'] - ($_POST['cost'] * $kart1['sale'] / 100);





?>