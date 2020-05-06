<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->ITEH->Films;
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>ИТех лаб_2_1_Задание_1</title>
</head>

<script src="Scripts.js"></script>

<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
  
        <span>Год выпуска фильма</span><input name="year" type="number" min="0" id="getInfo">
        <input type="submit" onclick="Task3()">

    <br><div  align="center" id="body"></div><br>
    <button onclick="GetRezult()">Получить сохраненные данные</button>

</body> 

