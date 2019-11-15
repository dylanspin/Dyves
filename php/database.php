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

    $sql3 = "SELECT Email FROM `notusers` WHERE Email = '$email';";
    $result2 = $conn->query($sql3);
    if ($result2->num_rows > 0) {
      while($row = $result2->fetch_assoc()) {
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
      echo "<script>window.allert('$goed')</script>";
      setcookie("aanmeld", "true");
      $goed = 0;
      //Prepared statement voor de "NOTusers" tabel moet nog werkt niet voor een of andere reden
      $sql = "INSERT INTO `notusers` (`Gebruikersnaam`,`Wachtwoord`,`Email`,`Geboortedatum`,`ProfielFoto`,`Achtergrond`,`Permisie`,`Voornaam`,`Achternaam`,`Woonplaats`,`Man`) VALUES
      ('".$gebruiker."','".$wachtwoord."','".$email."','".$geboortedatum."','1','1','0','".$voornaam."','".$achternaam."','".$woonplaats."','".$gender."');";

      if ($conn->query($sql) === true) {
      }
    }
    $goed = 0;
    header('Location: '.$_SERVER['PHP_SELF']);
    die;

  }
 ?>
