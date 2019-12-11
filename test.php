
<style media="screen">

</style>
<?php
  function reload(){
    echo "<script>
              if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
              }
          </script>";
  }
  // error_reporting(0);//moet nog weg
  session_start();
  include 'php/connect.php';

  $current = "Dylanspin"; //moet weg
  $vriend = "Levispin"; //moet iets anders zijn.
  $Deletevriend = "Levispin";
  $_SESSION['Go'] = false;

  $sql = "SELECT Vrienden FROM `allfriends` Where Gebruikersnaam = '$current' ;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $vrienden = unserialize($row['Vrienden']);
    }
  }

  $sql = "SELECT Vrienden FROM `allfriends` Where Gebruikersnaam = '$vriend' ;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $vrienden2 = unserialize($row['Vrienden']);
    }
  }

  if(isset($_POST['Button'])){ //moet nog iets anders zijn

    if(!strlen($vrienden[0]) > 0){
      $vrienden = [$vriend];
    }
    else{
      array_push($vrienden,$vriend);
    }

    if(!strlen($vrienden2[0]) > 0){
      $vrienden2 = [$current];
    }
    else{
      array_push($vrienden2,$current);
    }

    $compresvrienden = serialize($vrienden);
    $compresvrienden2 = serialize($vrienden2);

    for($i=0; $i<=count($vrienden)-1; $i++){
      if($vrienden[$i] == $vriend){
        $gelijk2 = true;
      }
    }

    // if(!$gelijk2){//Extra check mochten users op de een of andere manier de button nog of weer hebben
      $sql = "UPDATE `allfriends` SET `Vrienden` = '$compresvrienden' WHERE Gebruikersnaam = '$current';";
      if ($conn->query($sql) === true) {
        $sql = "UPDATE `allfriends` SET `Vrienden` = '$compresvrienden2' WHERE Gebruikersnaam = '$vriend';";
        if ($conn->query($sql) === true) {
        }
        reload();
      }
    // }
  }

  if(isset($_POST['DeleteButton'])){
    for($i=0; $i<=count($vrienden)-1; $i++){
      if($vrienden[$i] == $Deletevriend){
        $num = $i;
        $_SESSION['Go'] = true;
        $_SESSION['test3'] = "test1";
      }
    }
    for($i=0; $i<=count($vrienden)-1; $i++){
      if($vrienden2[$i] == $current){
        $num2 = $i;
        $_SESSION['Go'] = true;
        $_SESSION['test3'] = "test2";
      }
    }
    $_SESSION['test3'] = $num." ".$num2;

    unset($vrienden[$num]);
    unset($vrienden2[$num2]);

    $compresvrienden = serialize($vrienden);
    $compresvrienden2 = serialize($vrienden2);

    if($_SESSION['Go']){
      $sql = "UPDATE `allfriends` SET `Vrienden` = '$compresvrienden' WHERE Gebruikersnaam = '$current';";
      if ($conn->query($sql) === true) {
        $sql = "UPDATE `allfriends` SET `Vrienden` = '$compresvrienden2' WHERE Gebruikersnaam = '$Deletevriend';";
        if ($conn->query($sql) === true) {
        }
      }
    }
    reload();
  }

  for($i=0; $i<=count($vrienden)-1; $i++){//print vrienden moet nog weg
    echo $vrienden[$i]."<br>";
  }
  echo "Session: ".$_SESSION['test3'];

  for($i=0; $i<=count($vrienden)-1; $i++){
    if($vrienden[$i] == $vriend){
      $gelijk = true;
    }
  }

  if(!$gelijk){//print de add button
    echo "<form class='' method='post'>
            <button type='Submit' name='Button'>Friend</button>
          </form>";
  }
  else{
    echo "<form class=''  method='post'>
            <button type='Submit' name='DeleteButton'>Delete</button>
          </form>";
  }

  ?>
