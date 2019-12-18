<?php
  session_start();
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
  $wachtwoord2 = $_POST['password2'];
  // $_SESSION['test2'] = " ";
  $goed = true;
  $reg1 = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/i";//wachtwoord check.
  $reg2 = "/^[a-z ,.'-]+$/i";//standaard check
  $reg3 = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";//email check
  $reg4 = "(script|php)";

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

      for($i=0; $i<=5; $i++){

      }
      if(!preg_match($reg3,$email)){//email check
          $goed = false;
          $_SESSION['test2'] .= "Email niet Goed  ";
      }
      if(preg_match($reg1,$wachtwoord)){//wachtwoord check
          if(!$wachtwoord == $wachtwoord2){
              $goed = false;
              $_SESSION['test2'] .= "Wachtwoorden zijn niet het zelfde  ";
          }
      }
      else{
          $goed = false;
          $_SESSION['test2'] .= "Wachtwoord check was fout  ";
      }
      if(!strlen($geboortedatum) > 8){ //checkt als de hele geboortedatum is ingevult
          $goed = false;
          $_SESSION['test2'] .= "geboortedatum niet ingevult  ";
      }
      if(!strlen($gebruiker) > 30){//Gebruikersnaam checkt als de naam niet langer is dan 30 chars
          $goed = false;
          $_SESSION['test2'] .= "Gebruikersnaam telang  ";
      }
      if(strlen($gebruiker) <= 1){//checkt als er een gebruikersnaam is invult
          $goed = false;
          $_SESSION['test2'] .= "Gebruikersnaam niet ingevult  ";
      }
      if(strlen($vergelijk2)>0){
          $goed = false;
          $_SESSION['test2'] .= "Gebruikersnaam bestaat  ";
      }

      if(strlen($vergelijk)>0){
          $goed = false;
          $_SESSION['test2'] .= "Email bestaat  ";
      }

      if($goed){
          $goed = 0;
          $_SESSION['test'] = "Gelukt met het maken van een acount";
          // $_SESSION['Nieuwacc'] = "true";
          // $sql = "INSERT INTO `notusers` (`Gebruikersnaam`,`UNIQ`,`Wachtwoord`,`Email`,`Geboortedatum`,`ProfielFoto`,`Achtergrond`,`Permisie`,`Voornaam`,`Achternaam`,`Woonplaats`,`Man`) VALUES
          // ('$gebruiker','$randomid','$wachtwoord','$email','$geboortedatum','1','1','0','$voornaam','$achternaam','$woonplaats','$gender');";
          // if ($conn->query($sql) === true) {
          // }
          // $sql = "INSERT INTO `over` (`Wie`) VALUES ('$gebruiker');";
          // if ($conn->query($sql) === true) {
          // }
          // $sql = "INSERT INTO `agenda` (`Gebruikersnaam`) VALUES ('$gebruiker');";//moet nog de Niuew randomid worden.
          // if ($conn->query($sql) === true) {
          // }
          // $sql = "INSERT INTO `allfriends` (`Gebruikersnaam`) VALUES ('$gebruiker');";//moet nog de Niuew randomid worden.
          // if ($conn->query($sql) === true) {
          // }
          // $sql2 = "INSERT INTO `friend_invite` (`User`) VALUES ('$gebruiker');";//moet nog de Niuew randomid worden.
          // if ($conn->query($sql2) === true) {}
      }
      else{
        $_SESSION['test'] = "Het is mislukt met het maken van een acount";
      }
      $goed = true;
      reloadPost();
  }
 ?>
