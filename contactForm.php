<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | TechStore</title>
    <link rel="shortcut icon" href="./img/web/favicon.ico"/>
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/forms.css">
</head>
<style>

</style>
<body>
  <?php include './header.html'?>

    <div class="forms">
      <form name="ContactForm" action="" onsubmit="return validimiContactForm()">
        <h1 class="form-title">Contact Us</h1>
        <input class="form-input" name="name" type="text" placeholder="Name">
        <input class="form-input" name="email" type="text" placeholder="Email">
        <textarea placeholder="Enter your message!" name="msgField"></textarea>
        <input class="button" type="submit" value="Send" />
      </form>
    </div>
    <script src="./js/validimiFormave.js"></script>
  
</body>
</html>