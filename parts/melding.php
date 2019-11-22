

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
    header('Location: '.$_SERVER['PHP_SELF']);
  }

  if($run2){
    $sql = "INSERT INTO `vrienden` (`User`,`Vriend`) VALUES ('$current','$Username');";
    if ($conn->query($sql) === true) {
    }
    else {
      echo "mislukt". $sql . "<br>" . $conn->error;
    }

    $sql = "DELETE FROM `friend_invite`WHERE `Id` = $id;";
    if ($conn->query($sql) === true) {
    }
    header('Location: '.$_SERVER['PHP_SELF']);
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

      // echo " ".$user." ".$to." ".$id." ";
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
