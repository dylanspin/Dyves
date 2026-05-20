<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/connect.php';

$bezoek = $_SESSION['bezoek'] ?? '';

$gebruikersnaam_ = '';
$email_          = '';
$geboortedatum_  = '';
$profielfoto_    = '';
$achtergrond_    = '';
$aanmeldtijd_    = '';
$woonplaats_     = '';
$voornaam_       = '';
$achternaam_     = '';
$gender_         = 0;
$aantalVrienden  = 0;
$per             = 0;
$font            = '';

$row = db_one(
    $conn,
    'SELECT Gebruikersnaam,Email,Geboortedatum,ProfielFoto,Achtergrond,Font,AanmeldTijd,Woonplaats,Voornaam,Achternaam,Man,AantalVrienden,Permisie FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1',
    's',
    (string)$bezoek
);
if ($row !== null) {
    $gebruikersnaam_ = $row['Gebruikersnaam'];
    $email_          = $row['Email'];
    $geboortedatum_  = $row['Geboortedatum'];
    $profielfoto_    = $row['ProfielFoto'];
    $achtergrond_    = $row['Achtergrond'];
    $aanmeldtijd_    = $row['AanmeldTijd'];
    $woonplaats_     = ucfirst((string)$row['Woonplaats']);
    $voornaam_       = ucfirst((string)$row['Voornaam']);
    $achternaam_     = $row['Achternaam'];
    $gender_         = $row['Man'];
    $aantalVrienden  = $row['AantalVrienden'];
    $per             = $row['Permisie'];
    $font            = $row['Font'];
}

if (strlen((string)$profielfoto_) <= 1) {
    $liveFoto = 'g' . $gender_ . '.jpg';
} else {
    $liveFoto = $gebruikersnaam_ . $profielfoto_;
}

function ageCalculator($geboortedatum_) {
    if (!empty($geboortedatum_)) {
        $birthdate = new DateTime($geboortedatum_);
        $today     = new DateTime('today');
        return $birthdate->diff($today)->y . ' Jaar';
    }
    return 0;
}
$leeftijd = ageCalculator($geboortedatum_);

$row = db_one(
    $conn,
    'SELECT Aantal,Baan,Opleiding,Muziek,Film,Sport,Private,FilmAan,MuziekAan,VriendenAan FROM `over` WHERE Wie = ? LIMIT 1',
    's',
    (string)$gebruikersnaam_
);
if ($row !== null) {
    $aantal_     = $row['Aantal'];
    $baan_       = $row['Baan'];
    $opleiding_  = $row['Opleiding'];
    $muziek_     = $row['Muziek'];
    $film_       = $row['Film'];
    $sport_      = $row['Sport'];
    $private_    = $row['Private'];
    $filmAan_    = $row['FilmAan'];
    $muziekAan_  = $row['MuziekAan'];
    $vrienAan_   = $row['VriendenAan'];
}
