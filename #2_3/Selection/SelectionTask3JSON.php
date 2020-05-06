<?php
    header('Content-Type:application/json');    
    include "../connect.php";
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
                $date=array();
            foreach($film as $line)
            {
                $date[]= array( 
                    'name'=>$line['name'],
                    'resolution'=>$line['resolution'],
                    'theDate'=>$line['theDate'],
                    'country'=>$line['country'],
                    'quality'=>$line['quality'],
                    'producer'=>$line['producer'],
                    'director'=>$line['director'],
                    'codec'=>$line['codec'],
                    'carrier'=>$line['carrier']      );
            }
            echo json_encode( $date);
            }

        }
        else
        {
            echo("Укажите хотябы одну из ограничивающих дат пжлст");
        }
    }
?>

