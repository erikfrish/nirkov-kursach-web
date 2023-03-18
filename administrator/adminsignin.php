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
        <div class="contentpage">
            <h3 class="zagcom">Добавить нового пользователя:</h3>
            <form action="createusers.php" method="post" > 
                <input class="polevvod" type="text" size="70" value="Имя Фамилия" name="name">
                <br>
                <br>
                <input class="polevvod" type="text" size="70" value="Логин" name="login">
                <br>
                <br>
                <input class="polevvod" type="text" size="70" value="Пароль" name="password">
                <br>
                <br>
                <div class="buttoncomment3">
                <input class="buttonforbasket1"  type="submit" value="Добавить">
                </div>
                <br>
                <br>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Имя Фамилия</th>
                        <th>Логин</th>
                        <th>Пароль</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    session_start();
                    if(($_SESSION['login'])!='admin') {
                      header('Location: ../main.php' ); 
                    }
                    require_once '../connect.php';
            $table = mysqli_query($connect, "SELECT * FROM `users` ");
            $table = mysqli_fetch_all($table); 
            foreach($table as $element){ ?>
                    <tr>
                        <td><?=$element[1]?></td>
                        <td><?=$element[2]?></td>
                        <td><?=$element[3]?></td>
                        <td>
                        <form action="deleteuser.php" method="post" > 
                            <input type="hidden" name="id" value="<?=$element[0]?>">
                            <input  type="submit" value="Удалить">
                        </form>
                        </td>
                    </tr> 
            <?php } ?>
                </tbody>
            </table>
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
