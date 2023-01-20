<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Tech Store</title>
    <link rel="shortcut icon" href="./img/web/favicon.ico"/>
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/forms.css" />
  </head>
  <body>
    <?php include './header.php'?>
      <div class="forms" >
        
        <form name="LoginForm" onsubmit="return validimiLogin();" action='./php/funksione/loginUser.php' method="POST">
          <?php
          if(isset($_SESSION['passGabim'])){
            echo '
                  <div class="mesazhiGabimStyle">
                    <h3>Keni shenuar passwordin gabim!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
          }
          if(isset($_SESSION['uNameGabim'])){
            echo '
                  <div class="mesazhiGabimStyle">
                    <h3>Ky username nuk egziston!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
          }
          ?>
          <h1 class="form-title">Log In</h1>
          <input class="form-input" name="username" type="text" placeholder="Username" required>
          <input class="form-input" name="password" type="password" placeholder="Password">
          <div class="reg">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
          </div>
          <input class="button" type="submit" value="Log In" name='login'/>
        </form>
    </div>
    <script src="./js/validimiFormave.js"></script>
    <script src="./js/mbyllMesazhin.js"></script>
  </body>
</html>


<?php
unset($_SESSION['passGabim']);
unset($_SESSION['uNameGabim']);
?>