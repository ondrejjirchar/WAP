<?php
  $znacka = $_POST['znacka'];
  $model = $_POST['model'];
  $rok_vyroby = $_POST['rok_vyroby'];

  $dbhost = "localhost";
  $dbname = "auta";
  $dbuser = "root";
  $dbpass = "root";
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  if (!$conn) {
      die("Připojení k databázi selhalo: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO auta (znacka, model, rok_vyroby) VALUES ('$znacka', '$model', '$rok_vyroby')";
  
  if (mysqli_query($conn, $sql)) {
      mysqli_close($conn);
      header('Location: index.php?success=true');
      exit;
  } else {
      echo "Chyba: " . $sql . "<br>" . mysqli_error($conn);
  }
?>
