<?php
require_once('../CRUD/kompaniaCRUD.php');

$kompaniaCRUD = new kompaniaCRUD();

$kompanit = $kompaniaCRUD->shfaqKompanin();
echo ' <section class="brandsSlider"> 
        <h2 class="brandsSlider-Label">Brands</h2>
        
        <button class="shkoMajtas"><img src="../../img/slider/arrow.png" alt=""></button>
        <button class="shkoDjathtas"><img src="../../img/slider/arrow.png" alt=""></button>

        <div class="kornizaEBrendeve">';
foreach($kompanit as $kompania){
    echo'
            <div class="kartelaEBrendit">
                <div class="logoBrendit">
                    <img src="../../img/slider/sliderIcons/'.$kompania['kompaniaLogo']. '" alt="">
                </div>
            </div>';
}
echo '
</div>
      </section>';
?>