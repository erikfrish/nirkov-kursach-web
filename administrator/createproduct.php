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

?>
        <div class="contentpage">
        <form action="createproductscript.php" method="post" enctype="multipart/form-data"> 
                <p>Изображение:</p>
                <input type="file" name="img">
                <p>Название</p>
                <input type="text" name="title" maxlength="15">
                <p>Описание:</p>
                <textarea rows="10" cols="45" name="opisanie"></textarea>
                <p>Цена:</p>
                <input type="number" name="price" max="10000000000">
                <p>Категория:</p>
                <?php
     require_once '../connect.php';
     $table = mysqli_query($connect, "SELECT * FROM `category` ");
     $table = mysqli_fetch_all($table); 
     foreach($table as $element){ 
      

?>
                <span><input name="category" type="radio" value="<?=$element[1]?>"><?=$element[1]?></span>

<?php } ?>
                <p>Характериситики:</p>
                <textarea rows="10" cols="45" name="xar"></textarea>
                <br><br>
                <button type="submit" class="buttonforbasket1">Добавить</button>
            </form>
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
