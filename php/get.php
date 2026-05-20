<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/connect.php';

if (!isset($current)) {
    $current = $_SESSION['nu'] ?? '';
}

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
$voted           = '';
$font            = '';
$artikel = $textArtikel = $imgArtikel = $labelArtikel = [];
$statusArtikel = $datumArtikel = $idArtikel = [];
$Labelartikel = $LabeltextArtikel = $LabelimgArtikel = [];
$LabelstatusArtikel = $LabeldatumArtikel = $LabelidArtikel = [];

$row = db_one(
    $conn,
    'SELECT Gebruikersnaam,Email,Geboortedatum,ProfielFoto,Achtergrond,Font,AanmeldTijd,Woonplaats,Voornaam,Achternaam,Man,AantalVrienden,Permisie,Voted FROM `notusers` WHERE UNIQ = ? LIMIT 1',
    's',
    (string)$current
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
    $voted           = $row['Voted'];
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
    $aantal_      = $row['Aantal'];
    $baan_        = $row['Baan'];
    $opleiding_   = $row['Opleiding'];
    $muziek_      = $row['Muziek'];
    $film_        = $row['Film'];
    $sport_       = $row['Sport'];
    $private_     = $row['Private'];
    $filmAan_     = $row['FilmAan'];
    $muziekAan_   = $row['MuziekAan'];
    $vrienAan_    = $row['VriendenAan'];
}

$plus = 0;
foreach (db_all($conn, 'SELECT Artikel,Text_,Img,Label,Status,Datum,Id FROM `artikels`') as $row) {
    $artikel[$plus]       = $row['Artikel'];
    $textArtikel[$plus]   = $row['Text_'];
    $imgArtikel[$plus]    = $row['Img'];
    $labelArtikel[$plus]  = $row['Label'];
    $statusArtikel[$plus] = $row['Status'];
    $datumArtikel[$plus]  = $row['Datum'];
    $idArtikel[$plus]     = $row['Id'];
    $plus++;
}

$row = db_one($conn, "SELECT Naam,Status,Vragen,Antwoorden,Id FROM `poll` WHERE id='1' LIMIT 1");
if ($row !== null) {
    $vraagPoll       = $row['Naam'];
    $statusPoll      = $row['Status'];
    $VragenPoll      = dyves_decode($row['Vragen']);
    $AntwoordenPoll  = $row['Antwoorden'];
    $idPoll          = $row['Id'];
}

$row = db_one(
    $conn,
    'SELECT Gebruikersnaam,Postnaam,Text_,Img,Kleur,Toegevoegd FROM `krabels` WHERE Gebruikersnaam = ? LIMIT 1',
    's',
    (string)$gebruikersnaam_
);
if ($row !== null) {
    $Krabelnaam_ = $row['Gebruikersnaam'];
    $Postnaam    = $row['Postnaam'];
    $Text_       = $row['Text_'];
    $kleurText   = $row['Kleur'];
    $toegevoegd  = $row['Toegevoegd'];
}

$checkMelding = false;
$row = db_one(
    $conn,
    'SELECT To_user FROM `friend_invite` WHERE User = ? LIMIT 1',
    's',
    (string)$current
);
if ($row !== null) {
    $checkmelding = dyves_decode($row['To_user']);
    if (isset($checkmelding[0]) && strlen((string)$checkmelding[0]) > 0) {
        echo "<style media='screen'>
                .melding_{ color:#C9302C; }
                .meldingIcon{ display:inline-block; }
              </style>";
    }
}

$label = $_SESSION['label'] ?? 'nieuws';
$plus2 = 0;
if ($label === 'nieuws') {
    $rows = db_all($conn, 'SELECT Artikel,Text_,Img,Status,Datum,Id FROM `artikels`');
} else {
    $rows = db_all($conn, 'SELECT Artikel,Text_,Img,Status,Datum,Id FROM `artikels` WHERE Label = ?', 's', (string)$label);
}
foreach ($rows as $row) {
    $Labelartikel[$plus2]       = $row['Artikel'];
    $LabeltextArtikel[$plus2]   = $row['Text_'];
    $LabelimgArtikel[$plus2]    = $row['Img'];
    $LabelstatusArtikel[$plus2] = $row['Status'];
    $LabeldatumArtikel[$plus2]  = $row['Datum'];
    $LabelidArtikel[$plus2]     = $row['Id'];
    $plus2++;
}
$_SESSION['aantall'] = $plus2 - 1;
