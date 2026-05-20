<?php
  require_once __DIR__ . '/../php/bootstrap.php';

  $wie = (strlen((string)($_SESSION['bezoek'] ?? '')) >= 1)
         ? (string)$_SESSION['bezoek']
         : (string)($gebruikersnaam_ ?? '');

  $row = db_one($conn, 'SELECT Fotos FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', $wie);
  $uncompressed = $row !== null ? dyves_decode($row['Fotos']) : [];
  $tell = 0;

  if (($_SESSION['Waar'] ?? '') === 'fotos') {
      if (!empty($uncompressed)) {
          foreach ($uncompressed as $i => $foto) {
              echo "<div class='foto2 hoverscale'>" .
                     "<img id='" . e($i) . "' onclick='modal(this)' src='pic/fotos/" . e($foto) . "' class='nieuws_img'>" .
                   "</div>";
          }
      }
  } else {
?>
  <div class="fotos profielkleur2">
    <div class="watProfiel tweev">Foto's & Video's</div>
    <?php
      if (!empty($uncompressed)) {
          foreach ($uncompressed as $i => $foto) {
              $tell++;
              if ($tell <= 5) {
                  echo "<div class='foto hoverscale'>" .
                         "<img id='" . e($i) . "' onclick='modal(this)' src='pic/fotos/" . e($foto) . "' class='nieuws_img'>" .
                       "</div>";
              }
          }
      }
    ?>

    <form class="meer underline" method="post">
      <?php csrf_field(); ?>
      <button class="Buttonnone underline" type="submit" name="Meerfotos">Bekijk meer...</button>
    </form>

  </div>
  <?php } ?>
  <div id="myModal" class="modal">
    <span class="close2" id="close2">&times;</span>
    <img class="modal-content" id="img01">
  </div>
