<?php
if (!isset($porosia)) {
  session_start();
}


include_once('../CRUD/porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();

$porosiaCRUD->setPorosiaID($_GET['nrPorosis']);

$porosia = $porosiaCRUD->shfaqPorosinSipasID();
$produktetEPorosis = $porosiaCRUD->shfaqProduktetEPorosisSipasID();
if ($porosia['idKlienti'] != $_SESSION['userID'] && $_SESSION['aksesi'] == 0 && $_SESSION['userID'] == null && $porosia['emri'] != $_SESSION['emri']) {
  echo '<script>document.location="../userPages/porosit.php"</script>';
}

$nentotali = 0;
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php echo $porosia['emri'] . ' ' . $porosia['mbiemri'] . ' - ' . '#' . $porosia['nrPorosis'] . ' / ' . $porosia['dataPorosis'] ?>
    | Tech Store
  </title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/fatura.css">
  <!-- jsPDF sherben per konvertimin e webfaqes ne PDF si lloj fature ndersa 
      html2canvas sherben per ta konvertuar ne foto dhe ne kete menyre mund te konvertohet ne pdf e gjith permbajtja -->
  <script src="../../js/jspdf.min.js"></script>
  <script src="../../js/html2canvas.js"> </script>

  <script>
    function printoFaturen() {
      html2canvas(document.body, {
        useCORS: true
        , onrendered: function (canvas) {
          var contentWidth = canvas.width;
          var contentHeight = canvas.height;
          //One page pdf shows the canvas height generated by html pages.
          var pageHeight = contentWidth / 592.28 * 841.89;
          //html page height without pdf generation
          var leftHeight = contentHeight;
          //Page offset
          var position = 0;
          //a4 paper size [595.28, 841.89], html page generated canvas in pdf picture width
          var imgWidth = 555.28;
          var imgHeight = 555.28 / contentWidth * contentHeight;
          var pageData = canvas.toDataURL('image/jpeg', 1.0);
          var pdf = new jsPDF('', 'pt', 'a4');
          //There are two heights to distinguish, one is the actual height of the html page, and the page height of the generated pdf (841.89)
          //When the content does not exceed the range of pdf page display, there is no need to paginate
          if (leftHeight < pageHeight) { pdf.addImage(pageData, 'JPEG', 20, 0, imgWidth, imgHeight); } else {
            while (leftHeight > 0) {
              pdf.addImage(pageData, 'JPEG', 20, position, imgWidth, imgHeight)
              leftHeight -= pageHeight;
              position -= 841.89;
              //Avoid adding blank pages
              if (leftHeight > 0) {
                pdf.addPage();
              }
            }
          }

          var klienti = document.getElementById("emriKlientit").innerHTML;
          var nrFatures = document.getElementById("nrFatures").innerHTML;
          var dataFatures = document.getElementById("dataPorosis").innerHTML;

          pdf.save(klienti + " - " + nrFatures + " - " + dataFatures + ".pdf");
          setTimeout(window.close, .1);
        }
      });
    }

    window.onload = printoFaturen;
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
          <span style="font-size: 30pt;" id="emriKlientit"><?php echo ucfirst($porosia['emri']) . ' ' . ucfirst($porosia['mbiemri']) ?>
          </span>
        </h1>
        <p style="font-size: 20pt">
          <?php echo $porosia['nrKontaktit'] ?>
        </p>
        <p style="font-size: 20pt">
          <?php echo $porosia['email'] ?>
        </p>
      </div>
    </div>

    <div class="data">
      <h1>Fatura nr:
        <span style="font-size: 30pt;" id="nrFatures"><?php echo '#' . $porosia['nrPorosis'] ?>
        </span>
      </h1>
      <h3>Data e Porosis
        <span style="font-size: 20pt;" id="dataPorosis"><?php echo date("d-m-y", strtotime($porosia['dataPorosis'])) ?>
        </span>
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
      <?php
      foreach ($produktetEPorosis as $produktet => $produkti) {
        ?>

        <tr>
          <td>
            <?php echo $produkti['emriProduktit'] ?>
          </td>
          <td>
            <?php echo number_format($produkti['qmimiProd'], 2) . ' €' ?>
          </td>
          <td>
            <?php echo $produkti['sasiaPorositur'] ?>
          </td>
          <td>
            <?php echo number_format($produkti['qmimiTotal'], 2) . ' €' ?>
          </td>
        </tr>

        <?php

        $nentotali = $nentotali + $produkti['qmimiTotal'];
      }
      ?>



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
            <?php echo $porosia['emri'] ?>
          </td>
        </tr>
        <tr>
          <td><strong>Mbiemri: </strong></td>
          <td>
            <?php echo $porosia['mbiemri'] ?>
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
            <?php echo $porosia['email'] ?>
          </td>
        </tr>
        <tr>
          <td><strong>Qyteti: </strong></td>
          <td>
            <?php echo $porosia['qyteti'] ?>
          </td>
        </tr>
        <tr>
          <td><strong>Zip Kodi: </strong></td>
          <td>
            <?php echo $porosia['zipKodi'] ?>
          </td>
        </tr>
        <tr>
          <td><strong>Adresa: </strong></td>
          <td>
            <?php echo $porosia['adresa'] ?>
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
      <h3>Ju lutemi qe pas pranimit ta konfirmoni porosine ne Sistem!</h3>
    </div>
    <div class="detajetPoresis">
      <table class="tabelaQmimit">
        <?php if ($nentotali != $porosia['TotaliPorosis']) {
          ?>
          <tr>
            <td>
              <strong>Nentotali: </strong>
            </td>
            <td>
              <?php echo number_format($nentotali, 2) . ' €' ?>
            </td>
          </tr>
          <tr>
            <td>
              <strong>Zbritja: </strong>
            </td>
            <td>
              <?php echo number_format($porosia['TotaliPorosis'] - $nentotali, 2) . ' €' ?>
            </td>
          </tr>
          <?php
        }
        ?>
        <tr>
          <td>
            <strong>Totali Pa TVSH: </strong>
          </td>
          <td>
            <?php echo number_format($porosia['TotaliPorosis'] - ($porosia['TotaliPorosis'] * 0.18), 2) . ' €' ?>
          </td>
        </tr>
        <tr>
          <td>
            <strong>TVSH 18%: </strong>
          </td>
          <td>
            <?php echo number_format($porosia['TotaliPorosis'] * 0.18, 2) . ' €' ?>
          </td>
        </tr>
        <tr>
          <td style="font-size: 20pt">
            <strong>Qmimi Total: </strong>
          </td>
          <td style="font-size: 20pt">
            <strong>
              <?php echo number_format($porosia['TotaliPorosis'], 2) . ' €' ?>
            </strong>
          </td>
        </tr>
      </table>
    </div>


  </div>


</body>

</html>