<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/connect.php';

$button = $_POST['inlog_button'] ?? null;
if (!isset($button)) {
    return;
}
csrf_check();

$username = isset($_POST['gebruiker'])   ? (string)$_POST['gebruiker']   : '';
$password = isset($_POST['wachtwoord']) ? (string)$_POST['wachtwoord'] : '';

function updateIp(string $user, mysqli $conn): void {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    db_query($conn, 'UPDATE `notusers` SET `Ip` = ? WHERE Gebruikersnaam = ?', 'ss', $ip, $user);
}

$row = db_one(
    $conn,
    'SELECT Gebruikersnaam, Wachtwoord, UNIQ FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1',
    's',
    $username
);

$ok = false;
if ($row !== null) {
    $stored = (string)$row['Wachtwoord'];
    // Only password_verify is supported. Plaintext rows must be migrated by
    // an external script before users can log in again.
    if ($stored !== '' && password_verify($password, $stored)) {
        $ok = true;
    }
}

if ($ok) {
    session_regenerate_id(true);
    $_SESSION['wachtwoordCheck'] = 'true';
    $_SESSION['nu']              = $row['UNIQ'];
    $_SESSION['Waar']            = 'profiel';
    updateIp($username, $conn);
} else {
    $_SESSION['wachtwoordCheck'] = 'false';
}

if (function_exists('reloadPost')) {
    reloadPost();
}
