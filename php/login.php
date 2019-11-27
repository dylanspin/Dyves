<?php
  session_start();
  include 'connect.php';
  include 'block.php';
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
          $_SESSION["wachtwoordCheck"] = "true";
          $_SESSION["nu"] = $username;
          echo "<script>console.log('gelukt')</script>";
          // header("Location:profiel.php");
        }
        else{
          $_SESSION["wachtwoordCheck"] = "false";
          // setcookie("wachtwoordCheck", "false", time() + (86400 * 30), "/");
          echo "<script>console.log('mislukt')</script>";
          header('Location: '.$_SERVER['PHP_SELF']);
          die;
        }
    }
  }
  else {
    $_SESSION["wachtwoordCheck"] = "false";
    // setcookie("wachtwoordCheck", "false", time() + (86400 * 30), "/");
    header('Location: '.$_SERVER['PHP_SELF']);
    die;
  }
}
 ?>
