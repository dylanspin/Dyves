<?php

  function reload(){
    echo "<script>
              if (window.history.replaceState) {
                window.history.replaceState( null, null, window.location.href);
                location.reload(true);
              }
          </script>";
  }

    // $currentPoll = 1;
    $sql = "SELECT Poll FROM `settings` WHERE Id='1';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $currentPoll = $row['Poll'];
      }
    }

    $sql = "SELECT Naam,Status,Vragen,Antwoorden FROM `poll` WHERE Id='$currentPoll';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $vraagPoll = $row['Naam'];
        $statusPoll = $row['Status'];
        $VragenPoll = unserialize($row['Vragen']);
        $AntwoordenPoll = unserialize($row['Antwoorden']);
      }
    }
    $score = [0,0,0,0];
    for($i=0; $i<=count($AntwoordenPoll)-1; $i++){
      if($AntwoordenPoll[$i] == 0){
          $score[0] ++;
      }
      if($AntwoordenPoll[$i] == 1){
          $score[1] ++;
      }
      if($AntwoordenPoll[$i] == 2){
          $score[2] ++;
      }
      if($AntwoordenPoll[$i] == 3){
          $score[3] ++;
      }
    }
    $total = $score[0] + $score[1] + $score[2] + $score[3];
    $procenten = [round($score[0]/$total * 100),round($score[1]/$total * 100),round($score[2]/$total * 100),round($score[3]/$total * 100)];
 ?>

<div class="poll border">
  <span class="text">Wat vind jij ?</span>
  <hr>
  <div class="space"></div>
  <span class="text2"><?php echo $vraagPoll; ?></span>
  <?php
    for($i=0; $i<=3; $i++){
      echo "<form class='procent' method='post'>
              <div class='pol_info'>
                <div class='procentages' style='width:$procenten[$i]%'></div>
                <span class='blauw left'>$procenten[$i]%</span>
                <button class='pollbutton underline' type='submit' name='SubmitPoll' value='$i'>
                  $VragenPoll[$i]
                </button>
              </div>
            </form>";
    }
   ?>
  <div class="space"></div>
  <button class="inlog_ver bottom">
    <span class="blauw">Lees meer of discussieer mee</span>
  </button>
</div>

<?php
  if (isset($_POST['SubmitPoll'])){
    if(!$voted){
      $antwoord = $_POST['SubmitPoll'];
      $sql = "SELECT Antwoorden FROM `poll` Where Id='$currentPoll';";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $AntwoordenPoll2 = unserialize($row['Antwoorden']);
        }
      }
      if(!strlen($AntwoordenPoll2[0]) > 0){
        $AntwoordenPoll2 = [$antwoord];
      }
      else{
        array_push($AntwoordenPoll2,$antwoord);
      }
      $compresantwoorden = serialize($AntwoordenPoll2);
      $sql = "UPDATE `poll` SET `Antwoorden` = '$compresantwoorden' WHERE Id = '$currentPoll';";
      if ($conn->query($sql) === true) {
        $sql = "UPDATE `notusers` SET `Voted` = '1' WHERE Gebruikersnaam = '$current';";//Set Voted true zo dat de user niet nog een keer kan stemmen
        if ($conn->query($sql) === true) {

        }
      }
    }
    reload();
  }
?>
