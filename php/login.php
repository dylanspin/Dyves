<?php

  include 'connect.php';

  error_reporting(0);

  $username = $_POST['gebruiker'];  //krijgt de gebruikers naam input
  $password = $_POST['wachtwoord']; //Krijgt de wachtwoord input
  $button = $_POST['inlog_button']; //krijgt de button

  $true = 0; //een tel voor het kijken of

 if(isset($button)){
    $sql = "SELECT Gebruikersnaam,Wachtwoord FROM `notusers` WHERE Gebruikersnaam = '$username';";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($password == $row['Wachtwoord']){
          $true ++;
        }
        if($username == $row['Gebruikersnaam']){
          $true ++;
        }
        if($true == 2){
          setcookie("wachtwoordCheck", "true", time() + (86400 * 30), "/");
          setcookie("nu",$username , time() + (86400 * 30), "/");
          header ('location:profiel.php');
          echo "<script>console.log('gelukt')</script>";
          // header("Location:profiel.php");
        }
        else{
          setcookie("wachtwoordCheck", "false", time() + (86400 * 30), "/");
          echo "<script>console.log('mislukt')</script>";
          echo "<div class='fout text2'>Mislukt met inloggen</div>";
          header('Location: '.$_SERVER['PHP_SELF']);
          die;
        }
    }
  }
  else {
    setcookie("wachtwoordCheck", "false", time() + (86400 * 30), "/");
    echo "<div class='fout text2'>Mislukt met inloggen</div>";
    header('Location: '.$_SERVER['PHP_SELF']);
    die;
  }
}

 ?>
