
<?php
  session_start();
  include 'block.php';
  include 'connect.php';
  $current = $_SESSION["nu"];

    $naamGo = $_POST['naamVriend'];
      $sql = "SELECT Private FROM `over` WHERE wie = '$naamGo';";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $privateCheck = $row['Private'];

          $sql = "SELECT user,Vriend FROM `vrienden` WHERE User = '$current' AND Vriend = '$naamGo' OR User = '$naamGo' AND Vriend = '$current' ;";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $checkUser = $row['user'];
              $checkVriend = $row['Vriend'];

              if($checkVriend == $current){
                $checkUser = $row['Vriend'];
                $checkVriend = $row['user'];
              }
            }
          }
          if($current == $naamGo){
            $_SESSION["bezoek"] = $naamGo;
          }
          if(strlen($checkVriend) > 0){
            $_SESSION["bezoek"] = $naamGo;
          }
          else{
            if (!$privateCheck) {
              $_SESSION["bezoek"] = $naamGo;
            }
          }
        }
      }


 ?>
