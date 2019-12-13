<?php
      session_start();
      include 'connect.php';
      include 'block.php';

      $username = $_POST['gebruiker'];  //krijgt de gebruikers naam input
      $password = $_POST['wachtwoord']; //Krijgt de wachtwoord input
      $button = $_POST['inlog_button']; //krijgt de button
      $true = 0; //een tel voor het kijken of

      function updateIp($user,$conn){
          if(!empty($_SERVER['HTTP_CLIENT_IP'])){
              $ip = $_SERVER['HTTP_CLIENT_IP'];
          }
          elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
          }
          else{
              $ip = $_SERVER['REMOTE_ADDR'];
          }
          $sql = "UPDATE `notusers` SET `Ip` = '$ip' WHERE Gebruikersnaam = '$user';";
          if ($conn->query($sql) === true) {
          }
      }

     if(isset($button)){
        $sql = "SELECT Gebruikersnaam,Wachtwoord,UNIQ FROM `notusers` WHERE Gebruikersnaam = '$username';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $unicID = $row['UNIQ'];
                if($password == $row['Wachtwoord']){
                  $true ++;
                }
                if($username == $row['Gebruikersnaam']){
                  $true ++;
                }
                if($true == 2){
                  $_SESSION["wachtwoordCheck"] = "true";
                  $_SESSION["nu"] = $unicID;
                  echo "<script>console.log('gelukt')</script>";
                  updateIp($username,$conn);
                }
                else{
                  $_SESSION["wachtwoordCheck"] = "false";
                  echo "<script>console.log('mislukt')</script>";
                  reloadPost();
               }
            }
        }
        else {
            $_SESSION["wachtwoordCheck"] = "false";
            reloadPost();
        }
        reloadPost();
    }
 ?>
