<?php
    $connect = mysqli_connect('localhost', 'root', 'root', 'prokat' ); 
    if (!$connect){
        echo "Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error();
    }
    else {
        // print("Соединение установлено успешно");
    }
?>