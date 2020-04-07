<?php
    include "connect.php";
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>ИТех лаб_2_1_Задание_3</title>
</head>

<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
    
    <?php
      echo("<form action=\"Task3.php\" method=\"POST\"> 
                <p><big>Ввыбирите временные границ </big></p>
                <p>Начало <input name=\"startDate\" type=\"date\"></input></p>
                <p>Конец  <input name=\"endDate\" type=\"date\"></input></p>
                <input type=\"submit\" value=\"Получить список фильмов\"></input>

            </form>
            ");

        
            if( (isset($_POST['startDate']))or(isset($_POST['endDate'])))
            {
                if( ((strlen($_POST['startDate']))>0)or((strlen($_POST['endDate']))>0))
                {
                    if((strlen($_POST['startDate']))==0)
                    {$startDate="1888-01-01";}
                    else
                    {$startDate=$_POST['startDate'];}

                    if((strlen($_POST['endDate']))==0)
                    {$endDate=date("Y-m-d");}
                    else
                    {$endDate=$_POST['endDate'];}

                    $film=$dbh->query("SELECT * from film 
                                        WHERE film.theDate>=\"$startDate\" 
                                        and film.theDate<=\"$endDate\" ");

                    if(is_bool($film))
                    {echo("Error");}
                    else
                    {
                        echo("<br><div align=\"center\"><table border=\"1\"><td align=\"center\" colspan=9><big><b> Фильмы за период \"$startDate\"-\"$endDate\"<big></td>");
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
                else
                {
                    echo("Укажите хотябы одну из ограничивающих дат пжлст");
                }
            }
            
    ?>

</body>