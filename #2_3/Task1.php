<?php
    include "connect.php";
    $ganres=$dbh->query("SELECT * FROM genre;");
?>
    <!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>ИТех лаб_2_1_Задание_1</title>
    <!-- Лабороторная работа Второй семестр-№1 КИУКИу-18-1 Глывич В.А-->
</head>

<script src="Scripts.js"></script>


<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
    
    <?php
      if(is_bool($ganres) )
      {
        echo("Проблемы с подключением к бд или еще что-то");
      }
      else
      {
            echo("<select name=\"genre\" id=\"genre\">");
            foreach($ganres as $line)
            {
                echo("<option value=\"$line[title]\"> $line[title] </option>");
            }
            echo("</select>
                <button onclick=\"SelectionTask1HTML()\" >
                Получить список фильмов выбранного жанра</button>
                <div align=\"center\" id=\"body\"></div>");
           
        }
    ?>

</body>