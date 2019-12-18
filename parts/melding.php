
<?php

  function deleteInvite($conn,$Username,$from,$current){
    for($i=0; $i<=count($from); $i++){
      if($from[$i] == $Username){
        unset($from[$i]);
        $compresInvites = serialize($from);
        $sql = "UPDATE `friend_invite` SET `To_user` = '$compresInvites' WHERE User = '$current';";
        if ($conn->query($sql) === true) {
        }
      }
    }
    reloadPost();
  }

  $sql = "SELECT To_user FROM `friend_invite` WHERE User = '$current';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $from = unserialize($row['To_user']);
    }
  }

  if (isset($_POST['buttonneg'])){// delete invite code
    $Username = $_POST['buttonneg'];
    $Username = $from[$Username];
    deleteInvite($conn,$Username,$from,$current);
  }

  if(isset($_POST['buttonac'])){  //voegt vriend toe
    $Username = $_POST['buttonac'];
    $Username = $from[$Username];
    $sql = "SELECT UNIQ FROM `notusers` WHERE Gebruikersnaam = '$Username';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $UsernameDB = $row['UNIQ'];
      }
    }

    $sql = "SELECT Vrienden FROM `allfriends` Where Gebruikersnaam = '$current' ;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $vrienden = unserialize($row['Vrienden']);
      }
    }

    $sql = "SELECT Vrienden FROM `allfriends` Where Gebruikersnaam = '$UsernameDB' ;";
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
      $vrienden2 = [$gebruikersnaam_];
    }
    else{
      array_push($vrienden2,$gebruikersnaam_);
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
      $sql = "UPDATE `allfriends` SET `Vrienden` = '$compresvrienden2' WHERE Gebruikersnaam = '$UsernameDB';";
      if ($conn->query($sql) === true) {
      }
    }
    deleteInvite($conn,$Username,$from,$current);//delete de invite
  }
 ?>

<div class="Meldingen">
  <?php
    for($i=0; $i<=count($from)-1; $i++){
      if(!count($from) == 0 && !strlen($from[0]) == 0){
        echo "<div class='Melding'>
                <div class='vriendText blauw'>
                  Je hebt een vriend invite van $from[$i]
                </div>
                <form method='post'>
                  <button type='submite' name='buttonac'  value='$i' class='meldingButton accepteer'>Accepteer</button>
                  <button type='submite' name='buttonneg' value='$i' class='meldingButton negeer'>Negeer</button>
                </form>
              </div>";
      }
    }
  ?>
</div>
