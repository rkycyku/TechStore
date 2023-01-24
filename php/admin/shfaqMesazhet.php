<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../CRUD/contactFormCRUD.php');

$contactFormCRUD = new contactFormCRUD();
$contactForm = $contactFormCRUD->shfaqMesazhet();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Porosite | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
    <link rel="stylesheet" href="../../css/adminDashboard.css" />
</head>

<body>

    <?php include '../design/headerAdmin.php' ?>

    <div class="containerDashboardP">
        <?php
        if (isset($_SESSION['mezashiUKonfirmua'])) {
            echo '
                  <div class="mesazhiSuksesStyle">
                    <h3>Mesazhi u konfirmua me sukses!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';

        }
        ?>
        <h1>Lista e Mesazheve</h1>
        <table>
            <tr>
                <th>ID Mesazhi</th>
                <th>Emri</th>
                <th>Email</th>
                <th>Mesazhi</th>
                <th>Data e Dergeses</th>
                <th>Statusi</th>
                <th>Funksione</th>
            </tr>
            <?php


            foreach ($contactForm as $mesazhi) {
                echo '
            <tr>
              <td>' . $mesazhi['IDmesazhi'] . '</td>
              <td>' . $mesazhi['emri'] . '</td>
              <td>' . $mesazhi['email'] . '</td>
              <td>' . $mesazhi['mesazhi'] . '</td>
              <td>' . $mesazhi['dataDergeses'] . '</td>
              <td>' . $mesazhi['statusi'] . '</td>
              <td><button class="edito"><a href="./konfirmoMesazhin.php?IDmesazhi=' . $mesazhi['IDmesazhi'] . '">Konfirmo</a></button></td>
            </tr>
          ';
            }
            ?>
        </table>
    </div>

    <?php
    include '../design/footerAdmin.php';
    include('../funksione/importimiScriptave.php') ?>
</body>

</html>
<?php unset($_SESSION['mezashiUKonfirmua']) ?>