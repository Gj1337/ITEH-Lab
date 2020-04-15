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

<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
    
    <?php
      if(is_bool($ganres) )
      {
        echo("Проблемы с подключением к бд или еще что-то");
      }
      else
      {
            echo("<form action=\"Task1.php\" method=\"POST\"><select name=\"genre\">");
            foreach($ganres as $line)
            {
                echo("<option value=\"$line[title]\"> $line[title] </option>");
            }
            echo("</select>
                <input type=\"submit\" value=\"Получить список фильмов выбранного жанра\"></form>");
            if(isset ($_POST['genre']))
            {
                $genre=$_POST['genre'];

                echo("<br><div align=\"center\">");
                
                $sql=' SELECT * FROM film 
                inner join film_genre on(film.ID_FILM=film_genre.FID_Film)
                INNER JOIN genre on (genre.ID_Genre=film_genre.FID_Genre)
                 WHERE genre.title=:genre  ';
                 
                $sth = $dbh->prepare ($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    
                $sth->execute(array(':genre'=>$genre));
                $film=$sth->fetchAll();
               
                if(is_bool($film))
                {
                    echo("Error");
                }
                else
                {
                    echo("<table border=\"1\"><td align=\"center\" colspan=9><big><b>$genre<big></td>");
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