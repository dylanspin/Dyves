<?php
  include 'connect.php';
  include 'block.php';

  $voornaam  = $_POST['voornaam'];
  $achternaam =  $_POST['achternaam'];
  $woonplaats =  $_POST['woonplaats'];
  $geboortedatum =  $_POST['geboortedatum'];
  $gebruiker =  $_POST['gebruikersnaam'];
  $email =  $_POST['email'];
  $gender = $_POST['gender'];
  $wachtwoord =  $_POST['password1'];
  $goed = 0;

  if(isset($_POST['formSub'])){
    $sql2 = "SELECT Gebruikersnaam FROM `notusers` WHERE Gebruikersnaam = '$gebruiker';";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $vergelijk = $row['Gebruikersnaam'];
      }
    }

    $sql = "SELECT Email FROM `notusers` WHERE Email = '$email';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $vergelijk2 = $row['Email'];
      }
    }

    if(strlen($vergelijk2)>0){ //checkt als de email all in de databse zit
      setcookie("email", "true", time() + (86400 * 30), "/");
    }
    else{
      $goed += 1;
      setcookie("email", "false", time() + (86400 * 30), "/");
    }

    if(strlen($vergelijk)>0){ //checkt als de gebruikers naam all in de databse zit
      setcookie("Gebruikers", "true", time() + (86400 * 30), "/");
    }
    else{
      $goed += 1;
      setcookie("Gebruikers", "false", time() + (86400 * 30), "/");
    }

    if($goed == 2){
      setcookie("aanmeld", "true");
      $goed = 0;
      $_SESSION['Nieuwacc'] = "true";
      $sql = "INSERT INTO `notusers` (`Gebruikersnaam`,`Wachtwoord`,`Email`,`Geboortedatum`,`ProfielFoto`,`Achtergrond`,`Permisie`,`Voornaam`,`Achternaam`,`Woonplaats`,`Man`) VALUES
      ('$gebruiker','$wachtwoord','$email','$geboortedatum','1','1','0','$voornaam','$achternaam','$woonplaats','$gender');";
      if ($conn->query($sql) === true) {
      }
      $sql = "INSERT INTO `over` (`Aantal`,`Opleiding`,`Baan`,`Muziek`,`Sport`,`Wie`,`Film`,`Private`,`FilmAan`,`MuziekAan`,`VriendenAan`) VALUES ('','','','','','$gebruiker','','0','0','0','1');";
      if ($conn->query($sql) === true) {
      }
      $sql = "INSERT INTO `agenda` (`Gebruikersnaam`,`Agenda`) VALUES ('$gebruiker','');";
      if ($conn->query($sql) === true) {
      }
    }
    $goed = 0;
    reloadPost();
  }
 ?>
