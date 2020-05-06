<?php
require_once __DIR__ . "/vendor/autoload.php";
$collection = (new MongoDB\Client)->ITEH->Films;
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>ИТех лаб_2_1_Задание_1</title>
    <!-- Лабороторная работа Второй семестр-№1 КИУКИу-18-1 Глывич В.А-->
</head>


<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
    

    <form action="Task3.php" method="POST">
        <span>Год выпуска фильма</span><input name="year" type="number" min="0">
        <input type="submit">
    </form>

   
    <br><div  align="center" id="body">

            <?php
                    if(isset($_POST['year']))
                    {
                        $year=$_POST['year'];
                        echo("<table border=\"1\">
                            <tr>
                                <td align=\"center\" colspan=7 ><big>Фильмы с годом выпуска $year</td>
                            </tr>
                            <tr>
                                <td><strong>Название</td>
                                <td><strong>Год выпуска</td>
                                <td><strong>Тип носителя</td>
                                <td><strong>Режисер</td>
                                <td><strong>Актеры</td>
                                <td><strong>Жанр</td>
                                <td><strong>Страна</td>
                            </tr>
                            
                            ");
                            $cursor = $collection->find(['date'=>(int)$year]);
                            foreach ($cursor as $document) 
                            {
                                echo("<tr>
                                <td>$document[name]</td>
                                <td>$document[date]</td>
                                <td>$document[media_type]</td>
                                <td>$document[producer]</td>");

                                echo("<td>");
                                foreach($document['actors'] as $actor)
                                {echo( $actor.' ');
                                }echo("</td>");

                                echo("<td>");
                                foreach($document['genre'] as $g)
                                {echo( $g.' ');
                                }echo("</td>");

                                echo("<td>$document[country]</td>");
                            }
                            echo("</table>");
                            
                    }
            ?>
    </div>
    

</body> 

