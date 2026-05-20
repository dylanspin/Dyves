<?php
  require_once __DIR__ . '/../php/bootstrap.php';

  $leestNu = (string)($_SESSION['CurentArticle'] ?? '');
  $row = db_one($conn, 'SELECT Artikel, Text_, Img, Label, Status, Datum FROM `artikels` WHERE Artikel = ? LIMIT 1', 's', $leestNu);
  if ($row !== null) {
      $artikel1 = (string)$row['Artikel'];
      $artikel2 = (string)$row['Text_'];
      $artikel3 = (string)$row['Img'];
      $artikel4 = (string)$row['Label'];
      $artikel5 = (string)$row['Status'];
      $artikel6 = (string)$row['Datum'];
  } else {
      $artikel1 = $artikel2 = $artikel3 = $artikel4 = $artikel5 = $artikel6 = '';
  }
?>
<div class="LeesArtikel">
  <div class="LeesArtikelKop">
    <?php echo e($artikel1); ?>
  </div>
  <img src="pic/artikels/<?php echo e($artikel3); ?>" class="LeesArtikelFoto">
  <div class="LeesArtikelText">
    <hr>
    <?php echo nl2br(e($artikel2)); ?>
  </div>
  <div class="LeesArtikelDatum grijs">
    <?php echo e($artikel6); ?>
  </div>
</div>
