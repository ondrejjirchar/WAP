
<html>  
    <head>
        <title>Datetime</title>
    </head>
    <body>
        <h1>Datum a Čas</h1>

<?php

date_default_timezone_set("Europe/Prague");


$date=date("d-m-Y");
echo $date."<br>";

$time=date ("H:i:s");
echo $time;
for ($i = 0; $i < $time; $i++); {
}

?>

    </body>
</html>