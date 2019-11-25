
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
  }

  if(isset($_POST['ganaarP'])){
    if(preg_match($regex,$_POST['ganaarP']) == 0){
      $sql = "SELECT User,Vriend FROM `vrienden` WHERE User = '$current' OR Vriend = '$current';";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $nu_ = $row['User'];
          $vriend_ = $row['Vriend'];
        }
      }
      if($vriend_ == $current){
        $vriend_ = $row['User'];
        $nu_ = $row['Vriend'];
      }
      $naamGo = $_POST['naamVriend'];
      $sql2 = "SELECT Private FROM `over` WHERE Wie = '$naamGo';";
      $result2 = $conn->query($sql2);
      if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
          $privateCheck = $row['Private'];
        }
      }
      if(strlen($vriend_) == 0){
        if($current == $vriend_){
          $_SESSION["bezoek"] = $naamGo;
          go($_POST['ganaarP']);
        }
        // if($privateCheck){
          $_SESSION["bezoek"] = $naamGo;
          go($_POST['ganaarP']);
        // }
      }
      else{
        $_SESSION["bezoek"] = $naamGo;
        go($_POST['ganaarP']);
      }
    }
  }


 ?>
