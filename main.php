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
            <h2>не много О НАС...</h2>
            <h3>Компания «Прокат Лайт» приветствует на своем сайте приверженцев активного отдыха</h3>
            <p>Рады приветствовать Вас на страницах нашего сайта. И раз Вы тут - это может означать лишь одно - Вы любите активно проводить время. И Вы попали по адресу! В наших каталогах есть все для того, чтобы сделать вылазку на природу, туристический поход или тренировку комфортными и безопасными.</p>
            <p>У нас Вы найдете огромный ассортимент: от спортивной экипировки до сноубордов и палаток. Если Вы любите отдыхать всей семьей - наш магазин лучший для Вас вариант. У нас есть все! Мы работаем уже более 7 лет, и не понаслышке знаем, как ухаживать за инвентарем.</p>
            <p>Решили отдохнуть на природе? Тогда компания «Прокат Лайт» предлагает прокат туристического снаряжения в отличном состоянии и по приемлемой цене.   </p>
            <h3>В прокате – любое туристическое снаряжение на любой сезон</h3>
            <p>Но это еще не все…Среди плюсов обращения к нам, Вы отметите: предоставление комплексных услуг по организации корпоративных выездов на отдых, доставку и возврат по Санкт-Петербургу и Ленинградской области, нужные советы по выбору всего необходимого, для отдыха и рыбалки .</p>
            <h3>Обращайтесь в наш интернет-магазин, и это будет 100% самый удобный прокат туристического снаряжения в СПб.</h3>
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
