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
            <h3 class="zagcom">ОТЗЫВЫ</h3>
            <h3 class="zagcom">Оставьте свой отзыв</h3>
            <form action="comment.php" method="post">
                <input class="polevvod" type="text" size="70" value="Имя" name="name">
                <input type="hidden" name="data" value="<?=date('Y-m-d') ?>">
                <input type="hidden" name="moderation" value="no">
                <br>
                <br>
                <textarea class="polevvod" cols="66" rows="5" name="commment" >Очень понравилось...</textarea>
                <br>
                <br>
                <div class="buttoncomment3">
                <input class="buttonforbasket1"  type="submit" value="Отправить">
                </div>
            </form>
            <?php
                error_reporting(E_ALL);
                require_once 'connect.php'; 
                if(!empty($_POST['name'])) { $name = $_POST['name']; }
                if(!empty($_POST['data'])) {  $data = $_POST['data']; }
                if(!empty($_POST['commment'])) { $commment = $_POST['commment']; }
                if(!empty($_POST['moderation'])) { $moderation = $_POST['moderation']; }
                if((!empty($_POST['name']))and(!empty($_POST['data']))and(!empty($_POST['commment']))and(!empty($_POST['moderation']))) {
                mysqli_query($connect, "INSERT INTO `comments` (`id`, `name`, `data`, `comment`, `moderation`) VALUES (NULL, '$name', '$data', '$commment', '$moderation')");
                }
            ?>
        </div>

        <?php 
        require_once 'connect.php';
        $table = mysqli_query($connect, "SELECT * FROM `comments` ORDER BY `id` DESC ");
        $table = mysqli_fetch_all($table);
            foreach($table as $element){ 
                if($element[4]=='yes') { ?>
                <div class="contentpage">
                    <span class="namecomment">
                        <?=$element[1]?>
                    </span>
                    <span class="datacomment">
                        <?=$element[2]?> 
                    </span>
                    <p><?=$element[3]?></p>
                </div>
            <?php }
     } ?>
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
