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
        <?php require_once '../connect.php';
        session_start();
        if(($_SESSION['login'])!='admin') {
          header('Location: ../main.php' ); 
        }
        ?>
        <div class="contentpagecatalog">
            <div class="filtres">
                Добавить снаряжение:
                <div class="btnfilters">
                    <p><input  type="submit" value="Добавить" onclick="window.location.href = 'createproduct.php';" ></p>
                </div>
                <hr>
                Категории:
                <?php 
                $table = mysqli_query($connect, "SELECT * FROM `category`");
                $table = mysqli_fetch_all($table);
                foreach($table as $element){ ?>
                <p><?=$element[1]?></p>
                <form action="deletecategory.php" method="post" >
                    <input type="hidden" name="idcat" value="<?=$element[0]?>">
                    <p><input type="submit" value="Удалить"></p>
                </form>
                <?php } ?>  
                <hr>
                <form action="createcategory.php" method="post" >  
                    <p>Добавить категорию: </p>
                    <p><input type="text" name="categoria" value="" size="7" maxlength="11"></p>
                    <p><input  type="submit" value="Добавить" ></p>
                </form>
            </div> 
            <div class="contentcatalogv3">
            <?php 
            $table = mysqli_query($connect, "SELECT * FROM `product`");
            $table = mysqli_fetch_all($table);
            foreach($table as $element){ ?>
                <div class="cartversion3">
                    <div class="cartv2">
                        <a href="admincartproduct.php?id=<?=$element[0]?>"><img src="/administrator/imgproduct/<?=$element[1]?>" width="167px" height="140px"></a>
                        <h3><?=$element[2]?></h3>
                    </div>
                    <div>
                        <div class="pricev3">
                            <h3><?=$element[4]?>p./сут.</h3>
                        </div>
                        <div class="buttonforbasket">
                            <form action="deleteproduct.php" method="post" enctype="multipart/form-data"> 
                                <input type="hidden" name="id" value="<?=$element[0]?>">
                                <input class="buttonforbasket1" id="buttonforbasket3" type="submit" value="Удалить">
                            </form>
                        </div>
                    </div>
                </div>
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