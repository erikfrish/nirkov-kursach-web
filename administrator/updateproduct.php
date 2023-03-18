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
        $id = $_POST['id'];
        $table = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '$id' ");
        $table = mysqli_fetch_all($table); 
        foreach($table as $element){ ?>
        <div class="contentpage">
        <form action="updateproductscript.php" method="post" enctype="multipart/form-data"> 
                <input type="hidden" name="id" value="<?=$element[0]?>">
                <p>Изображение:</p>
                <input type="file" name="img">
                <p>Название</p>
                <input type="text" name="title" maxlength="15" value="<?=$element[2]?>">
                <p>Описание:</p>
                <textarea rows="10" cols="45" name="opisanie"><?=$element[3]?></textarea>
                <p>Цена:</p>
                <input type="number" name="price" max="1000000" value="<?=$element[4]?>">
                <p>Категория:</p>
                    <?php require_once '../connect.php';
                        $table1 = mysqli_query($connect, "SELECT * FROM `category`");
                        $table1 = mysqli_fetch_all($table1);
                        foreach($table1 as $element1){ ?>
                        <p><input name="category" type="radio" value="<?=$element1[1]?>" <?php if($element[5]==$element1[1]){ ?> checked <?php } ?> ><?=$element1[1]?></p>
                    <?php } ?> 
                <p>Характериситики:</p>
                <textarea rows="10" cols="45" name="xar"><?=$element[6]?></textarea>
                <br><br>
                <button type="submit" class="buttonforbasket1">Изменить</button>
            </form>
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
