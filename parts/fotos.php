<?php
  if($_SESSION['Waar'] == "bezoek"){
    $wie =  $_SESSION["bezoek"];
  }
  else{
    $wie = $gebruikersnaam_;
  }
  $sql = "SELECT Fotos FROM `notusers` WHERE Gebruikersnaam = '$wie';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $fotoDB = $row['Fotos'];
    }
  }
  $uncompressed = unserialize($fotoDB);//Maakt de array weer normaal waardoor het gelezen kan worden
  $tell = 0;

  if($_SESSION['Waar'] == "fotos"){
    if(count($uncompressed) > 0 && strpos($uncompressed[0], $wie) !== false){
      for($i=0; $i<=count($uncompressed)-1; $i++){
        echo "<div class='foto2 hoverscale'><img id='$i'onclick='modal(this)'src='pic/fotos/$uncompressed[$i]' class='nieuws_img'></div>";
      }
    }
  }
  else{
?>
  <div class="fotos profielkleur2">
    <div class="watProfiel tweev">Foto's & Video's</div>
    <?php
      //checkt als de lengthe van de string langer is dan 0 en als de naam van de gebruiker in de foto var zit.
      if(count($uncompressed) > 0 && strpos($uncompressed[0], $wie) !== false){
        for($i=0; $i<=count($uncompressed)-1; $i++){
          $tell ++;
          if($tell <= 5){
            echo "<div class='foto hoverscale'><img id='$i'onclick='modal(this)'src='pic/fotos/$uncompressed[$i]' class='nieuws_img'></div>";
          }
        }
      }
     ?>

    <form class="meer underline" method="post">
      <button class="Buttonnone underline" type="submit" name="Meerfotos">Bekijk meer...</button>
    </form>

  </div>
  <?php } ?>
  <div id="myModal" class="modal">
    <span class="close2" id="close2">&times;</span>
    <img class="modal-content" id="img01">
  </div>
