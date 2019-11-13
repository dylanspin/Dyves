
<?php
  include 'connect.php';

  $current = $_COOKIE["nu"];

  $sql = "SELECT Gebruikersnaam,Email,Geboortedatum,ProfielFoto,Achtergrond,AanmeldTijd,Woonplaats,Voornaam,Achternaam,Man,AantalVrienden FROM `notusers` WHERE Gebruikersnaam = '$current';";
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
    }
  }
  if($profielfoto_ >= 1){
    $liveFoto = $gender_;
  }
  else{
    $liveFoto = $profielfoto_;
  }

  function ageCalculator($geboortedatum_){
    if(!empty($geboortedatum_)){
        $birthdate = new DateTime($geboortedatum_);
        $today   = new DateTime('today');
        $ag = $birthdate->diff($today)->y;
        return "$ag Years";
    }
    else{
      return 0;
    }
  }
  $leeftijd =  ageCalculator($geboortedatum_);
 ?>
