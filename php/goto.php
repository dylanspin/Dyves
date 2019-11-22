
<?php
  session_start();
  include 'block.php';

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
      $naamGo = $_POST['naamVriend'];
      $_SESSION["bezoek"] = $naamGo;
      go($_POST['ganaarP']);
    }
  }


 ?>
