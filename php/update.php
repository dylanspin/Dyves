<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/connect.php';

if (!isset($_POST['update'])) {
    return;
}

$current = $_SESSION['nu'] ?? '';
if ($current === '' || ($_SESSION['wachtwoordCheck'] ?? '') !== 'true') {
    http_response_code(403);
    return;
}
csrf_check();

$OpleidingU   = (string)($_POST['Opleiding']   ?? '');
$BaanU        = (string)($_POST['Baan']        ?? '');
$FilmU        = (string)($_POST['FilmU']       ?? '');
$SportU       = (string)($_POST['Sport']       ?? '');
$MuziekU      = (string)($_POST['MuziekU']     ?? '');
$Private      = (string)($_POST['Aanprive']    ?? '');
$VriendenAan  = (string)($_POST['AanVrienden'] ?? '');
$MuziekAan    = (string)($_POST['AanMuziek']   ?? '');
$FilmAan      = (string)($_POST['AanFilms']    ?? '');
$inputVal     = (string)($_POST['Hidden']      ?? '');
$pstFont      = (string)($_POST['font']        ?? '');

// Whitelisted column => value pairs to update.
$overSet = [];
if (strlen($OpleidingU) > 0)                                       { $overSet['Opleiding']   = $OpleidingU; }
if (strlen($BaanU) > 0)                                            { $overSet['Baan']        = $BaanU; }
if (strlen($MuziekU) > 0)                                          { $overSet['Muziek']      = $MuziekU; }
if (strlen($FilmU) > 0)                                            { $overSet['Film']        = $FilmU; }
if (strlen($SportU) > 0)                                           { $overSet['Sport']       = $SportU; }
if ($Private !== '' && (string)($private_   ?? '') !== $Private)   { $overSet['Private']     = $Private; }
if ($VriendenAan !== '' && (string)($vrienAan_ ?? '') !== $VriendenAan) { $overSet['VriendenAan'] = $VriendenAan; }
if ($FilmAan   !== '' && (string)($filmAan_   ?? '') !== $FilmAan) { $overSet['FilmAan']     = $FilmAan; }
if ($MuziekAan !== '' && (string)($muziekAan_ ?? '') !== $MuziekAan) { $overSet['MuziekAan']  = $MuziekAan; }

$userSet = [];
if ($pstFont !== '' && (string)($font ?? '') !== $pstFont) { $userSet['Font']        = $pstFont; }
if ($inputVal !== '' && $inputVal !== (string)($achtergrond_ ?? '')) { $userSet['Achtergrond'] = $inputVal; }

// Profile picture upload: server generates the filename; client name is
// discarded. Old picture (if any) is deleted via a safe-unlink helper.
$newProfielFoto = dyves_upload_image('fileToUpload', __DIR__ . '/../pic/profilepics');
if ($newProfielFoto !== null) {
    $userSet['ProfielFoto'] = $newProfielFoto;
    if (!empty($profielfoto_)) {
        dyves_safe_unlink(__DIR__ . '/../pic/profilepics', (string)$profielfoto_);
    }
}

// Album upload: same approach. The DB column stores a JSON array of
// server-generated filenames going forward.
$newFotoName = dyves_upload_image('fotoToUpload', __DIR__ . '/../pic/fotos');
if ($newFotoName !== null) {
    $row = db_one($conn, 'SELECT Fotos FROM `notusers` WHERE UNIQ = ? LIMIT 1', 's', (string)$current);
    $album = $row !== null ? dyves_decode($row['Fotos']) : [];
    $album[] = $newFotoName;
    $userSet['Fotos'] = dyves_encode($album);
}

if (!empty($overSet)) {
    $cols   = array_keys($overSet);
    $assign = implode(', ', array_map(fn($c) => "`$c` = ?", $cols));
    $sql    = "UPDATE `over` SET $assign WHERE Wie = ?";
    $params = array_values($overSet);
    $params[] = (string)($gebruikersnaam_ ?? '');
    $types  = str_repeat('s', count($params));
    db_query($conn, $sql, $types, ...$params);
}

if (!empty($userSet)) {
    $cols   = array_keys($userSet);
    $assign = implode(', ', array_map(fn($c) => "`$c` = ?", $cols));
    $sql    = "UPDATE `notusers` SET $assign WHERE UNIQ = ?";
    $params = array_values($userSet);
    $params[] = (string)$current;
    $types  = str_repeat('s', count($params));
    db_query($conn, $sql, $types, ...$params);
}

if (function_exists('reloadPost')) {
    reloadPost();
}
