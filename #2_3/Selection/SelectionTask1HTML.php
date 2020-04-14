<?php
    include "../connect.php";
    if(isset ($_POST['genre']))
            {
                $genre=$_POST['genre'];
                $film = $dbh->query(" SELECT * FROM film 
                INNER JOIN film_genre on(film.ID_FILM=film_genre.FID_Film)
                INNER JOIN genre on (genre.ID_Genre=film_genre.FID_Genre)
                WHERE genre.title=\"$genre\" ");
                if(is_bool($film))
                {
                    echo("Error");
                }
                else
                {
                    echo("<br><table border=\"1\"><td align=\"center\" colspan=9><big><b>$genre<big></td>");
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
?>
  