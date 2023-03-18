<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="namecompany">
                <a href="main.html">ПРОКАТ ТУРИСТИЧЕСКОГО СНАРЯЖЕНИЯ</a>
            </div>
            <div class="menu">
				<ul>
                    <li><a href="main.php">ГЛАВНАЯ</a></li>
                    <li><a href="contacts.php">КОНТАКТЫ</a></li>
					<li><a href="catalog.php">КАТАЛОГ</a></li>
                    <li><a href="comment.php">ОТЗЫВЫ</a></li>
                    <li><a href="orders.php">ЗАКАЗЫ</a></li>
					<li><a href="shopping.php">КОРЗИНА</a></li>
                    <li><a href="signin.php">АВТОРИЗАЦИЯ</a></li>
				</ul>
			</div>
            <?php 
            session_start();
            if(isset($_SESSION['login'])) {
            $login = $_SESSION['login']; 
            require_once 'connect.php';
            $kart = mysqli_query($connect, "SELECT * FROM `users` WHERE login='$login' ");
            $kart = mysqli_fetch_all($kart);
            foreach($kart as $countt){
                $namefam= $countt[1];
            }
            ?>
            <div class="namecompany">
                <a href="">ПОЛЬЗОВАТЕЛЬ: <?=$namefam?></a>
            </div>
            <?php  }?>
        </div>
        <div class="contentpage">
            <?php
            if(isset($_SESSION['login'])) {
                $kart = mysqli_query($connect, "SELECT * FROM `zakaz` WHERE login='$login' ");
                $kart = mysqli_fetch_all($kart);
                foreach($kart as $count){    $itog = 0;   
            ?>
            <h3>Заказ №<?=$count[0]?>  дата: <?=$count[1]?></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Срок аренды</th>
                        <th>Количество</th>
                        <th>Цена</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $idzakaz = $count[0];
                    $kart1 = mysqli_query($connect, "SELECT * FROM `shopidzakazidprod` WHERE idzakaz='$idzakaz'");
                    $kart1 = mysqli_fetch_all($kart1);
                    foreach($kart1 as $count1){
                        $idprodut = $count1[2];
                    ?>
                    <tr>
                        <?php
                            $kart2 = mysqli_query($connect, "SELECT * FROM `product` WHERE id='$idprodut'");
                            $kart2 = mysqli_fetch_all($kart2);
                            foreach($kart2 as $count2){
                            $priceday = $count2[4];
                        ?>
                        <td><?=$count2[2] ?></td>
                        <?php } 
                        $srok = $count1[3];
                        if($srok=='1day'){
                            $srok = '1 день';
                        }else{
                            $kart3 = mysqli_query($connect, "SELECT * FROM `modification` WHERE id='$srok'");
                            $kart3 = mysqli_fetch_all($kart3);
                            foreach($kart3 as $count3){
                                $srok = $count3[2];
                                $pricemod = $count3[3];
                            }
                        }
                        $colvo = $count1[4];
                        ?>
                        <td><?=$srok ?></td>
                        <td><?=$colvo ?></td>
                        <?php
                            if($srok=='1 день'){
                                $pricemod = $priceday;
                            }
                            $priceprod = $colvo*$pricemod;
                            $itog = $itog + $priceprod;
                        ?>
                        <td><?=$priceprod?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <p>Статус: <?=$count[2]?></p>
            <p>Адрес дотавки: <?=$count[4]?></p>
            <?php
                $promokod = $count[7];
                if(empty($promokod)){
                    $promokod = 'нет';
                }else{
                    $promokod .= "%";
                }
            ?>
            <p>Промокод: <?=$promokod?></p>
            <?php
                 $promokod = $count[7];
                 if(empty($promokod)){
                     $promokod = 0;
                 }else{
                     $promokod = $count[7];
                 }
                
                
                $result_cost = $itog - ($itog * $promokod / 100);
                
            ?>
            <p>Итоговая стоимость: <?=$result_cost?></p>
            <hr>
            <br>

        <?php 
        $itog = 0;
        } 
    }else{
?>
 <h3>Войдите, чтобы просматривать заказы.</h3>

<?php
    }
        
        ?>
        </div>
        <div class="bottom">
            <div class="bottom2">
                <p>Телефон: +7 981 777 14 77 Андрей</p>
                <p>с 10 до 21 без обеда, выходных</p>
            </div>
            <div class="bottom3">
                <p>м. Озерки, ул. Есенина д.5Б</p>
                <p>Е-mail: prokatlait@mail.ru</p>
            </div>
        </div>
    </div>
</body>
</html>
