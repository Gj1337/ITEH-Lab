<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        span{font-size: 150%; font-family: monospace;}  
    </style>
</head>
<body style="background-image: url(background.jpg);  background-size: cover;">


    <table style="margin: auto; background-image: url(table_background.jpg);  background-size: cover; width:30% " border="1"   >
    <tr >
        <th>
            <span>Выберите нужный<br> варитан</span>
        </th>
    </tr>
    <tr>
        <td>
            <form action="Function.php" method="POST" >
                <input  type="radio"  name="a"  value="first" checked="true"><span>Первый</span><br>
                <input  type="radio"  name="a"  value="second" ><span>Второй</span><br>
                <input  type="radio"  name="a"  value="last" ><span>Третий</span><br>
                <tr>
                    <td align="center"  >
                    <input id="button" style="background-image: url(table_background.jpg);  background-size: cover; width:100%;" type="submit" name="button2" value="Выбор">
                    </td>
                </tr>

                


            </form>
        </td>
    </tr>
    </table>

    <!--<script>
 
        function CheckRadio()
        {
                alert("g");
                var Raido =  document.getElementsByName("a");

            for(var i=0; i<Raido.length-1;i++)
            {
                 if(Raido[i].checked)
                {
                    break;
                }
            }
        }
        var Button = document.getElementById("button");
        Button.addEventListener("click", CheckRadio);
    </script>-->

</body>
</html>

