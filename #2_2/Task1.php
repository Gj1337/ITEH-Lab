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


<body align="center" style="background: url(https://webfon.top/wp-content/uploads/2017/10/tools.png) left top repeat;margin: 2%;">
    

    <form action="Task1.php" method="POST">
    <span>Тип носителя</span> <select name="media">
            <?php
                    foreach($media_type as $line)
                    {echo("<option value=\"$line\"> $line </option>");}
            ?>
        </select>
        <input type="submit">
    </form>

   
    <br><div  align="center" id="body">

            <?php
                    if(isset($_POST['media']))
                    {
                        $media=$_POST['media'];
                        echo("<table border=\"1\">
                            <tr>
                                <td align=\"center\" colspan=7 ><big>Фильмы c носителем $media</td>
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
                            $cursor = $collection->find(['media_type'=>$media]);
                            foreach ($cursor as $document) 
                            {
                                echo("<tr>
                                <td>$document[name]</td>
                                <td>$document[date]</td>
                                <td>$document[media_type]</td>
                                <td>$document[producer]</td>");

                                echo("<td>");
                                foreach($document['actors'] as $media)
                                {echo( $media.' ');
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

