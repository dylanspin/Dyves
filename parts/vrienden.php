<div class="vrienden profielkleur2">
  <div class="vrienden_inner">
    <?php
      require_once __DIR__ . '/../php/bootstrap.php';

      if (($_SESSION['Waar'] ?? '') === 'bezoek') {
          $bezoekAC = (string)($_SESSION['bezoek'] ?? '');
          $row = db_one($conn, 'SELECT UNIQ FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', $bezoekAC);
          $currentt = $row !== null ? (string)$row['UNIQ'] : '';
      } else {
          $currentt = (string)($current ?? '');
      }

      $row = db_one($conn, 'SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = ? LIMIT 1', 's', $currentt);
      $vrienden = $row !== null ? dyves_decode($row['Vrienden']) : [];
      $aantal   = count($vrienden);
      $aantal2  = 0;

      for ($i = 0; $i < $aantal; $i++) {
          $friendName = (string)($vrienden[$i] ?? '');
          if ($friendName === '') {
              continue;
          }
          $row2 = db_one(
              $conn,
              'SELECT ProfielFoto, Man, Gebruikersnaam, AantalVrienden FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1',
              's',
              $friendName
          );
          if ($row2 === null) {
              continue;
          }
          $aantal2++;
          $foto_    = $row2['ProfielFoto'];
          $gender_  = $row2['Man'];
          $vriend_  = $row2['Gebruikersnaam'];
          $totaalV  = $row2['AantalVrienden'];
          $liveFoto = strlen((string)$foto_) <= 1 ? 'g' . $gender_ . '.jpg' : (string)$foto_;

          if ($i < 9) {
              echo "<div class='vriend'>" .
                   "<form method='post'>";
              csrf_field();
              echo   "<button type='submit' class='vriendenButton' name='bezoek' value='" . e($i) . "'>";
              if ($friendName === 'Dylanspin') {
                  echo "<img src='pic/kroon.png' class='kroon'>" .
                       "<img src='pic/profilepics/" . e($liveFoto) . "' class='vriendenImage img2'>";
              } else {
                  echo "<img src='pic/profilepics/" . e($liveFoto) . "' class='vriendenImage'>";
              }
              echo   "</button>" .
                   "</form>" .
                   "<span class='profielkleur'>(" . e($totaalV) . ")" .
                     "<span class='underline'>" . e($friendName) . "</span>" .
                   "</span>" .
                 "</div>";
          }
      }

      if (($_SESSION['Waar'] ?? '') === 'profiel') {
          db_query($conn, 'UPDATE `notusers` SET `AantalVrienden` = ? WHERE Gebruikersnaam = ?', 'is', $aantal2, (string)($gebruikersnaam_ ?? ''));
      } else {
          $Change = (string)($_SESSION['bezoek'] ?? '');
          if ($Change !== '') {
              db_query($conn, 'UPDATE `notusers` SET `AantalVrienden` = ? WHERE Gebruikersnaam = ?', 'is', $aantal2, $Change);
          }
      }
    ?>
    <div class="watProfiel tweev vriendbar">Vrienden (<?php echo (int)$aantal2; ?>)</div>
  </div>
  <div class="meer underline"><a href="Profielvrienden.php">Meer Vrienden...</a></div>
</div>
