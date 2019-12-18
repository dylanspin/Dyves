
<div class="vrienden profielkleur2">
  <div class="vrienden_inner">
    <?php
      if($_SESSION['Waar'] == "bezoek"){
        $bezoekAC = $_SESSION["bezoek"];
        $sql = "SELECT UNIQ FROM `notusers` Where Gebruikersnaam = '$bezoekAC';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $naamGo = $row['UNIQ'];
          }
        }
        $currentt = $naamGo;
      }
      else{
        $currentt = $current;
      }

      $sql = "SELECT Vrienden FROM `allfriends` Where Gebruikersnaam = '$currentt';";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $vrienden = unserialize($row['Vrienden']);
          }
          $aantal = count($vrienden);

          for($i=0; $i<=$aantal-1; $i++){
                if(!count($vrienden) == 0 && !strlen($vrienden[0]) == 0){
                  $sql2 = "SELECT ProfielFoto,Man,Gebruikersnaam,AantalVrienden FROM `notusers` WHERE Gebruikersnaam = '$vrienden[$i]';"; /*pakt de opties uit de tabel*/
                  $result2 = $conn->query($sql2);

                  if ($result2->num_rows > 0) {
                      while($row = $result2->fetch_assoc()) {
                          $foto_ = $row['ProfielFoto'];
                          $gender_ = $row['Man'];
                          $vriend_ = $row['Gebruikersnaam'];
                          $totaalV = $row['AantalVrienden'];
                      }
                  }

                  if(strlen($foto_) <= 1){
                      $liveFoto = "g".$gender_.".jpg";
                  }
                  else{
                      $liveFoto = $vriend_.$foto_;
                  }
                  if($i < 9 && count($vrienden) >= 1){
                      echo "<div class='vriend'>
                              <form method='post'>
                                <button type='submit' class='vriendenButton' name='bezoek' value='$i'>";
                      if($vrienden[$i] == "Dylanspin"){
                          echo "  <img src='pic/kroon.png' class='kroon'>
                                  <img src='pic/profilepics/$liveFoto' class='vriendenImage img2'>";
                      }
                      else{
                          echo "    <img src='pic/profilepics/$liveFoto' class='vriendenImage'>";
                      }
                      echo "    </button>
                              </form>
                            <span class='profielkleur'>($totaalV)
                            <span class='underline'>
                              $vrienden[$i]
                            </span>
                          </span>
                        </div>";
                  }
              }
          }
      }

      if($_SESSION['Waar'] == "profiel"){
          $sql = "UPDATE `notusers` SET `AantalVrienden` = '$aantal' WHERE Gebruikersnaam = '$gebruikersnaam_';";
          if ($conn->query($sql) === true) {
          }
      }
      else{
          $Change =  $_SESSION["bezoek"];
          $sql = "UPDATE `notusers` SET `AantalVrienden` = '$aantal' WHERE Gebruikersnaam = '$Change';";
          if ($conn->query($sql) === true) {
          }
      }
    ?>
    <div class="watProfiel tweev vriendbar">Vrienden (<?php if($aantal == 0){echo 0;}else{echo $aantal;} ?>)</div>
  </div>
  <div class="meer underline"><a href="Profielvrienden.php">Meer Vrienden...</a></div>
</div>
