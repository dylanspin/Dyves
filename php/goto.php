<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/block.php';

if (!isset($_POST['bezoek'])) {
    return;
}
csrf_check();

$num = $_POST['bezoek'];
if (!is_numeric($num) || (int)$num < 0) {
    return;
}
$num = (int)$num;

if (empty($_SESSION['bezoek'])) {
    $currentt = $current;
} else {
    $row = db_one($conn, 'SELECT UNIQ FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', (string)$_SESSION['bezoek']);
    if ($row === null) {
        return;
    }
    $currentt = $row['UNIQ'];
}

$row    = db_one($conn, 'SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = ? LIMIT 1', 's', (string)$currentt);
$naamGo = $row !== null ? dyves_decode($row['Vrienden']) : [];

if (!isset($naamGo[$num])) {
    return;
}
$naamGo = (string)$naamGo[$num];
if ($naamGo === '') {
    return;
}

$row = db_one($conn, 'SELECT Private FROM `over` WHERE Wie = ? LIMIT 1', 's', $naamGo);
$privateCheck = $row !== null ? (int)$row['Private'] : 0;

$row = db_one($conn, 'SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = ? LIMIT 1', 's', (string)$current);
$checkvrienden = $row !== null ? dyves_decode($row['Vrienden']) : [];

$vriendcheck = in_array($naamGo, $checkvrienden, true);

if ($vriendcheck || !$privateCheck) {
    $_SESSION['bezoek'] = $naamGo;
}

if (function_exists('reloadPost')) {
    reloadPost();
}
