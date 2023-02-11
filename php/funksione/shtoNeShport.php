<?php
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['blej'])) {
  unset($_SESSION["shportaBlerjes"]);
} 


if (isset($_SESSION["shportaBlerjes"])) {

  $IdProduktit = array_column($_SESSION["shportaBlerjes"], "produktiID");
  if (!in_array($_POST["produktiID"], $IdProduktit)) {
    $Produkti = array(
      'produktiID' => $_POST["produktiID"],
      'emriProduktit' => $_POST["emriProduktit"],
      'qmimiProduktit' => $_POST["qmimiProduktit"],
      'sasia' => 1,
    );
    array_push($_SESSION['shportaBlerjes'], $Produkti);
    if (isset($_POST['blej'])) {
      echo '<script>document.location="../pages/shporta.php"</script>';
    } else {
      $_SESSION['uShtuaNeShport'] = true;
      echo '<script>document.location="../pages/produktet.php"</script>';
    }
  } else {
    $_SESSION['ekzistonNeShport'] = true;
    echo '<script>document.location="../pages/produktet.php"</script>';
  }
} else {

  $Produkti = array(
    'produktiID' => $_POST["produktiID"],
    'emriProduktit' => $_POST["emriProduktit"],
    'qmimiProduktit' => $_POST["qmimiProduktit"],
    'sasia' => 1,
  );
  $_SESSION["shportaBlerjes"][0] = $Produkti;
  if (isset($_POST['blej'])) {
    echo '<script>document.location="../pages/shporta.php"</script>';
  } else {
    $_SESSION['uShtuaNeShport'] = true;
    echo '<script>document.location="../pages/produktet.php"</script>';
  }
}

?>