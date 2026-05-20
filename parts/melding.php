<?php
  require_once __DIR__ . '/../php/bootstrap.php';

  function deleteInvite(mysqli $conn, string $Username, array $from, string $current): void {
      $from = array_values(array_filter($from, fn($v) => (string)$v !== $Username));
      db_query($conn, 'UPDATE `friend_invite` SET `To_user` = ? WHERE User = ?', 'ss', dyves_encode($from), $current);
      if (function_exists('reloadPost')) {
          reloadPost();
      }
  }

  $row = db_one($conn, 'SELECT To_user FROM `friend_invite` WHERE User = ? LIMIT 1', 's', (string)$current);
  $from = $row !== null ? dyves_decode($row['To_user']) : [];

  if (isset($_POST['buttonneg'])) {
      csrf_check();
      if (!is_numeric($_POST['buttonneg'])) {
          return;
      }
      $idx = (int)$_POST['buttonneg'];
      if (!isset($from[$idx])) {
          return;
      }
      deleteInvite($conn, (string)$from[$idx], $from, (string)$current);
  }

  if (isset($_POST['buttonac'])) {
      csrf_check();
      if (!is_numeric($_POST['buttonac'])) {
          return;
      }
      $idx = (int)$_POST['buttonac'];
      if (!isset($from[$idx])) {
          return;
      }
      $Username = (string)$from[$idx];

      $r1 = db_one($conn, 'SELECT UNIQ FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', $Username);
      if ($r1 === null) {
          return;
      }
      $UsernameDB = (string)$r1['UNIQ'];

      $r2 = db_one($conn, 'SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = ? LIMIT 1', 's', (string)$current);
      $vrienden = $r2 !== null ? dyves_decode($r2['Vrienden']) : [];

      $r3 = db_one($conn, 'SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = ? LIMIT 1', 's', $UsernameDB);
      $vrienden2 = $r3 !== null ? dyves_decode($r3['Vrienden']) : [];

      if (!in_array($Username, $vrienden, true)) {
          $vrienden[] = $Username;
      }
      if (!in_array((string)($gebruikersnaam_ ?? ''), $vrienden2, true)) {
          $vrienden2[] = (string)($gebruikersnaam_ ?? '');
      }

      if (db_query($conn, 'UPDATE `allfriends` SET `Vrienden` = ? WHERE Gebruikersnaam = ?', 'ss', dyves_encode($vrienden), (string)$current)) {
          db_query($conn, 'UPDATE `allfriends` SET `Vrienden` = ? WHERE Gebruikersnaam = ?', 'ss', dyves_encode($vrienden2), $UsernameDB);
      }
      deleteInvite($conn, $Username, $from, (string)$current);
  }
?>

<div class="Meldingen">
  <?php
    foreach ($from as $i => $sender) {
        if ((string)$sender === '') {
            continue;
        }
        echo "<div class='Melding'>" .
               "<div class='vriendText blauw'>Je hebt een vriend invite van " . e($sender) . "</div>" .
               "<form method='post'>";
        csrf_field();
        echo     "<button type='submit' name='buttonac' value='" . e($i) . "' class='meldingButton accepteer'>Accepteer</button>" .
                 "<button type='submit' name='buttonneg' value='" . e($i) . "' class='meldingButton negeer'>Negeer</button>" .
               "</form>" .
             "</div>";
    }
  ?>
</div>
