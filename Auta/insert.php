<?php
$dbhost = "localhost";
$dbname = "cars";
$dbuser = "root";
$dbpass = "root";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Připojení k databázi selhalo: " . mysqli_connect_error());
}

if (isset($_POST['znacka']) && isset($_POST['model']) && isset($_POST['rok_vyroby'])) {
    $znacka = $_POST['znacka'];
    $model = $_POST['model'];
    $rok_vyroby = $_POST['rok_vyroby'];
    $sql = "INSERT INTO auta (znacka, model, rok_vyroby) VALUES ('$znacka', '$model', $rok_vyroby)";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo 'Chyba při vkládání záznamu: ' . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
