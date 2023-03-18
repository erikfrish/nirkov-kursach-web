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
            <div class="contentcartproduct">
                <?php 
                  session_start();
                  if(($_SESSION['login'])!='admin') {
                    header('Location: ../main.php' ); 
                  }
                require_once '../connect.php';
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
                            <form action="updateproduct.php" method="post" enctype="multipart/form-data"> 
                                <input type="hidden" name="id" value="<?=$element[0]?>">
                                <input class="buttonforbasket1" id="buttonforbasket3" type="submit" value="Изменить">
                            </form>
                        </div>
                        <div class="buttonforbasket">
                            <form action="deleteproduct.php" method="post" enctype="multipart/form-data"> 
                                <input type="hidden" name="id" value="<?=$element[0]?>">
                                <input class="buttonforbasket1" id="buttonforbasket3" type="submit" value="Удалить">
                            </form>
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
                <div class="cartmod">
                    <div class="cartmod1">
                    <img src="/administrator/imgproduct/<?=$element[1]?>" width="200px" height="170px">
                            <h5><?=$element[2]?></h5>
                    </div>
                    <div>
                        <div class="cartmod2">
                            <form action="createmodification.php" method="post" > 
                            <p>Срок проката: <input type="text" name="srok" value="" size="7" maxlength="11"></p>
                            <p>Цена: <input type="text" name="price" value="" size="4" maxlength="5"> р.</p>
                        </div>
                        <div class="buttonforbasket">
                                <input type="hidden" name="idproduct" value="<?=$element[0]?>">
                                <input class="buttonforbasketmod" type="submit" value="ДОБАВИТЬ">
                            </form>
                        </div>                            
                    </div>
                </div>
                <?php  require_once '../connect.php';
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
                                <form action="deletemodification.php" method="post" enctype="multipart/form-data"> 
                                    <input type="hidden" name="idmod" value="<?=$element1[0]?>">
                                    <input type="hidden" name="idproduct" value="<?=$element[0]?>">
                                    <input class="buttonforbasketmod" type="submit" value="Удалить">
                                </form>
                            </div>                            
                        </div>
                    </div>
                <?php } ?> 
            </div>        
            <div id="Отзывы" class="tabcontent">
                <?php 
                    require_once '../connect.php';
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
                        <div class="buttonforbasket">
                            <form action="deletecommentproduct.php" method="post" enctype="multipart/form-data"> 
                                <input type="hidden" name="id" value="<?=$id?>">
                                <input type="hidden" name="idcomment" value="<?=$element[0]?>">
                                <input class="buttonforbasketmod" type="submit" value="Удалить">
                            </form>
                        </div>      
                    </div>
                <?php } } ?> 
            </div>
            <script src="../tabs.js"> </script>
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