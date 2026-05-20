<?php
  if (!isset($artikel) || !is_array($artikel) || count($artikel) === 0) {
      return;
  }
  $laatste = count($artikel) - 1;
?>
<form class="nieuws_sec" method="post">
  <?php csrf_field(); ?>
  <span class="text">Laatste nieuws</span>
  <hr>
  <div class="space"></div>
  <?php
    for ($i = 0; $i <= 5; $i++) {
        if ($laatste < 0) {
            break;
        }
        $img = $imgArtikel[$laatste] ?? 'placeholder.jpg';
        $dat = $datumArtikel[$laatste] ?? '';
        $art = $artikel[$laatste] ?? '';
        echo "<div class='artikel border'>" .
               "<img src='pic/artikels/" . e($img) . "' class='artikel_foto'>" .
               "<div class='artikel_text'>" .
                 "<div class='datum'>" . e($dat) . "</div>" .
                 "<button class='underline blauw nonbutton' value='" . e($art) . "' type='submit' name='Article'>" . e($art) . "</button>" .
               "</div>" .
             "</div>";
        $laatste--;
    }
  ?>
</form>
