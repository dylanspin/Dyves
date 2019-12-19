<?php
  session_start();
  include 'connect.php';
  include 'block.php';

  $voornaam  = mysql_real_escape_string(strip_tags($_POST['voornaam']));
  $achternaam = mysql_real_escape_string(strip_tags($_POST['achternaam']));
  $woonplaats = mysql_real_escape_string(strip_tags($_POST['woonplaats']));
  $geboortedatum = mysql_real_escape_string($_POST['geboortedatum']);
  $gebruiker = mysql_real_escape_string(strip_tags(trim($_POST['gebruikersnaam'])));
  $email = mysql_real_escape_string(strip_tags($_POST['email']));
  $gender = mysql_real_escape_string(strip_tags($_POST['gender']));
  $wachtwoord = mysql_real_escape_string(strip_tags($_POST['password1']));
  $wachtwoord2 = mysql_real_escape_string(strip_tags($_POST['password2']));
  $checkAR = [$voornaam,$achternaam,$woonplaats,$geboortedatum,$gebruiker,$email,$gender,$wachtwoord,$wachtwoord2];

  $goed = true;
  $reg1 = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/i";//wachtwoord check.
  $reg2 = "/^[^<,\"@/{}()*$%?=>:|;#]*$/i";//standaard check
  $reg3 = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";//email check
  $reg4 = "(script|php)";
  $fout = [0,0,0,0,0,0,0,0,0,0,0,0];

  if(isset($_POST['formSub'])){
      $ingevult = [$voornaam,$achternaam,$woonplaats,$geboortedatum,$gebruiker,$email];
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

      $checks = [$voornaam,$achternaam,$woonplaats];
      for($b=9; $b<=11; $b++){
        if(strlen($checks[$b-9]) <= 1){
          $fout[$b] = 1;
        }
      }
      for($i=0; $i<=count($checkAR)-1; $i++){//script check
        if(preg_match($reg4,$checkAR[$i])){
          $goed = false;
          $fout[0] = 1;
        }
      }
      if(!preg_match($reg3,$email)){//email check
          $goed = false;
          $fout[1] = 1;
      }
      if(preg_match($reg1,$wachtwoord) && preg_match($reg1,$wachtwoord2)){//wachtwoord check
          if(!$wachtwoord == $wachtwoord2){//double check wachtwoord
              $goed = false;
              $fout[2] = 1;
          }
      }
      else{//als de wachtwoord check fout was
          $goed = false;
          $fout[3] = 1;
      }
      if(!strtotime($geboortedatum) > 0){ //checkt als de hele geboortedatum is ingevult
          $goed = false;
          $fout[4] = 1;
      }
      if(strlen($gebruiker) > 30){//Gebruikersnaam checkt als de naam niet langer is dan 30 chars
          $goed = false;
          $fout[5] = 1;
      }
      if(strlen($gebruiker) <= 1){//checkt als er een gebruikersnaam is invult
          $goed = false;
          $fout[6] = 1;
      }
      if(strlen($vergelijk)>0){//checkt als de gebruikersnaam all bestaat
          $goed = false;
          $fout[7] = 1;
      }

      if(strlen($vergelijk2)>0){//checkt voor als de email all in gebruik is.
          $goed = false;
          $fout[8] = 1;
      }
      if($goed){
          $_SESSION['test'] = "Gelukt met een account aan maken.";
          $UNIC = check(randomId(20),$conn);
          $fout = [0,0,0,0,0,0,0,0,0,0,0,0];
          $ingevult = ["","","","","",""];
          $sql = "INSERT INTO `notusers` (`Gebruikersnaam`,`UNIQ`,`Wachtwoord`,`Email`,`Geboortedatum`,`ProfielFoto`,`Achtergrond`,`Permisie`,`Voornaam`,`Achternaam`,`Woonplaats`,`Man`) VALUES
          ('$gebruiker','$UNIC','$wachtwoord','$email','$geboortedatum','1','1','0','$voornaam','$achternaam','$woonplaats','$gender');";
          if ($conn->query($sql) === true) {
          }
          $sql = "INSERT INTO `over` (`Wie`) VALUES ('$gebruiker');";
          if ($conn->query($sql) === true) {
          }
          $sql = "INSERT INTO `agenda` (`Gebruikersnaam`) VALUES ('$UNIC');";
          if ($conn->query($sql) === true) {
          }
          $sql = "INSERT INTO `allfriends` (`Gebruikersnaam`) VALUES ('$UNIC');";
          if ($conn->query($sql) === true) {
          }
          $sql2 = "INSERT INTO `friend_invite` (`User`) VALUES ('$UNIC');";
          if ($conn->query($sql2) === true) {}
          $_SESSION['Waar'] = "hoofdmenu";
      }
      $goed = true;
      $_SESSION['fout'] = $fout;
      $_SESSION['sumbmited'] = $ingevult;
      reloadPost();
  }
  $sumbmited = $_SESSION['sumbmited'];
  $foutMelding = $_SESSION['fout'];
 ?>
