<?php
$dbhost = "localhost";
$dbname = "cars";
$dbuser = "root";
$dbpass = "root";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Připojení k databázi selhalo: " . mysqli_connect_error());
}

if (isset($_POST['id']) && isset($_POST['znacka']) && isset($_POST['model']) && isset($_POST['rok_vyroby'])) {
    $id = $_POST['id'];
    $znacka = $_POST['znacka'];
    $model = $_POST['model'];
    $rok_vyroby = $_POST['rok_vyroby'];
    $sql = "UPDATE auta SET znacka='$znacka', model='$model', rok_vyroby=$rok_vyroby WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo 'Chyba při úpravě záznamu: ' . mysqli_error($conn);
    }
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM auta WHERE id=$id");
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo 'Záznam nebyl nalezen';
}

mysqli_close($conn);
?>
