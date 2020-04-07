<?php
    include "connect.php";
    $actor=$dbh->query("SELECT * FROM actor;");
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>ИТех лаб_2_1_Задание_2</title>
</head>

<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
    
    <?php
      if(is_bool($actor) )
      {
        echo("Проблемы с подключением к бд или еще что-то");
      }
      else
      {
            echo("<form action=\"Task2.php\" method=\"POST\"><select name=\"actor\">");
            foreach($actor as $line)
            {
                echo("<option value=\"$line[name]\"> $line[name] </option>");
            }
            echo("</select><input type=\"submit\" value=\"Получить список фильмов c выбранным актером\"></form>");
            if(isset ($_POST['actor']))
            {
                $actor=$_POST['actor'];
                echo("<br><div align=\"center\">");
                
                $film=$dbh->query(" SELECT * FROM film 
                                    inner join film_actor on(film.ID_FILM=film_actor.FID_Film)
                                    INNER JOIN actor on (actor.ID_Actor=film_actor.FID_Actor)  
                                    WHERE actor.name=\"$actor\" ");
                if(is_bool($film))
                {
                    echo("Error");
                }
                else
                {
                    echo("<table border=\"1\"><td align=\"center\" colspan=9><big><b> Фильмы с $actor<big></td>");
                    echo("<tr>
                    <td><b>Название</td>
                    <td><b>Качество</td>
                    <td><b>Дата выхода</td>
                    <td><b>Страна</td>
                    <td><b>Оценка</td>
                    <td><b>Пролюсер</td>
                    <td><b>Режисер</td>
                    <td><b>Кодек</td>
                    <td><b>Носитель</td>
                    </tr>");
                foreach($film as $line)
                {
                    echo("<tr>
                    <td> $line[name] </td>
                    <td>$line[resolution]</td>
                    <td>$line[theDate] выхода</td>
                    <td>$line[country]</td>
                    <td>$line[quality]</td>
                    <td>$line[producer]</td>
                    <td>$line[director]</td>
                    <td>$line[codec]</td>
                    <td>$line[carrier]</td>
                    </tr>");
                }
                }
                echo("</table</div>");
            }
        }
    ?>

</body>