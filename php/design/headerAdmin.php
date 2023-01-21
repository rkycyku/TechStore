<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/header.css" />
</head>
<body>
    <header>
        <nav class="nav">
            <a class="logo" href="index.php"><img src="../../img/web/techstoreLogoWhiteSquare.png" alt=""></a>
            <ul class="nav-links">
                <li class="nav-item">
                    <a href="../pages/index.php">Home</a>
                    <span class="line"></span>
                </li>
                <li class="nav-item">
                    <a href="../pages/aboutUs.php">About Us</a>
                    <span class="line"></span>
                </li>
                <li class="nav-item">
                    <a href="../pages/contactForm.php">Contact Us</a>
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
                            <a href="./adminDashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="./shtoKategorin.php">Vendosja e Kategorive</a>
                        </li>
                        <li class="nav-item">
                            <a href="./shtoProdukt.php">Vendosja e Produkteve</a>
                        </li>
                        <li class="nav-item">
                            <a href="./shtoKompanin.php">Vendosja e Kompanive</a>
                        </li>
                        <li class="nav-item">
                            <a href="../funksione/logout.php">Log Out</a>
                        </li>';
                        
                }else{
                    echo
                        '<li class="nav-item">
                            <a href="../pages/login.php">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/signup.php">Sign Up</a>
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
      <script src="../../js/hamburgerMenu.js"></script>
</body>
</html>