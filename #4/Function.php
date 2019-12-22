<body style="background-image: url(background.jpg);  background-size: cover;">
<?php
    $a="111";
    if(isset($_POST['a']))
    {
      if($_POST['a']=="first")
      {
        $a=" Выбран элемент 1";
      }
      else if($_POST['a']=="second")
      {
        $a=" Выбран элемент 2";
      }
      else if($_POST['a']=="last")
      {
        $a=" Выбран элемент 3";
      }
    
    }
    
    echo "<div><p style=\" color:Plum;font-size: 400%; font-family: fantasy; text-align: center;\"> $a</p></div>";
    $fp = fopen('Data.txt', 'a+t'); 
    fwrite($fp, date('Y-m-d H:i:s').$a."\n\r");
    fclose($fp);

?>
</body>