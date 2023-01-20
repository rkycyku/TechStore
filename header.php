<?php
if(!isset($_SESSION) || empty($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css" />      
    <script src="https://kit.fontawesome.com/aef627d6f9.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="nav">
            <a class="logo" href="index.php"><img src="./img/web/techstoreLogoWhiteSquare.png" alt=""></a>
            <ul class="nav-links">
                <li class="nav-item">
                    <a href="./index.php">Home</a>
                    <span class="line"></span>
                </li>
                <li class="nav-item">
                    <a href="./aboutUs.php">About Us</a>
                    <span class="line"></span>
                </li>
                <li class="nav-item">
                    <a href="./contactForm.php">Contact Us</a>
                    <span class="line"></span>
                </li> 
            </ul>
            <ul class="auth">
            
                 <?php
                 if(isset($_SESSION['name'])){
                    echo 
                        '<li class="nav-item">
                            <a href="">Mirësevini ' . $_SESSION['name'] . '</a>
                        </li>
                        <li class="nav-item">
                            <a href="./php/funksione/logout.php">Log Out</a>
                        </li>';
                }else{
                    echo
                        '<li class="nav-item">
                            <a href="./login.php">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a href="./signup.php">Sign Up</a>
                        </li>';
                }
                ?>
            </ul>
            
            <div class="hamburger">
                <span class="hamIkona"></span>
                <span class="hamIkona"></span>
                <span class="hamIkona"></span>
            </div>
        </nav>
      </header>
      <script src="./js/hamburgerMenu.js"></script>
</body>
</html>