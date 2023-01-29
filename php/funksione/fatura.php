<?php
if (!isset($porosia)) {
  session_start();
}


include_once('../CRUD/porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();

$porosiaCRUD->setPorosiaID($_GET['nrPorosis']);

$porosia = $porosiaCRUD->shfaqPorosinSipasID();

if ($porosia['userID'] != $_SESSION['userID'] && $_SESSION['aksesi'] == 0) {
  echo '<script>document.location="../userPages/porosit.php"</script>';
}
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php echo $porosia['emriKlientit'] . ' ' . $porosia['mbiemriKlientit'] . ' - ' . '#' . $porosia['porosiaID'] . ' / ' . $porosia['dataPorosis'] ?>
    | Tech Store
  </title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/fatura.css">
  <!-- jsPDF sherben per konvertimin e webfaqes ne PDF si lloj fature -->
  <script src="../../js/jspdf.min.js"></script>

  <script>
    function generateInvoice() {
      const pdf = new jsPDF('p', 'mm', 'a4');

      var klienti = document.getElementById("emriKlientit").innerHTML;
      var nrFatures = document.getElementById("nrFatures").innerHTML;
      var dataFatures = document.getElementById("dataPorosis").innerHTML;

      pdf.addHTML(document.body, {
        background: "#FFFFFF"
      }, function () {
        pdf.save(klienti + " - " + nrFatures + " - " + dataFatures + ".pdf");
        setTimeout(window.close, .1);
      });
    }

    window.onload = generateInvoice;
  </script>
</head>

<body>
  <div class="header">
    <div class="teDhenatKompanis">
      <img src="../../img/web/techstoreLogoWhiteSquare.png">
      <h1>TechStore SH.P.K.</h1>
      <p>1316 Industrial Rd. Mount Pleasant, TX 75455</p>
      <p>contact@tech.store</p>
      <p>+1-111-222-3333</p>

      <div class="teDhenatKlientit">
        <h1>
          <?php echo '<span style="font-size: 30pt;" id="emriKlientit">' . $porosia['emriKlientit'] . ' ' . $porosia['mbiemriKlientit'] . '</span>' ?>
        </h1>
        <p style="font-size: 20pt">
          <?php echo $porosia['nrKontaktit'] ?>
        </p>
        <p style="font-size: 20pt">
          <?php echo $porosia['emailKlientit'] ?>
        </p>
      </div>
    </div>

    <div class="data">
      <h1>Fatura nr:
        <?php echo '<span style="font-size: 30pt;" id="nrFatures">#' . $porosia['porosiaID'] . '</span>' ?>
      </h1>
      <h3>Data e Porosis
        <?php echo '<span style="font-size: 20pt;" id="dataPorosis">' . date("d-m-y", strtotime($porosia['dataPorosis'])) . '</span>' ?>
      </h3>
    </div>


  </div>

  <br>
  <hr style="height:2px;border-width:0;color:gray;background-color:black">
  <br>
  <br>

  <h1 style="text-align: center;">Detajet e Porosis</h1>
  <div class="tabelaETeDhenaveProduktit">

    <table>
      <tr>
        <th>
          <h3>Emri Produktit</h3>
        </th>
        <th>
          <h3>Qmimi Produktit</h3>
        </th>
        <th>
          <h3>Sasia</h3>
        </th>
        <th>
          <h3>Qmimi Total</h3>
        </th>
      </tr>
      <tr>
        <td>
          <?php echo $porosia['emriProduktit'] ?>
        </td>
        <td>
          <?php echo number_format($porosia['qmimiProd'], 2) . ' €' ?>
        </td>
        <td>
          <?php echo $porosia['sasiaPorositur'] ?>
        </td>
        <td>
          <?php echo number_format($porosia['qmimiProd'] * $porosia['sasiaPorositur'], 2) . ' €' ?>
        </td>
      </tr>
    </table>
  </div>

  <br>
  <hr style="height:2px;border-width:0;color:gray;background-color:black">
  <br>
  <br>
  <br>
  <br>
  <div class="containerFatura">
    <div class="detajetDorezimit">
      <h1>Detajet e dorezimit</h1>
      <br>
      <table>
        <tr>
          <td><strong>Emri: </strong></td>
          <td>
            <?php echo $porosia['emriKlientit'] ?>
          </td>
        </tr>
        <tr>
          <td><strong>Mbiemri: </strong></td>
          <td>
            <?php echo $porosia['mbiemriKlientit'] ?>
          </td>
        </tr>
        <tr>
          <td><strong>Tel: </strong></td>
          <td>
            <?php echo $porosia['nrKontaktit'] ?>
          </td>
        </tr>
        <tr>
          <td><strong>Email: </strong></td>
          <td>
            <?php echo $porosia['emailKlientit'] ?>
          </td>
        </tr>
        <tr>
          <td><strong>Qyteti: </strong></td>
          <td>
            <?php echo $porosia['qyteti'] ?>
          </td>
        </tr>
        <tr>
          <td><strong>Adresa: </strong></td>
          <td>
            <?php echo $porosia['adresaKlientit'] ?>
          </td>
        </tr>
      </table>

      <br>

      <h1>Shenime shtes</h1>
      <br>
      <p style="font-size: 20pt">Paguani pas pranimit te porosis</p>
      <p style="font-size: 20pt">Porosia arrin me se largu
        <strong>
          <?php echo date("d-m-y", strtotime("+4 days", strtotime(date($porosia['dataPorosis'])))) ?>
        </strong>
      </p>
    </div>
    <div class="detajetPoresis">
      <table class="tabelaQmimit">
        <tr>
          <td>
            <strong>Totali Pa TVSH: </strong>
          </td>
          <td>
            <?php echo number_format(($porosia['qmimiProd'] * $porosia['sasiaPorositur']) - (($porosia['qmimiProd'] * $porosia['sasiaPorositur']) * 0.18), 2) . ' €' ?>
          </td>
        </tr>
        <tr>
          <td>
            <strong>TVSH 18%: </strong>
          </td>
          <td>
            <?php echo number_format(($porosia['qmimiProd'] * $porosia['sasiaPorositur']) * 0.18, 2) . ' €' ?>
          </td>
        </tr>
        <tr>
          <td>
            <strong>Qmimi transportit: </strong>
          </td>
          <td>2 €</td>
        </tr>
        <tr>
          <td style="font-size: 20pt">
            <strong>Qmimi Total: </strong>
          </td>
          <td style="font-size: 20pt">
            <strong>
              <?php echo number_format($porosia['qmimiProd'] * $porosia['sasiaPorositur'] + 2, 2) . ' €' ?>
            </strong>
          </td>
        </tr>
      </table>
    </div>


  </div>


</body>

</html>