<?php
  include 'connect.php';
  //
  // $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
  //
  // if ($conn->connect_error) {
  //     die("Connection failed: " . $conn->connect_error);
  // }
  //
  // $stmt = $conn->prepare("INSERT INTO notusers (Gebruikersnaam, Wachtwoord, Email,Geboortedatum,Voornaam,Achternaam,woonplaats,Man) VALUES (?,?,?,?,?,?,?,?)");
  // $stmt->bind_param("ssssssss", $gebruikersnaam, $wachtwoord, $email,$geboortedatum,$voornaam,$achternaam,$woonplaats,$man);
  //
  // $gebruikersnaam =  "Dylanspin3";
  // $wachtwoord = "Dylan1!";
  // $email = "Dylanspin1@gmail.com";
  // $geboortedatum = "2002-07-09";
  // $voornaam = "Dylan";
  // $achternaam = "Spin";
  // $woonplaats = "Gieterveen";
  // $man = true;
  // $stmt->execute();
  //
  // $stmt->close();

  // $GebruikerU  = $_POST['Gebruikersnaam'];
  // $WoonplaatsU  = $_POST['Wooonplaats'];
  // $OpleidingU = $_POST['Opleiding'];
  // $BaanU = $_POST['Baan'];
  // $MuziekU = $_POST['Muziek'];
  // $FilmU = $_POST['Film'];
  // $SportU = $_POST['Sport'];
  
  $t1 = 0;

  $GebruikerU  = "";
  $WoonplaatsU  = "";
  $OpleidingU = "";
  $BaanU = "Schoonmaker";
  $MuziekU = "";
  $FilmU = "";
  $SportU = "";

  $current = $_COOKIE["nu"];;

  $updated = "";
  $updated2 = "";
  $updated .= "`Gebruikersnaam` = 'Dylan'";
  $updated .= "`Woonplaats` = 'gieterveen'";
  $updated .= "`Achtergrond` = 't2'";

  if (strlen($GebruikerU) > 0) {
  }

  if (strlen($WoonplaatsU) > 0) {
  }

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
  $t1 --;
  if(!$t1 >0){
    for($i=0; $i<=$t1-1; $i++){
      $updated2 .= $update[$i].",";
    }
    $updated2 .= $update[$t1];
  }

  if(!$t1 >0){
    // if (isset($_GET['update'])){
      $sql = "UPDATE `over` SET $updated2 WHERE Wie = '$current';";/*sql code */

      if ($conn->query($sql) === true) {
        echo "Updated";
      }
      else {
        echo "mislukt". $sql . "<br>" . $conn->error;
      }
    // }
  }

?>
