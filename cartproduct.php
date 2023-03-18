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
            <div class="contentcartproduct">
                <?php 
                require_once 'connect.php';
                $id = $_GET['id'];
                $table = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '$id' ");
                $table = mysqli_fetch_all($table); 
                foreach($table as $element){ ?>
                    <div class="cartproductname">
                        <a href="#"><img src="/administrator/imgproduct/<?=$element[1]?>" width="740px" height="600px"></a>
                        <h3><?=$element[2]?></h3>
                        <p><?=$element[3]?></p>
                    </div>
                    <div>
                        <div class="pricevcard">
                            <h3><?=$element[4]?>p./сут.</h3>
                        </div>
                        <div class="buttonforbasket">
                            <?php
                                if(isset($_SESSION['login'])) {
                            ?>
                            <form action="createshop.php" method="post" enctype="multipart/form-data"> 
                                <input type="hidden" name="idtovar" value="<?=$element[0]?>">
                                <input type="hidden" name="login" value="<?= $login ?>">
                                <input type="hidden" name="modification" value="1day">
                                <input type="hidden" name="colvo" value="1">
                                <input type="hidden" name="otkuda" value="cart">
                                <button class="buttonforbasket1" type="submit" >В корзину</button>
                            </form>
                            <?php }else{ ?>
                            Чтобы заказать авторизуйтесь:
                            <form action="authoriz.php" method="post" enctype="multipart/form-data"> 
                                <button class="buttonforbasket1" type="submit" >Войти</button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <button class="tablinks" onclick="openParametr(event, 'Описание')">Описание</button>
                    <button class="tablinks" onclick="openParametr(event, 'Модификации')">Модификации</button>
                    <button class="tablinks" onclick="openParametr(event, 'Отзывы')">Отзывы</button>
                </div>
                <div id="Описание" class="tabcontent">
                    <pre>
    <?=$element[6]?>
                    </pre>
                <?php } ?>
            </div>
            <div id="Модификации" class="tabcontent">
                <?php  require_once 'connect.php';
                $id = $_GET['id'];
                $table1 = mysqli_query($connect, "SELECT * FROM `modification` WHERE `idproduct` = '$id' ");
                $table1 = mysqli_fetch_all($table1); 
                foreach($table1 as $element1){ ?>
                    <div class="cartmod">
                        <div class="cartmod1">
                            <img src="/administrator/imgproduct/<?=$element[1]?>" width="200px" height="170px">
                            <h5><?=$element[2]?></h5>
                        </div>
                        <div>
                            <div class="cartmod2">
                                <p>Срок проката: <?=$element1[2]?>.</p>
                                <p>Цена: <?=$element1[3]?> p.</p>
                            </div>
                            <div class="buttonforbasket">
                            <?php
                                if(isset($_SESSION['login'])) {
                            ?>
                                <form action="createshop.php" method="post" enctype="multipart/form-data"> 
                                    <input type="hidden" name="idtovar" value="<?=$element[0]?>">
                                    <input type="hidden" name="login" value="<?= $login ?>">
                                    <input type="hidden" name="modification" value="<?=$element1[0]?>">
                                    <input type="hidden" name="colvo" value="1">
                                    <input type="hidden" name="otkuda" value="cart">
                                    <button class="buttonforbasketmod" type="submit" >В корзину</button>
                                </form>
                                <?php }else{ ?>
                                <form action="authoriz.php" method="post" enctype="multipart/form-data"> 
                                    <button class="buttonforbasketmod" type="submit" >Войти</button>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
            </div>        
            <div id="Отзывы" class="tabcontent">
                <?php   if(!isset($_SESSION['login'])) { ?>
                <div class="contentcomment">
                    <h3>Авторизуйтесь, чтобы оставить комментарий</h3>
                    <div class="registration-cssave">
                        <form action="avtorizcomment.php">
                            <div class="form-group">
                                <button class="create-account" type="submit">Войти в аккаунт</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="contentcomment">
                    <h3 class="zagcom">Оставьте свой отзыв на данный товар</h3>
                    <form action="commentproduct.php" method="post">
                        <input class="polevvod" type="text" size="70" value="Имя" name="name">
                        <input type="hidden" name="data" value="<?=date('Y-m-d') ?>">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <br>
                        <br>
                        <textarea class="polevvod" cols="66" rows="5" name="comment" >Очень понравилось...</textarea>
                        <br>
                        <br>
                        <div class="buttoncomment3">
                        <input class="buttonforbasket1"  type="submit" value="Отправить">
                        </div>
                    </form>
                </div>
                <?php } ?>
                <?php 
                    require_once 'connect.php';
                    $table = mysqli_query($connect, "SELECT * FROM `commentproduct` ORDER BY `id` DESC ");
                    $table = mysqli_fetch_all($table);
                        foreach($table as $element){ 
                         if($element[1]==$id) {   ?>
                    <div class="comment">
                        <span class="namecomment">
                        <?=$element[2]?>
                        </span>
                        <span>
                        <?=$element[3]?>
                        </span>
                        <p><?=$element[4]?></p>
                    </div>
                <?php } } ?> 
            </div>
            <script src="tabs.js"> </script>
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