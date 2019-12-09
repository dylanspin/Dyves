<?php
    $laatste = count($artikel)-1;
 ?>
<div class="nieuws_sec">
  <span class="text">Laatste nieuws</span>
  <hr>
  <div class="space"></div>
  <?php
    for($i=0; $i<=5; $i++){
      echo "
      <div class='artikel border'>
        <img src='pic/artikels/$imgArtikel[$laatste]' class='artikel_foto'>
        <div class='artikel_text'>
          <div class='datum'>$datumArtikel[$laatste]</div>
          <span class='underline blauw'>
              $artikel[$laatste]
          </span>
        </div>
      </div>";
      $laatste --;
    }
   ?>
</div>
