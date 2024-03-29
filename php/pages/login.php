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
  <title>Login | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/forms.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
  <?php include '../design/header.php'; ?>
  <div class="forms">

    <form name="LoginForm" onsubmit="return validimiLogin();" action='../funksione/loginUser.php' method="POST">
      <?php
      if (isset($_SESSION['passGabim'])) {
        ?>
        <div class="mesazhiStyle mesazhiGabimStyle">
          <h3>Keni shenuar passwordin gabim!</h3>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      if (isset($_SESSION['uNameGabim'])) {
        ?>
        <div class="mesazhiStyle mesazhiGabimStyle">
          <h3>Ky username nuk egziston!</h3>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      if (isset($_SESSION['nukJeLogin'])) {
        ?>
        <div class="mesazhiStyle mesazhiGabimStyle">
          <h3>Ju lutem kyquni ose krijoni nje llogari per te vazhduar me blerjen!</h3>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      ?>
      <h1 class="form-title">Log In</h1>
      <input class="form-input" name="username" type="text" placeholder="Username">
      <input class="form-input" name="password" type="password" placeholder="Password">
      <div class="reg">
        <p>Don't have an account? <a href="../pages/signup.php">Sign up &nbsp;<i class="fa-solid">&#xf234;</i></a></p>
      </div>
      <input class="button" type="submit" value="Log In" name='login' />
    </form>
  </div>
  <?php include_once('../funksione/importimiScriptave.php'); ?>
</body>

</html>


<?php
unset($_SESSION['passGabim']);
unset($_SESSION['uNameGabim']);
unset($_SESSION['nukJeLogin']);
?>