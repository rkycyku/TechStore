<?php
if (!isset($_SESSION)) {
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
            <a class="logo" href="../pages/index.php"><img src="../../img/web/techstoreLogoWhiteSquare.png" alt=""></a>
            <ul class="nav-links">
                <li class="nav-item">
                    <a href="./userDashboard.php">Dashboard</a>
                    <span class="line"></span>
                </li>

                <li class="nav-item">
                    <a href="./porosit.php">Porosite</a>
                    <span class="line"></span>
                </li>


            </ul>
            <ul class="auth">
                <li class="nav-item">
                    <a href="../funksione/logout.php">Log Out</a>
                </li>
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