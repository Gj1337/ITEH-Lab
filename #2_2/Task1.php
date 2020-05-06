<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->ITEH->Films;
$cursor = $collection->find();
 foreach ($cursor as $document) 
 {$media_type[]=$document['media_type']; }
 $media_type=array_unique($media_type);

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>ИТех лаб_2_1_Задание_1</title>
    <!-- Лабороторная работа Второй семестр-№1 КИУКИу-18-1 Глывич В.А-->
</head>

<script src="Scripts.js"></script>

<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
    
    <span>Тип носителя</span> <select name="media" id="getInfo" >
            <?php
                    foreach($media_type as $line)
                    {echo("<option value=\"$line\"> $line </option>");}
            ?>
        </select>
        <input type="submit" onclick="Task1()">

    <br><div  align="center" id="body"></div><br>
    <button onclick="GetRezult()">Получить сохраненные данные</button>

</body> 

