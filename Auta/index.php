<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auta</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Auta</h1>
  <form method="post" action="add_car.php">
    <label>Značka:</label>
    <input type="text" name="znacka">
    <br>
    <label>Model:</label>
    <input type="text" name="model">
    <br>
    <label>Rok výroby:</label>
    <input type="number" name="rok_vyroby">
    <br>
    <input type="submit" value="Přidat">
  </form>
  <hr>
  <table>
<?php
  $dbhost = "localhost";
  $dbname = "auta";
  $dbuser = "root";
  $dbpass = "root";
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  if (!$conn) {
    die("Připojení k databázi selhalo: " . mysqli_connect_error());
  }
  if (isset($_POST['delete'])) {
    $idauta = $_POST['delete'];
    $sql = "DELETE FROM auta WHERE idauta=$idauta";
    mysqli_query($conn, $sql);
  }


  
  if (isset($_POST['edit'])) {
      $idauta = $_POST['edit'];
      $znacka = $_POST['znacka'];
      $model = $_POST['model'];
      $rok_vyroby = $_POST['rok_vyroby'];
      $sql = "UPDATE auta SET znacka='$znacka', model='$model', rok_vyroby=$rok_vyroby WHERE idauta=$idauta";
      mysqli_query($conn, $sql);
    }

$sql = "SELECT idauta, znacka, model, rok_vyroby FROM auta";
$result = mysqli_query($conn, $sql);

echo "<tr>";
echo "<th>Značka</th>";
echo "<th>Model</th>";
echo "<th>Rok výroby</th>";
echo "<th>Akce</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td><input type='text' name='znacka' value='" . htmlspecialchars($row['znacka']) . "'></td>";
echo "<td><input type='text' name='model' value='" . htmlspecialchars($row['model']) . "'></td>";
echo "<td><input type='number' name='rok_vyroby' value='" . htmlspecialchars($row['rok_vyroby']) . "'></td>";
echo "<td class='buttons'>";
if (isset($row['idauta'])) {
echo "<input type='hidden' name='edit' value='" . htmlspecialchars($row['idauta']) . "'>";
echo "<input type='submit' value='Upravit'>";
} else {
echo "<input type='submit' value='Uložit'>";
}
echo "</td>";
echo "<td class='buttons'>";
echo "<form method='post' action=''>";
if (isset($row['idauta'])) {
echo "<input type='hidden' name='delete' value='" . htmlspecialchars($row['idauta']) . "'>";
}
echo "<input type='submit' value='Smazat'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
mysqli_close($conn);
?>
</hr>
</table>


</body>
</html>
