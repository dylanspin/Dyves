<?php
  require_once __DIR__ . '/../php/bootstrap.php';

  function reload() {
      echo "<script>
              if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
                location.reload(true);
              }
            </script>";
  }

  $currentPoll = 1;
  $hasSettings = false;
  $resCheck = $conn->query("SHOW TABLES LIKE 'settings'");
  if ($resCheck && $resCheck->num_rows > 0) {
      $hasSettings = true;
  }
  if ($hasSettings) {
      $row = db_one($conn, "SELECT Poll FROM `settings` WHERE Id = '1' LIMIT 1");
      if ($row !== null) {
          $currentPoll = (int)$row['Poll'];
      }
  }

  $vraagPoll      = '';
  $statusPoll     = 0;
  $VragenPoll     = [];
  $AntwoordenPoll = [];

  $hasPoll = false;
  $resCheck2 = $conn->query("SHOW TABLES LIKE 'poll'");
  if ($resCheck2 && $resCheck2->num_rows > 0) {
      $hasPoll = true;
  }
  if ($hasPoll) {
      try {
          $row = db_one($conn, 'SELECT Naam, Status, Vragen, Antwoorden FROM `poll` WHERE Id = ? LIMIT 1', 'i', $currentPoll);
          if ($row !== null) {
              $vraagPoll      = (string)$row['Naam'];
              $statusPoll     = $row['Status'];
              $VragenPoll     = dyves_decode($row['Vragen']);
              $AntwoordenPoll = dyves_decode($row['Antwoorden']);
          }
      } catch (mysqli_sql_exception $e) {
          // table missing or query failed; safe defaults already set
      }
  }

  $score = [0, 0, 0, 0];
  foreach ($AntwoordenPoll as $a) {
      $a = (int)$a;
      if ($a >= 0 && $a <= 3) {
          $score[$a]++;
      }
  }
  $total = array_sum($score);
  if ($total === 0) {
      $procenten = [0, 0, 0, 0];
  } else {
      $procenten = array_map(fn($s) => round($s / $total * 100), $score);
  }
?>

<div class="poll border">
  <span class="text">Wat vind jij ?</span>
  <hr>
  <div class="space"></div>
  <span class="text2"><?php echo e($vraagPoll); ?></span>
  <?php
    if (count($VragenPoll) > 0) {
        for ($i = 0; $i <= 3; $i++) {
            $vraag = $VragenPoll[$i] ?? '';
            echo "<form class='procent' method='post'>";
            csrf_field();
            echo   "<div class='pol_info'>" .
                     "<div class='procentages' style='width:" . (int)$procenten[$i] . "%'></div>" .
                     "<span class='blauw left'>" . (int)$procenten[$i] . "%</span>" .
                     "<button class='pollbutton underline' type='submit' name='SubmitPoll' value='" . e($i) . "'>" .
                       e($vraag) .
                     "</button>" .
                   "</div>" .
                 "</form>";
        }
    }
  ?>
  <div class="space"></div>
  <button class="inlog_ver bottom">
    <span class="blauw">Lees meer of discussieer mee</span>
  </button>
</div>

<?php
  if (isset($_POST['SubmitPoll'])) {
      csrf_check();
      if (!($voted ?? false) && is_numeric($_POST['SubmitPoll'])) {
          $antwoord = (int)$_POST['SubmitPoll'];
          if ($antwoord < 0 || $antwoord > 3) {
              return;
          }
          $row = db_one($conn, 'SELECT Antwoorden FROM `poll` WHERE Id = ? LIMIT 1', 'i', $currentPoll);
          $AntwoordenPoll2 = $row !== null ? dyves_decode($row['Antwoorden']) : [];
          $AntwoordenPoll2[] = $antwoord;
          if (($_SESSION['wachtwoordCheck'] ?? '') === 'true') {
              if (db_query($conn, 'UPDATE `poll` SET `Antwoorden` = ? WHERE Id = ?', 'si', dyves_encode($AntwoordenPoll2), $currentPoll)) {
                  db_query($conn, "UPDATE `notusers` SET `Voted` = '1' WHERE UNIQ = ?", 's', (string)$current);
              }
          }
      }
      reload();
  }
?>
