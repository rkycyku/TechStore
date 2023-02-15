<?php
if (!isset($_SESSION)) {
    session_start();

}

if (!isset($_SESSION['aksesi'])) {
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
    <script src="https://kit.fontawesome.com/aef627d6f9.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="nav">
            <div class="nav-left">
                <a class="logo" href="../pages/index.php"><img src="../../img/web/techstoreLogoWhiteSquare.png"
                        alt=""></a>
            </div>
            <ul class="nav-links">
                <div class="nav-center">
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
                    </li>
                </div>
                <div class="nav-right">
                    <li class="nav-item">
                        <a href="../pages/shporta.php"><span class="fa badge fa-lg" value="<?php
                        if (isset($_SESSION['shportaBlerjes'])) {
                            echo count($_SESSION['shportaBlerjes']);
                        } else {
                            echo 0;
                        } ?>">&#xf07a;</span></a>
                    </li>
                    <?php
                    if (isset($_SESSION['name'])) {
                        ?>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="dropbtn"><a href="../userPages/userDashboard.php"><span
                                            class="fa fa-lg">&#xf2bd;</span></a>
                                </button>
                                <div class="dropdown-content">
                                    <?php
                                    if ($_SESSION['aksesi'] != 0) {
                                        ?>

                                        <a href="../admin/shtoProdukt.php">Vendos Produktet</a>
                                        <a href="../admin/produktet.php">Produktet</a>
                                        <a href="../admin/porositNgaKlientet.php">Porosite</a>
                                        <a href="../admin/perdoruesit.php">Perdoruesit</a>
                                        <a href="../admin/kompanit.php">Kompanite</a>
                                        <a href="../admin/kategorit.php">Kategorite</a>
                                        <a href="../admin/kodetEZbritjes.php">Kodet e Zbritjeve</a>
                                        <a href="../admin/shfaqMesazhet.php">Mesazhet</a>
                                        <a href="../admin/shtoKategorin.php">Vendos Kategorite</a>
                                        <a href="../admin/shtoKompanin.php">Vendos Kompanite</a>
                                        <a href="../admin/shtoKodinEZbritjes.php">Shtoni Kode te Zbritjeve</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="../userPages/porosit.php">Porosit e tua</a>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </li>

                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['name'])) {
                        ?>
                        <li class="nav-item">
                            <a href="../funksione/logout.php">Sign out &nbsp;<i class="fa-solid">&#xf2f5;</i></a>
                            <span class="line"></span>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a href="../pages/login.php">Sign in &nbsp;<i class="fa-solid">&#xf2f6;</i></a>
                            <span class="line"></span>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/signup.php">Sign up &nbsp;<i class="fa-solid">&#xf234;</i></a>
                            <span class="line"></span>
                        </li>
                        <?php
                    }
                    ?>
                </div>
            </ul>

            <!-- Hamburger Menu -->
            <ul class="mobile-shporta">
                <li class="nav-item">
                    <a href="../pages/shporta.php"><span class="fa badge fa-lg" value="<?php
                    if (isset($_SESSION['shportaBlerjes'])) {
                        echo count($_SESSION['shportaBlerjes']);
                    } else {
                        echo 0;
                    } ?>">&#xf07a;</span></a>
                </li>
            </ul>
            <div class="hamburger">
                <div class="dropdown">
                    <button class="dropbtn">
                        <span class="hamIkona"></span>
                        <span class="hamIkona"></span>
                        <span class="hamIkona"></span>
                    </button>
                    <div class="dropdown-content">
                        <a href="../pages/index.php">Home</a>
                        <a href="../pages/aboutUs.php">About Us</a>
                        <a href="../pages/contactForm.php">Contact Us</a>
                        <a href="../pages/produktet.php">Products</a>
                        <?php
                        if (isset($_SESSION['name'])) {
                            if ($_SESSION['aksesi'] != 0) {
                                ?>
                                <a href="../userPages/userDashboard.php">Dashboard &nbsp;<span
                                        class="fa-solid">&#xf2bd;</span></a>
                                <a href="../admin/produktet.php">Produktet</a>
                                <a href="../admin/porositNgaKlientet.php">Porosite</a>
                                <a href="../admin/perdoruesit.php">Perdoruesit</a>
                                <a href="../admin/kategorit.php">Kategorite</a>
                                <a href="../admin/kodetEZbritjes.php">Kodet e Zbritjeve</a>
                                <a href="../admin/shfaqMesazhet.php">Mesazhet</a>
                                <a href="../admin/kompanit.php">Kompanite</a>
                                <a href="../admin/shtoProdukt.php">Vendos Produktet</a>
                                <a href="../admin/shtoKategorin.php">Vendos Kategorite</a>
                                <a href="../admin/shtoKompanin.php">Vendos Kompanite</a>
                                <a href="../admin/shtoKodinEZbritjes.php">Shtoni Kode te Zbritjeve</a>
                                <a href="../funksione/logout.php">Sign out &nbsp;<i class="fa-solid">&#xf2f5;</i></a>
                                <?php
                            } else {
                                ?>
                                <a href="../userPages/userDashboard.php">Dashboard &nbsp;<span
                                        class="fa-solid">&#xf2bd;</span></a>
                                <a href="../userPages/porosit.php">Porosit e tua</a>
                                <a href="../funksione/logout.php">Sign out &nbsp;<i class="fa-solid">&#xf2f5;</i></a>
                                <?php
                            }
                        } else {
                            ?>
                            <a href="../pages/login.php">Sign in &nbsp;<i class="fa-solid">&#xf2f6;</i></a>
                            <a href="../pages/signup.php">Sign up &nbsp;<i class="fa-solid">&#xf234;</i></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>