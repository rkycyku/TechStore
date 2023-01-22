<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/aboutUs.css" />
</head>

<body>
  <?php include '../design/headerMain.php'; ?>

  <div class="about">
    <div class="photo">
      <img src="../../img/web/techstoreLogoBlue.jpg" alt="" />
    </div>
    <div class="about-txt">
      <h3 class="title">Want to know more about us?</h3>
      <p class="txt">
        What we created is a place where you can find the newest features from technology with the best prices.
      </p>
    </div>
  </div>

  <?php include '../design/footerMain.php' ?>
</body>

</html>