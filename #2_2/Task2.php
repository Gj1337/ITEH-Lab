<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->ITEH->Films;
$cursor = $collection->find();
 foreach ($cursor as $document) 
 {
     foreach($document['actors'] as $selectgenre)
     {$genres[]=$selectgenre; }
 }
 $genres=array_unique($genres);
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>ИТех лаб_2_1_Задание_1</title>
</head>

<script src="Scripts.js"></script>

<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
    
    <span>Фильмы с актером</span><select name="actor" id="getInfo">
            <?php
                    foreach($genres as $line)
                    {echo("<option value=\"$line\"> $line </option>");}
            ?>
        </select>
        <input type="submit" onclick="Task2()">

    <br><div  align="center" id="body"></div><br>
    <button onclick="GetRezult()">Получить сохраненные данные</button>

</body> 

