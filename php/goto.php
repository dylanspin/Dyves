
<?php
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


 ?>
