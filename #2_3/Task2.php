<?php
    include "connect.php";
    $actor=$dbh->query("SELECT * FROM actor;");
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>ИТех лаб_2_1_Задание_2</title>
</head>

<script src="Scripts.js"></script>

<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
    
    <?php
      if(is_bool($actor) )
      {
        echo("Проблемы с подключением к бд или еще что-то");
      }
      else
      {
            echo("<select name=\"actor\" id=\"actor\">");
            foreach($actor as $line)
            {
                echo("<option value=\"$line[name]\"> $line[name] </option>");
            }
            echo("</select>
                <button onclick=\"SelectionTask2XML()\" value=\"\">
                Получить список фильмов c выбраным актером</button>
                <div align=\"center\" id=\"body\"></div>");
        }
    ?>

</body>