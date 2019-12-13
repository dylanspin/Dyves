
<?php
  session_start();
  include 'block.php';
  include 'connect.php';

      if(isset($_POST['bezoek'])){

          if(strlen($_SESSION["bezoek"]) == 0){
              $currentt = $current;
          }
          else{
              $wie = $_SESSION["bezoek"];
              $sql = "SELECT UNIQ FROM `notusers` Where Gebruikersnaam = '$wie';";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      $currentt = $row['UNIQ'];
                  }
              }
          }
          
          $sql = "SELECT Vrienden FROM `allfriends` Where Gebruikersnaam = '$currentt';";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $naamGo = unserialize($row['Vrienden']);
              }
          }

          $num = $_POST['bezoek'];
          $naamGo = $naamGo[$num];

          $sql = "SELECT Private FROM `over` WHERE wie = '$naamGo';";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $privateCheck = $row['Private'];
              }
          }

          $sql = "SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = '$current';";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $checkvrienden = unserialize($row['Vrienden']);
              }
          }

          for($i=0; $i<=count($checkvrienden); $i++){
            if($checkvrienden[$i] == $naamGo){
              $vriendcheck = true;
            }
          }

          if($vriendcheck){
              $_SESSION["bezoek"] = $naamGo;
          }
          else{
            if(!$privateCheck){
                $_SESSION["bezoek"] = $naamGo;
            }
          }

          reloadPost();
      }

 ?>
