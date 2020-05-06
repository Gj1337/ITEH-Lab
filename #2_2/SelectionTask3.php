<?php
    require_once __DIR__ . "../vendor/autoload.php";
    $collection = (new MongoDB\Client)->ITEH->Films;
    
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