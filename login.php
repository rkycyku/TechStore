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
    <?php include './header.html'?>
      <div class="forms" >
        <form name="LoginForm" onsubmit="return validimiLogin();">
          <h1 class="form-title">Log In</h1>
          <input class="form-input" name="email" type="email" placeholder="Email">
          <input class="form-input" name="password" type="password" placeholder="Password">
          <div class="reg">
            <p>Don't have an account? <a href="signup.html">Sign Up</a></p>
          </div>
          <input class="button" type="submit" value="Log In"/>
        </form>
    </div>
    <script src="./js/validimiFormave.js"></script>
  </body>
</html>
