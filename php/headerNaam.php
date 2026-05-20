<?php
require_once __DIR__ . '/bootstrap.php';

$nuOn = (string)($_SESSION['nu'] ?? '');
$gebruikersnaam2_ = '';
$profielfoto2_    = '';
$gender2_         = 0;

if ($nuOn !== '') {
    $row = db_one($conn, 'SELECT Gebruikersnaam, ProfielFoto, Man FROM `notusers` WHERE UNIQ = ? LIMIT 1', 's', $nuOn);
    if ($row !== null) {
        $gebruikersnaam2_ = $row['Gebruikersnaam'];
        $profielfoto2_    = $row['ProfielFoto'];
        $gender2_         = $row['Man'];
    }
}

if (empty((string)$profielfoto2_) || strlen((string)$profielfoto2_) <= 1) {
    $liveFoto2 = 'g' . $gender2_ . '.jpg';
} else {
    $liveFoto2 = (string)$profielfoto2_;
}
