<?php
if (!isset($_SESSION)) {
  session_start();
}

    $quantity = json_decode(file_get_contents("php://input"), true)["quantity"];
    $price = $quantity * $_SESSION['qmimiProduktit'] + 2;
    echo $price;
?>