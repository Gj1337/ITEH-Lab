<?php
   header('Content-Type: text/xml');
   echo '<?xml version="1.0" encoding="utf8" ?>';
   include "../connect.php";
   if(isset ($_POST['actor']))
    {
        $actor=$_POST['actor'];
          
        $film=$dbh->query(" SELECT *,film.name FROM film 
                            inner join film_actor on(film.ID_FILM=film_actor.FID_Film)
                            INNER JOIN actor on (actor.ID_Actor=film_actor.FID_Actor)  
                            WHERE actor.name=\"$actor\" ");
        if(is_bool($film))
        {
            echo("Error");
        }
        else
        {      
            $film=$film->fetchAll();
            echo"<root>";
           foreach($film as $line)
            {
                print("<row>
                <name>$line[name]</name>
                <resolution>$line[resolution]</resolution>
                <theDate>$line[theDate]</theDate>
                <country>$line[country]</country>
                <quality>$line[quality]</quality>
                <producer>$line[producer]</producer>
                <director>$line[director]</director>
                <codec>$line[codec]</codec>
                <carrier>$line[carrier]</carrier>
                </row>");
            }
            echo "</root>";

        }
    }
    
?>
