<?php
  include 'connect.php';
  include 'block.php';
  error_reporting(0);

  $t1 = 0;
  $t2 = 0;
  $GebruikerU  = $_POST['Gebruikersnaam'];
  $WoonplaatsU  = $_POST['Wooonplaats'];
  $Voornaam  = $_POST['Voornaam'];
  $achternaam  = $_POST['Achternaam'];
  $OpleidingU = $_POST['Opleiding'];
  $BaanU = $_POST['Baan'];
  $FilmU = $_POST['FilmU'];
  $SportU = $_POST['Sport'];
  $MuziekU = $_POST['MuziekU'];
  $Private = $_POST['Aanprive'];
  $VriendenAan = $_POST['AanVrienden'];
  $MuziekAan = $_POST['AanMuziek'];
  $FilmAan = $_POST['AanFilms'];
  $Muziek = $_POST['Muziek'];
  $inputVal = $_POST['Hidden'];
  $profielfoto = $_FILES["fileToUpload"]["name"];

  $current = $_COOKIE["nu"];

  $updated = "";
  $updated2 = "";

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
  if (strlen($FilmU) > 0) {
    $update[$t1] = "`Film` = '$FilmU'";
    $t1 ++;
  }

  if (strlen($SportU) > 0) {
    $update[$t1] = "`Sport` = '$SportU'";
    $t1 ++;
  }
  if(strlen($profielfoto) > 0){
    $update2[$t2] = "`ProfielFoto` = '$profielfoto'";
    unlink("pic/profilepics/".$gebruikersnaam_.$profielfoto_);
    $t2 ++;
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
  if ($inputVal != $achtergrond_) {
    if($inputVal != ""){
      $update2[$t2] = "`Achtergrond` = '$inputVal'";
      $t2 ++;
    }
  }

  $t1 --;
  $t2 --;
  if($t1 >0){
    for($i=0; $i<=$t1-1; $i++){
      $updated2 .= $update[$i].",";
    }
    $updated2 .= $update[$t1];
  }
  else if($t1 == 0){
    $updated2 .= $update[$t1];
  }
  if($t2 >0){
    for($i=0; $i<=$t2-1; $i++){
      $updated .= $update2[$i].",";
    }
    $updated .= $update2[$t2];
  }
  else if($t2 == 0){
    $updated .= $update2[$t2];
  }

  if (isset($_POST['update'])){
    if($t1 >= 0){
      $sql = "UPDATE `over` SET $updated2 WHERE Wie = '$current';";
      if ($conn->query($sql) === true) {
        echo "Updated";
      }
      else {
        echo "mislukt". $sql . "<br>" . $conn->error;
      }
    }

    if($t2 >= 0){
      echo "test";
      $sql2 = "UPDATE `notusers` SET $updated WHERE Gebruikersnaam = '$current';";
      if ($conn->query($sql2) === true) {
        echo "Updated";
        rename("pic/profilepics/$profielfoto","pic/profilepics/$gebruikersnaam_$profielfoto");
      }
      else {
        echo "mislukt". $sql2 . "<br>" . $conn->error;
      }
    }
    header("Refresh:0");
  }

 ?>
