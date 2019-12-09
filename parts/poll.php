<?php
  $currentPoll = 1;
    $sql = "SELECT Naam,Status,Vragen,Antwoorden FROM `poll` Where id='$currentPoll';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $vraagPoll = $row['Naam'];
        $statusPoll = $row['Status'];
        $VragenPoll = unserialize($row['Vragen']);
        $AntwoordenPoll = $row['Antwoorden'];
      }
    }
 ?>
<div class="poll border">
  <span class="text">Wat vind jij ?</span>
  <hr>
  <div class="space"></div>
  <span class="text2"><?php echo $vraagPoll; ?></span>

  <div class="procent">
    <div class="pol_info">
      <div class="procentages" style="width:60%;"></div>
      <span class="blauw left">60%</span>
      <button class="pollbutton underline">
        <?php echo $VragenPoll[0]; ?>
      </button>
    </div>
  </div>
  <div class="procent">
    <div class="pol_info">
      <div class="procentages" style="width:20%;"></div>
      <span class="blauw left">20%</span>
      <button class="pollbutton underline">
        <?php echo $VragenPoll[1]; ?>
      </button>
    </div>
  </div>
  <div class="procent">
    <div class="pol_info">
      <div class="procentages" style="width:15%;"></div>
      <span class="blauw left">15%</span>
      <button class="pollbutton underline">
        <?php echo $VragenPoll[2]; ?>
      </button>
    </div>
  </div>
  <div class="procent">
    <div class="pol_info">
      <div class="procentages" style="width:5%;"></div>
      <span class="blauw left">5%</span>
      <button class="pollbutton underline">
        <?php echo $VragenPoll[3]; ?>
      </button>
    </div>
  </div>
  <div class="space"></div>

  <button class="inlog_ver bottom">
    <span class="blauw">Lees meer of discussieer mee</span>
  </button>
</div>
