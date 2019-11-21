<?php


function go($loc){
  header ("location:$loc.php");
}
$regex = "/php|part/";
$test = "ok";
echo "test".preg_match($regex,$test);
// if(isset($_POST['ganaar'])){
  if(preg_match($regex,$test) == 0){
    // go($test);
    echo "test";
  }
// }
 ?>
