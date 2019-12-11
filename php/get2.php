
<?php
  session_start();
  include 'connect.php';
  include 'block.php';

  $bezoek = $_SESSION["bezoek"];

  $sql = "SELECT Gebruikersnaam,Email,Geboortedatum,ProfielFoto,Achtergrond,AanmeldTijd,Woonplaats,Voornaam,Achternaam,Man,AantalVrienden FROM `notusers` WHERE Gebruikersnaam = '$bezoek';";
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


  $sql2 = "SELECT Aantal,Baan,Opleiding,Muziek,Film,Sport,Private,FilmAan,MuziekAan,VriendenAan FROM `over` WHERE Wie = '$gebruikersnaam_';";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
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

 ?>
