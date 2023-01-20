<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up | Tech Store</title>
    <link rel="shortcut icon" href="./img/web/favicon.ico"/>
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/forms.css" />
  </head>
  <body>
    <?php include './header.php'?>
      <div class="forms">
         <form name="SignUpForm" onsubmit="return validimiSignUp();" action='./php/funksione/regUser.php' method="POST">
          <h1 class="form-title">Sign Up</h1>
          <input class="form-input" name="name" type="text" placeholder="Name">
          <input class="form-input" name="lName" type="text" placeholder="Lastname">
          <input class="form-input" name="uName" type="text" placeholder="Username">
          <input class="form-input" name="email" type="text" placeholder="Email">
          <input class="form-input" name="password" type="password" placeholder="Password">
          <input class="button" type="submit" value="Sign Up" name='submit'>
        </form>
      </div>
    <script src="./js/validimiFormave.js"></script>
  </body>
</html>
