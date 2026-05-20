<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/block.php';

if (!isset($_POST['PostKrabel'])) {
    return;
}
csrf_check();

$text = isset($_POST['textarea']) ? trim((string)$_POST['textarea']) : '';
if ($text === '') {
    return;
}

if (($_SESSION['Waar'] ?? '') === 'bezoek') {
    $naar = (string)($_SESSION['bezoek'] ?? '');
    $row  = db_one($conn, 'SELECT Gebruikersnaam FROM `notusers` WHERE UNIQ = ? LIMIT 1', 's', (string)$current);
    $wieUP = $row['Gebruikersnaam'] ?? '';
} else {
    $wieUP = $gebruikersnaam_ ?? '';
    $naar  = $gebruikersnaam_ ?? '';
}

$last = db_one(
    $conn,
    'SELECT Text_ FROM `krabels` WHERE Gebruikersnaam = ? ORDER BY Toegevoegd DESC LIMIT 1',
    's',
    (string)$naar
);
if ($last !== null && (string)$last['Text_'] === $text) {
    return; // duplicate of last krabel from this user
}

db_query(
    $conn,
    'INSERT INTO `krabels` (`Gebruikersnaam`,`Postnaam`,`Text_`) VALUES (?, ?, ?)',
    'sss',
    (string)$wieUP, (string)$naar, $text
);

echo "<script>
        if (window.history.replaceState) {
          window.history.replaceState(null, null, window.location.href);
        }
      </script>";
