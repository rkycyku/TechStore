<?php
if (!isset($_SESSION)) {
    session_start();
      
}
if(!isset($_SESSION['aksesi'])){
    $_SESSION['aksesi'] = 0;  
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
            <a class="logo" href="../pages/index.php"><img src="../../img/web/techstoreLogoWhiteSquare.png" alt=""></a>
            <ul class="nav-links">
                <?php
                if ($_SESSION['aksesi'] != 0) {
                    echo '
                        <li class="nav-item">
                        <a href="../userPages/userDashboard.php">Dashboard</a>
                        <span class="line"></span>
                    </li>

                    <li class="nav-item">
                        <a href="../admin/shtoProdukt.php">Vendosja e Produkteve</a>
                        <span class="line"></span>
                    </li>

                    <li class="nav-item">
                        <a href="../admin/produktet.php">Produktet</a>
                        <span class="line"></span>
                    </li>
                    <li class="nav-item">
                        <a href="../admin/porositNgaKlientet.php">Porosite</a>
                        <span class="line"></span>
                    </li>
                    <li class="nav-item">
                        <a href="../admin/perdoruesit.php">Perdoruesit</a>
                        <span class="line"></span>
                    </li>
                    <li class="nav-item">
                        <a href="../admin/kompanit.php">Kompanit</a>
                        <span class="line"></span>
                    </li>
                    <li class="nav-item">
                        <a href="../admin/kategorit.php">Kategorit</a>
                        <span class="line"></span>
                    </li>
                    <li class="nav-item">
                        <a href="../admin/shfaqMesazhet.php">Mesazhet</a>
                        <span class="line"></span>
                    </li>';
                } else {
                    echo '
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
                    <li class="nav-item">
                        <a href="../pages/produktet.php">Products</a>
                        <span class="line"></span>
                    </li>';
                }
                ?>

            </ul>
            <ul class="auth">

                <?php
                if (isset($_SESSION['name'])) {
                    if ($_SESSION['aksesi'] != 0) {
                        echo
                            '<li class="nav-item">
                            <a href="../pages/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/aboutUs.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/contactForm.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/produktet.php">Products</a>
                        </li>
                            <li class="nav-item">
                                <a href="../admin/shtoKategorin.php">Add Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="../admin/shtoProdukt.php">Add Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="../admin/shtoKompanin.php">Add Companies</a>
                            </li></li><li class="nav-item">
                            <a href="../funksione/logout.php">Log Out</a>
                        </li>';
                    } else {
                        echo '    
                    <li class="nav-item">
                            <a href="../userPages/userDashboard.php">Dashboard</a>
                        </li><li class="nav-item">
                            <a href="../funksione/logout.php">Log Out</a>
                        </li>';
                    }
                } else {
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
    <script src="../../js/hamburgerMenu.js"></script>
</body>

</html>