
<?php
  session_start();
  include 'connect.php';
  // include 'block.php';
  error_reporting(0);
  $current = $_SESSION["nu"];

  $sql = "SELECT Gebruikersnaam,Email,Geboortedatum,ProfielFoto,Achtergrond,AanmeldTijd,Woonplaats,Voornaam,Achternaam,Man,AantalVrienden,Permisie,Voted FROM `notusers` WHERE Gebruikersnaam = '$current';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $gebruikersnaam_ = $row['Gebruikersnaam'];
      $email_ = $row['Email'];
      $geboortedatum_ = $row['Geboortedatum'];
      $profielfoto_ = $row['ProfielFoto'];
      $achtergrond_ = $row['Achtergrond'];
      $aanmeldtijd_ = $row['AanmeldTijd'];
      $woonplaats_ = ucfirst($row['Woonplaats']);
      $voornaam_ = ucfirst($row['Voornaam']);
      $achternaam_ = $row['Achternaam'];
      $gender_ = $row['Man'];
      $aantalVrienden = $row['AantalVrienden'];
      $per = $row['Permisie'];
      $voted = $row['Voted'];
    }
  }
  if(strlen($profielfoto_) <= 1){
    $liveFoto = "g".$gender_.".jpg";
  }
  else{
    $liveFoto = $gebruikersnaam_.$profielfoto_;
  }

  function ageCalculator($geboortedatum_){
    if(!empty($geboortedatum_)){
        $birthdate = new DateTime($geboortedatum_);
        $today   = new DateTime('today');
        $ag = $birthdate->diff($today)->y;
        return "$ag Jaar";
    }
    else{
      return 0;
    }
  }
  $leeftijd =  ageCalculator($geboortedatum_);

  $sql = "SELECT Aantal,Baan,Opleiding,Muziek,Film,Sport,Private,FilmAan,MuziekAan,VriendenAan FROM `over` WHERE Wie = '$gebruikersnaam_';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $aantal_ = $row['Aantal'];
      $baan_ = $row['Baan'];
      $opleiding_ = $row['Opleiding'];
      $muziek_ = $row['Muziek'];
      $film_ = $row['Film'];
      $sport_ = $row['Sport'];
      $private_ = $row['Private'];
      $filmAan_ = $row['FilmAan'];
      $muziekAan_ = $row['MuziekAan'];
      $vrienAan_ = $row['VriendenAan'];
    }
  }
  $plus = 0;
  $sql = "SELECT Artikel,Text_,Img,Label,Status,Datum,Id FROM `artikels`;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $artikel[$plus] = $row['Artikel'];
      $textArtikel[$plus] = $row['Text_'];
      $imgArtikel[$plus] = $row['Img'];
      $labelArtikel[$plus] = $row['Label'];
      $statusArtikel[$plus] = $row['Status'];
      $datumArtikel[$plus] = $row['Datum'];
      $idArtikel[$plus] = $row['Id'];
      $plus ++;
    }
  }

  $sql = "SELECT Naam,Status,Vragen,Antwoorden,Id FROM `poll` Where id='1';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $vraagPoll = $row['Naam'];
      $statusPoll = $row['Status'];
      $VragenPoll = unserialize($row['Vragen']);
      $AntwoordenPoll = $row['Antwoorden'];
      $idPoll = $row['Id'];
    }
  }

  $sql = "SELECT Gebruikersnaam,Postnaam,Text_,Img,Kleur,Toegevoegd FROM `krabels` WHERE Gebruikersnaam = '$current';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $Krabelnaam_ = $row['Gebruikersnaam'];
      $Postnaam = $row['Postnaam'];
      $Text_ = $row['Text_'];
      $kleurText = $row['Kleur'];
      $toegevoegd = $row['Toegevoegd'];
    }
  }

  $checkMelding = false;
  $sql = "SELECT User FROM `friend_invite` WHERE To_user = '$current';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $checkMelding = true;
    }
  }
  if($checkMelding){
      echo "<style media='screen'>
              .melding_{
                color:#C9302C;
              }
              .meldingIcon{
                display:inline-block;
              }
            </style>";
  }
 ?>
