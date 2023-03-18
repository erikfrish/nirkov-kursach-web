<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
        .colvo {
            display: inline-block;
        }
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
            <table class="table">
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Срок</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_SESSION['login'])) {
                ?>
                    <?php 
                     $itog = 0;
                        $kart = mysqli_query($connect, "SELECT * FROM `shoppincart` WHERE login='$login' ");
                        $kart = mysqli_fetch_all($kart);
                        foreach($kart as $count){
                    ?>
                    <tr>
                        <?php
                            $title = $count[2];
                            $kart1 = mysqli_query($connect, "SELECT * FROM `product` WHERE id='$title' ");
                            $kart1 = mysqli_fetch_all($kart1);
                            foreach($kart1 as $count1){
                        ?>
                        <td><?=$count1[2];?></td>
                        <?php }
                            $idmod = $count[3];
                            if($idmod=='1day'){
                                $modificat = '1 день';
                            }else{
                                $kart2 = mysqli_query($connect, "SELECT * FROM `modification` WHERE id='$idmod' ");
                                $kart2 = mysqli_fetch_all($kart2);
                                foreach($kart2 as $count2){
                                $modificat = $count2[2];
                                }
                            }
                        ?>
                        <td><?=$modificat;?></td>
                        <?php ?>
                        <td>
                            <div>
                                <div class="colvo">
                                    <form action="colvo.php" method="post" enctype="multipart/form-data"> 
                                        <input type="hidden" name="idshop" value="<?=$count[0]?>">
                                        <input type="hidden" name="colvo" value="<?=$count[4]?>">
                                        <input type="hidden" name="znak" value="-">
                                        <button class="create-account" type="submit">-</button>
                                    </form>
                                </div>
                                <div class="colvo">
                                    <?=$count[4];?> шт 
                                </div>
                                <div class="colvo">
                                    <form action="colvo.php" method="post" enctype="multipart/form-data"> 
                                        <input type="hidden" name="idshop" value="<?=$count[0]?>">
                                        <input type="hidden" name="colvo" value="<?=$count[4]?>">
                                        <input type="hidden" name="znak" value="+">
                                        <button class="create-account" type="submit">+</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <?php
                        $colvo = $count[4];
                        $idprod = $count[2];
                        if($idmod=='1day'){
                            $kart3 = mysqli_query($connect, "SELECT * FROM `product` WHERE id='$idprod' ");
                            $kart3 = mysqli_fetch_all($kart3);
                            foreach($kart3 as $count3){
                            $price1 = $count3[4];
                            }
                            $price1 = $price1*$colvo;
                            $itog = $itog + $price1;
                            ?>
                            <td><?= $price1 ?> р.</td>
                            <?php
                        }else{
                            $kart4 = mysqli_query($connect, "SELECT * FROM `modification` WHERE id='$idmod' ");
                            $kart4 = mysqli_fetch_all($kart4);
                            foreach($kart4 as $count4){
                            $price2 = $count4[3];
                            }
                            $price2 = $price2*$colvo;
                            $itog = $itog + $price2;
                            ?>
                            <td><?= $price2 ?> р.</td>
                            <?php
                        }
                        ?>
                        <td>
                            <form action="deleteshop.php" method="post" enctype="multipart/form-data"> 
                                <input type="hidden" name="idshop" value="<?=$count[0]?>">
                                <button class="create-account" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>
            </table>
            <h3 class="itog">Итог: 
                
            <?php
if(isset($_SESSION['login'])) {

            ?>
            
            
            <?= $itog ?> р.</h3>
            <div class="promo">
                <p>Введите промокод:</p>
                <input class="form-control item" type="text" name="Промокод" minlength="6" id="coupon" placeholder="Промокод" required>
                <br><br>
                <button id="save" class="buttonforbasket1" >Применить</button>
                <h3 class="itog"><div id="sale"></div></h3>
            </div>
            <script type="text/javascript">
                document.getElementById("save").onclick = function() {
                    if(document.getElementById("coupon").value.length != 0) {
                        var http = new XMLHttpRequest();
                        http.open("POST", "coupon_check.php", true);
                        http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        http.onload = function() {
                            // alert(http.responseText);
                            if(http.status != 200) alert("error");
                            else{
                                document.getElementById('sale').innerHTML = "Итог c учетом промокода: " + http.responseText;
                            }
                        }
                        http.send("key=" + document.getElementById("coupon").value + "&cost=<?= $itog ?>");
                    }else{
                        alert("Вы не ввели купон");
                    }
                }
            </script>
            <?php
            $salepromo = 0;
            require_once 'connect.php'; //подкл файл
            $kart5 = mysqli_query($connect, "SELECT * FROM `promologin` WHERE login = '$login' ");
            $kart5 = mysqli_fetch_all($kart5);
            foreach($kart5 as $count5){
            $salepromo = $count5[2];
            }
            $result_cost = $itog - ($itog * $salepromo / 100);
}
            ?>
            <div class="oformzak">
            <form action="zakazscript.php" method="post" enctype="multipart/form-data">       
                <input type="hidden" name="login" value="<?= $login ?>">
                <input type="hidden" name="itog" value="<?= $itog ?>">
                <input type="hidden" name="status" value="Поступил в работу">
                <input type="hidden" name="data" value="<?=date('Y-m-d') ?>">
                <!-- <input type="hidden" name="promokod" value="$salepromo"> -->
                <p class="polevvod">Как к вам обращаться:</p>
                <input class="polevvod" name="name" type="text" size="70"  required>
                <p class="polevvod">Адрес доставки:</p>
                <input class="polevvod" name="adress" type="text" size="70"  required>
                <p class="polevvod">Номер телефона:</p>
                <input class="polevvod" name="mobile" type="text" size="70"  required>
                 <br><br>
                 <?php
                    if(isset($_SESSION['login'])) {
                ?>
                <div class="itogbutton">
                    <button class="buttonforbasket1" type="submit" >Оформить закaз</button>
                </div>
            </form>
            <?php }else{ ?>
                <form action="authoriz.php" method="post" enctype="multipart/form-data"> 
                    <button class="buttonforbasket1" type="submit" >Войти, чтобы оформить заказ</button>
                </form>
                <?php } ?>
            </div>

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
