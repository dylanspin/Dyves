<?php
  include 'connect.php';

  error_reporting(0);

  $t1 = 0;

  $GebruikerU  = $_POST['Gebruikersnaam'];
  $WoonplaatsU  = $_POST['Wooonplaats'];
  $Voornaam  = $_POST['Voornaam'];
  $achternaam  = $_POST['Achternaam'];
  $OpleidingU = $_POST['Opleiding'];
  $BaanU = $_POST['Baan'];
  $FilmU = $_POST['Film'];
  $SportU = $_POST['Sport'];
  $MuziekU = $_POST['MuziekU'];
  $Private = $_POST['Aanprive'];
  $VriendenAan = $_POST['AanVrienden'];
  $MuziekAan = $_POST['AanMuziek'];
  $FilmAan = $_POST['AanFilms'];
  $Muziek = $_POST['Muziek'];
  $Film = $_POST['Film'];

  $current = $_COOKIE["nu"];

  $updated = "";
  $updated2 = "";

  // $updated .= "`Gebruikersnaam` = 'Dylan'";
  // $updated .= "`Woonplaats` = 'gieterveen'";
  // $updated .= "`Achtergrond` = 't2'";

  // if (strlen($GebruikerU) > 0) {
  // }
  //
  // if (strlen($WoonplaatsU) > 0) {
  // }

  if (strlen($OpleidingU) > 0) {
    $update[$t1] = "`Opleiding` = '$OpleidingU'";
    $t1 ++;
  }

  if (strlen($BaanU) > 0) {
    $update[$t1] = "`Baan` = '$BaanU'";
    $t1 ++;
  }

  if (strlen($MuziekU) > 0) {
    $update[$t1] = "`Muziek` = '$MuziekU'";
    $t1 ++;
  }

  if (strlen($SportU) > 0) {
    $update[$t1] = "`Sport` = '$SportU'";
    $t1 ++;
  }
  if (!$Private == $private_) {
    $update[$t1] = "`Private` = '$Private'";
    $t1 ++;
  }
  if (!$VriendenAan ==  $vrienAan_) {
    $update[$t1] = "`VriendenAan` = '$VriendenAan'";
    $t1 ++;
  }
  if (!$FilmAan ==  $filmAan_) {
    $update[$t1] = "`FilmAan` = '$FilmAan'";
    $t1 ++;
  }
  if (!$MuziekAan == $muziekAan_) {
    $update[$t1] = "`MuziekAan` = '$MuziekAan'";
    $t1 ++;
  }

  $t1 --;
  if($t1 >0){
    for($i=0; $i<=$t1-1; $i++){
      $updated2 .= $update[$i].",";
    }
    $updated2 .= $update[$t1];
  }
  else if($t1 == 0){
    $updated2 .= $update[$t1];
  }


  if($t1 >= 0){
    if (isset($_POST['update'])){
      $sql = "UPDATE `over` SET $updated2 WHERE Wie = '$current';";/*sql code */
      if ($conn->query($sql) === true) {
        header("Refresh:0");
        echo "Updated";
      }
      else {
        echo "mislukt". $sql . "<br>" . $conn->error;
      }
    }
  }

 ?>
