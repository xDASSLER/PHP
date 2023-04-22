<?php
    $link = mysqli_connect('localhost','root', '','слова для бота вк');
    if($link){

        $link->set_charset('utf8');
    }
    else{
        echo('Ошибка подключения к БД');
        exit;
    }
?>