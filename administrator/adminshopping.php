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
                    <li><a href="admincatalog.php">КАТАЛОГ</a></li>
                    <li><a href="admincomment.php">ОТЗЫВЫ</a></li>
					<li><a href="adminshopping.php">ЗАКАЗЫ</a></li>
                    <li><a href="adminsignin.php">ПОЛЬЗОВАТЕЛИ</a></li>
                    <li><a href="adminpromokod.php">ПРОМОКОДЫ</a></li>
                    <li><a href="signinadmin.php">ВЫЙТИ</a></li>
				</ul>
			</div>
            <div class="namecompany">
                <a href="">АДМИНИМСТРАТОР</a>
            </div>
        </div>
        <?php
            session_start();
            if(($_SESSION['login'])!='admin') {
            header('Location: ../main.php' ); 
            }
            require_once '../connect.php';
        ?>
        <div class="contentpage">
            <?php
                $kart = mysqli_query($connect, "SELECT * FROM `zakaz` ORDER BY `zakaz`.`id` DESC ");
                $kart = mysqli_fetch_all($kart);
                foreach($kart as $count){    $itog = 0;   
            ?>
            <h3>Заказ №<?=$count[0]?>  дата: <?=$count[1]?></h3>
            <p>Кто заказал: <?=$count[5]?></p>
            <p>Контакт: <?=$count[6]?></p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Срок аренды</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Удалить</th>
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
                        <td>  <form action="deleteorderposition.php" method="post">
                            <input type="hidden" value="<?=$count1[0]?>" name="idorder">
                            <input  type="submit" value="Удалить">
                        </form></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <p>Статус: <?=$count[2]?></p>
            <form action="updatestatus.php" method="post">
                <input type="text" value="<?=$count[2]?>" name="status">
                <input type="hidden" value="<?=$count[0]?>" name="idzakaza">
                <input  type="submit" value="Изменить">
            </form>
            

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
            <form action="deleteorder.php" method="post">
                <input type="hidden" value="<?=$count[0]?>" name="idorder">
                <input class="buttonforbasketmod"  type="submit" value="Удалить заказ">
            </form>
            <hr>
            <br>
            <?php 
            $itog = 0;
            } ?>
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
