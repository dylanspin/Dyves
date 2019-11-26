
<?php
  session_start();
  include 'block.php';
  $current = $_SESSION["nu"];

  function go($loc){
    header ("location:$loc.php");
  }

  $regex = "/php|part/";

  if(isset($_POST['ganaar'])){
    if(preg_match($regex,$_POST['ganaar']) == 0){
      go($_POST['ganaar']);
    }
    echo "<script>
            if ( window.history.replaceState ) {
              window.history.replaceState( null, null, window.location.href );
            }
          </script>";
  }

  if(isset($_POST['ganaarP'])){
    $naamGo = $_POST['naamVriend'];
    if(preg_match($regex,$_POST['ganaarP']) == 0){

      $sql = "SELECT Private FROM `over` WHERE wie = '$naamGo';";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          // $_SESSION['test'] = "test";
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
              $_SESSION['test'] .= $checkVriend;
            }
          }
          // $_SESSION['test'] = " Naamgo : ".$naamGo." Privatecheck : ".$privateCheck." Vriendcheck : ".$checkVriend." ".$vriendB;
          if($current == $naamGo){
            $_SESSION["bezoek"] = $naamGo;
            go($_POST['ganaarP']);
          }
          if(strlen($checkVriend) > 0){
            $_SESSION["bezoek"] = $naamGo;
            go($_POST['ganaarP']);
          }
          else{
            if (!$privateCheck) {
              $_SESSION["bezoek"] = $naamGo;
              go($_POST['ganaarP']);
            }
         }
      }
    }
  }
    echo "<script>
            if ( window.history.replaceState ) {
              window.history.replaceState( null, null, window.location.href );
            }
          </script>";
  }



 ?>
