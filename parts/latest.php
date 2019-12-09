<?php
    $laatste = count($artikel)-1;
 ?>
<form class="nieuws_sec" method="post">
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
          <button class='underline blauw nonbutton' value='$artikel[$laatste]' type='submit' name='Article'>
              $artikel[$laatste]
          </button>
        </div>
      </div>";
      $laatste --;
    }
   ?>
</form>
