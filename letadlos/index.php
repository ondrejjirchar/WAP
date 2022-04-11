<?php
$con = @mysqli_connect("127.0.0.1", "root", "root", "flights", "3306");
if ($con === false){
    die("D8 error");
}
mb_internal_encoding('UTF-8');
mysqli_query($con, "SET CHARACTER SET UTF8");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL</title>
</head>
<body>
    <?php
$q= "SELECT * FROM airport";
$result = mysqli_query($con, $q);
echo '<table>' . PHP_EOL;
while (($airport = mysqli_fetch_array($result, MYSQLI_ASSOC))!== null) {
    echo '<th></th><td><b>' . $airport ['code'] . '</td></b>' . '<td>'. $airport ['name'] . '</td>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;
?>
</body>
</html>
