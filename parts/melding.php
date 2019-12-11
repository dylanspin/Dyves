

<?php

  if(isset($_POST['buttonac'])){
    $run2 = true;
    $Username = $_POST['buttonac'];
    $id = $_POST['HiddenVal'];
  }
  elseif (isset($_POST['buttonneg'])) {
    $run = true;
    $Username = $_POST['buttonac'];
    $id = $_POST['HiddenVal'];
  }

  if ($run){
    $sql = "DELETE FROM `friend_invite`WHERE `Id` = $id";/*sql code */
    if ($conn->query($sql) === true) {
    }
    reloadPost();
  }

  if($run2){

    $sql = "SELECT Vrienden FROM `allfriends` Where Gebruikersnaam = '$current' ;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $vrienden = unserialize($row['Vrienden']);
      }
    }

    $sql = "SELECT Vrienden FROM `allfriends` Where Gebruikersnaam = '$Username' ;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $vrienden2 = unserialize($row['Vrienden']);
      }
    }
    if(!strlen($vrienden[0]) > 0){
      $vrienden = [$Username];
    }
    else{
      array_push($vrienden,$Username);
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
      if($vrienden[$i] == $Username){
        $gelijk2 = true;
      }
    }

    $sql = "UPDATE `allfriends` SET `Vrienden` = '$compresvrienden' WHERE Gebruikersnaam = '$current';";
    if ($conn->query($sql) === true) {
      $sql = "UPDATE `allfriends` SET `Vrienden` = '$compresvrienden2' WHERE Gebruikersnaam = '$Username';";
      if ($conn->query($sql) === true) {
      }
      $sql = "DELETE FROM `friend_invite`WHERE `Id` = $id;";
      if ($conn->query($sql) === true) {
      }
    }

    // $sql = "INSERT INTO `vrienden` (`User`,`Vriend`) VALUES ('$current','$Username');";
    // if ($conn->query($sql) === true) {
    // }
    // else {
    //   echo "mislukt". $sql . "<br>" . $conn->error;
    // }
    //
    reloadPost();
  }

  $sql = "SELECT User,To_user,Id FROM `friend_invite` WHERE To_user = '$current';";
  $result = $conn->query($sql);
 ?>
<div class="Meldingen">

  <?php
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $user = $row['User'];
      $to = $row['To_user'];
      $id = $row['Id'];

      echo "<div class='Melding'>
              <div class='vriendText blauw'>
                Je hebt een vriend invite van $user
              </div>
              <form method='post'>
                <button type='submite' name='buttonac'  value='$user' class='meldingButton accepteer'>Accepteer</button>
                <button type='submite' name='buttonneg' value='$user' class='meldingButton negeer'>Negeer</button>
                <input type='hidden' name='HiddenVal' value='$id'>
              </form>
            </div>";
      }
    }
  ?>
</div><br><br><br>
