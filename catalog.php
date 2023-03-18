<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
#cartv222{
    height: 500px;
}
#problem{
    min-height: 545px;
}
a{
    text-decoration: none;
}
#problem{
    min-height: 650px;
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
        <?php
            if(empty($_POST['minprice'])){ $minprice = 50; } else { $minprice = $_POST['minprice']; }
            if(empty($_POST['maxprice'])){ $maxprice = 9500; } else { $maxprice = $_POST['maxprice']; }
            if(empty($_POST['category'])){ $category = 'Палатки'; } else { $category = $_POST['category']; }
            if((empty($_POST['position']))and(empty($_GET['position']))){ $position = 1; } elseif(!empty($_GET['position'])){
                $position = $_GET['position']; 
            }else { $position = $_POST['position']; }
        ?>
        <div class="contentpagecatalog" id="problem">
            <div class="filtres">
                <form action="catalog.php"  method="post" >
                <div class="position">
                    <p class="txtprice" >Катагория:</p>
                    <?php require_once 'connect.php';
                $table = mysqli_query($connect, "SELECT * FROM `category`");
                $table = mysqli_fetch_all($table);
                foreach($table as $element){ ?>
                
                <p><input type="radio" name="category" value="<?=$element[1]?>" <?php if($category == $element[1]) { ?> checked <?php } ?> ><?=$element[1]?></p>
                <?php } ?>  
                    
                </div>
                <div class="price">
                    <p class="txtprice" >Фильтр:</p>
                    <p class="txtprice" >ЦЕНА</p>
                    <p>От:  <input class="pricefiltrs" name="minprice" type="text" value="<?= $minprice ?>" size="4" maxlength="5" ></p>
                    <p>До:  <input class="pricefiltrs" name="maxprice" type="text" value="<?= $maxprice ?>" size="4" maxlength="5" ></p>
                </div>
                <div class="position">
                    <p class="txtprice" >Представление:</p>
                    <p><input type="radio" name="position" value="1" <?php if($position == 1) { ?> checked <?php } ?> >1 в ряд</p>
                    <p><input type="radio" name="position" value="2" <?php if($position == 2) { ?> checked <?php } ?> >2 в ряд</p>
                    <p><input type="radio" name="position" value="3" <?php if($position == 3) { ?> checked <?php } ?> >3 в ряд</p>
                </div>
                <div class="btnfilters">
                    <p><input  type="submit" value="Обновить"></p>
                </div>
                </form>
            </div>

            <?php 
            require_once 'connect.php';
            $table = mysqli_query($connect, "SELECT * FROM `product` WHERE `price` BETWEEN $minprice AND $maxprice AND `category` = '$category' ");
            $table = mysqli_fetch_all($table); 
            if($position==1){
            foreach($table as $element){ ?>
            <div class="contentcatalogv">
                <div class="cartv1">
                    <a href="cartproduct.php?id=<?=$element[0]?>"><img src="/administrator/imgproduct/<?=$element[1]?>" width="595px" height="500px"></a>
                    <h3><?=$element[2]?></h3>
                    <p><?=$element[3]?></p>
                </div>
                <div>
                    <div class="pricev1">
                        <h3><?=$element[4]?>p./сут.</h3>
                    </div>
                    <div class="buttonforbasket">
                        <!-- <form action="createshop.php" method="post" enctype="multipart/form-data">  -->
                            <!-- <input type="hidden" name="idtovar" value="$element[0]">
                            <input type="hidden" name="login" value="$login ">
                            <input type="hidden" name="modification" value="1day">
                            <input type="hidden" name="colvo" value="1">
                            <input type="hidden" name="otkuda" value="catalog">
                            <input type="hidden" name="position" value="1"> -->
                            <!-- <button class="buttonforbasket1" type="submit" >В корзину</button> -->
                            <a href="cartproduct.php?id=<?=$element[0]?>" class="buttonforbasket1">Открыть</a>
                        </form>
                    </div>
                </div>
            </div>
            <?php } 
            }
            ?>
            
            <?php
            if($position==2) { ?>
                <div class="contentcatalogv2">
                <?php foreach($table as $element){ ?>
                    <div class="cartversion2">
                        <div class="cartv2" id="cartv222">
                            <a href="cartproduct.php?id=<?=$element[0]?>"><img src="/administrator/imgproduct/<?=$element[1]?>" width="267px" height="240px"></a>
                            <h3><?=$element[2]?></h3>
                            <p><?=$element[3]?></p>
                        </div>
                        <div>
                            <div class="pricev1">
                                <h3><?=$element[4]?>p./сут.</h3>
                            </div>
                            <div class="buttonforbasket">
                            <a href="cartproduct.php?id=<?=$element[0]?>" class="buttonforbasket1" id="buttonforbasket2">Открыть</a>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
                </div>
            <?php } ?>

            <?php
            if($position==3){ ?>
            <div class="contentcatalogv3">
            <?php foreach($table as $element){ ?>
                <div class="cartversion3">
                    <div class="cartv2">
                        <a href="cartproduct.php?id=<?=$element[0]?>"><img src="/administrator/imgproduct/<?=$element[1]?>" width="167px" height="140px"></a>
                        <h3><?=$element[2]?></h3>
                    </div>
                    <div>
                        <div class="pricev3">
                            <h3><?=$element[4]?>p./сут.</h3>
                        </div>
                        <div class="buttonforbasket">
                            <a href="cartproduct.php?id=<?=$element[0]?>" class="buttonforbasket1" id="buttonforbasket3">Открыть</a>
                        </div>
                    </div>
                </div>
            <?php } ?>   
            <div style="height:300px; width:100%"></div>
            </div>
            <?php } ?>

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