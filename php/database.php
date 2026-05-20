<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/connect.php';

$voornaam      = isset($_POST['voornaam'])       ? trim(strip_tags((string)$_POST['voornaam']))       : '';
$achternaam    = isset($_POST['achternaam'])     ? trim(strip_tags((string)$_POST['achternaam']))     : '';
$woonplaats    = isset($_POST['woonplaats'])     ? trim(strip_tags((string)$_POST['woonplaats']))     : '';
$geboortedatum = isset($_POST['geboortedatum'])  ? trim((string)$_POST['geboortedatum'])              : '';
$gebruiker     = isset($_POST['gebruikersnaam']) ? trim(strip_tags((string)$_POST['gebruikersnaam'])) : '';
$email         = isset($_POST['email'])          ? trim(strip_tags((string)$_POST['email']))          : '';
$gender        = isset($_POST['gender'])         ? (string)$_POST['gender']                          : '';
$wachtwoord    = isset($_POST['password1'])      ? (string)$_POST['password1']                       : '';
$wachtwoord2   = isset($_POST['password2'])      ? (string)$_POST['password2']                       : '';

$checkAR = [$voornaam, $achternaam, $woonplaats, $geboortedatum, $gebruiker, $email, $gender, $wachtwoord, $wachtwoord2];

$goed = true;
$reg1 = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/i";
$reg3 = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";
$reg4 = "(script|php)";
$fout = [0,0,0,0,0,0,0,0,0,0,0,0];

if (isset($_POST['formSub'])) {
    csrf_check();
    $ingevult = [$voornaam, $achternaam, $woonplaats, $geboortedatum, $gebruiker, $email];

    $existingUser  = db_one($conn, 'SELECT Gebruikersnaam FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', $gebruiker);
    $existingEmail = db_one($conn, 'SELECT Email FROM `notusers` WHERE Email = ? LIMIT 1', 's', $email);

    $checks = [$voornaam, $achternaam, $woonplaats];
    for ($b = 9; $b <= 11; $b++) {
        if (strlen($checks[$b - 9]) <= 1) {
            $fout[$b] = 1;
        }
    }
    foreach ($checkAR as $val) {
        if (preg_match($reg4, $val)) {
            $goed = false;
            $fout[0] = 1;
        }
    }
    if (!preg_match($reg3, $email)) {
        $goed = false;
        $fout[1] = 1;
    }
    if (preg_match($reg1, $wachtwoord) && preg_match($reg1, $wachtwoord2)) {
        if ($wachtwoord !== $wachtwoord2) {
            $goed = false;
            $fout[2] = 1;
        }
    } else {
        $goed = false;
        $fout[3] = 1;
    }
    if (strtotime($geboortedatum) === false || strtotime($geboortedatum) <= 0) {
        $goed = false;
        $fout[4] = 1;
    }
    if (strlen($gebruiker) > 30) {
        $goed = false;
        $fout[5] = 1;
    }
    if (strlen($gebruiker) <= 1) {
        $goed = false;
        $fout[6] = 1;
    }
    if ($existingUser !== null) {
        $goed = false;
        $fout[7] = 1;
    }
    if ($existingEmail !== null) {
        $goed = false;
        $fout[8] = 1;
    }

    if ($goed) {
        $_SESSION['test'] = 'Gelukt met een account aan maken.';
        $UNIC = check(randomId(20), $conn);
        $fout = [0,0,0,0,0,0,0,0,0,0,0,0];
        $ingevult = ['', '', '', '', '', ''];

        $hashed = password_hash($wachtwoord, PASSWORD_DEFAULT);

        db_query(
            $conn,
            "INSERT INTO `notusers` (`Gebruikersnaam`,`UNIQ`,`Wachtwoord`,`Email`,`Geboortedatum`,`ProfielFoto`,`Achtergrond`,`Permisie`,`Voornaam`,`Achternaam`,`Woonplaats`,`Man`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",
            'ssssssssssss',
            $gebruiker, $UNIC, $hashed, $email, $geboortedatum, '1', '1', '0', $voornaam, $achternaam, $woonplaats, $gender
        );
        db_query($conn, 'INSERT INTO `over` (`Wie`) VALUES (?)',                's', $gebruiker);
        db_query($conn, 'INSERT INTO `agenda` (`Gebruikersnaam`) VALUES (?)',   's', $UNIC);
        db_query($conn, 'INSERT INTO `allfriends` (`Gebruikersnaam`) VALUES (?)','s', $UNIC);
        db_query($conn, 'INSERT INTO `friend_invite` (`User`) VALUES (?)',      's', $UNIC);
        $_SESSION['Waar'] = 'hoofdmenu';
    }
    $_SESSION['fout'] = $fout;
    $_SESSION['sumbmited'] = $ingevult;
    if (function_exists('reloadPost')) {
        reloadPost();
    }
}

$sumbmited   = $_SESSION['sumbmited'] ?? ['', '', '', '', '', ''];
$foutMelding = $_SESSION['fout']      ?? [0,0,0,0,0,0,0,0,0,0,0,0];
