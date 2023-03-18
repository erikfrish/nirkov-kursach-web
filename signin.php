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
            require_once 'connect.php';
            if(isset($_POST['login']) and isset($_POST['password'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];

                if($login=='admin' and $password=='admin'){
                    $_SESSION['login'] = $login;
                     header('Location: /administrator/admincatalog.php'); 
                }else{
                    $result = mysqli_query($connect, "SELECT * FROM `users` WHERE login='$login' and password='$password'") or die (mysqli_error($connect));
                    $count = mysqli_num_rows($result);
                    if($count==1){
                        $_SESSION['login'] = $login;
                    }else{
                        $fmsg = "Ошибка";
                    }
                }
            }

           

            if(isset($_SESSION['login'])) {
                $login = $_SESSION['login'];  
            
                $kart = mysqli_query($connect, "SELECT * FROM `users` WHERE login='$login' ");
                $kart = mysqli_fetch_all($kart);
                foreach($kart as $countt){
                    $namefam= $countt[1];
                }
                ?>
            <div class="namecompany">
                <a href="">ПОЛЬЗОВАТЕЛЬ: <?=$namefam?></a>
            </div>
        </div>        
        <div class="contentpage">
            <h3 class="authzag">Выход:</h3>
            <div class="registration-cssave">
                    <div class="form-group" style="margin-left: 15px;">
                        <a href="logout.php" class="create-account" style="text-decoration:none;" >Выйти</a>
                    </div>
                
            </div>
        </div>

        <?php 
        }else{ ?>
        </div>
        <div class="contentpage">
            <h3 class="authzag">Вход на сайт</h3>
            <div class="registration-cssave">
                <form name="loginForm" method="post" action="signin.php">
                    <div class="form-group">
                        <input class="form-control item" type="text" name="login"  id="username" placeholder="Логин" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control item" type="password" name="password"  id="password" placeholder="Пароль" required>
                    </div>
                    <div class="form-group">
                        <button class="create-account" type="submit">Войти в аккаунт</button>
                    </div>
                </form>
            </div>
        </div>

        <?php  }
        ?>
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