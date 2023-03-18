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
            if(($_SESSION['login'])=='admin') {
            
                ?>
                  
        <div class="contentpage">
            <h3 class="authzag">Выход:</h3>
            <div class="registration-cssave">
                    <div class="form-group" style="margin-left: 15px;">
                        <a href="../logout.php" class="create-account" style="text-decoration:none;" >Выйти</a>
                    </div>
                
            </div>
        </div>

        <?php 
        }else{ 
            header('Location: ../main.php' ); 
        }
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