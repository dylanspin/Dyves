
<div class="vrienden profielkleur2">
  <div class="vrienden_inner">
    <?php
      if($_SESSION['Waar'] == "bezoek"){
        $currentt = $_SESSION["bezoek"];
      }
      else{
        $currentt = $current;
      }
      $aantal = 0;
      $sql = "SELECT User,Vriend FROM `vrienden` WHERE User = '$currentt' OR Vriend = '$currentt';";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $nu = $row['User'];
          $vriend = $row['Vriend'];
          $aantal ++;

          if($vriend == $currentt){
            $vriend = $row['User'];
            $nu = $row['Vriend'];
          }

          $sql2 = "SELECT ProfielFoto,Man,Gebruikersnaam,AantalVrienden FROM `notusers` WHERE Gebruikersnaam='$vriend';"; /*pakt de opties uit de tabel*/
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
          if($aantal < 9){
            echo "<div class='vriend'>
                    <form method='post'>
                      <button type='submit' class='vriendenButton' name='bezoek'>";
            if($vriend == "Dylanspin"){
              echo "    <img src='pic/kroon.png' class='kroon'>
                        <img src='pic/profilepics/$liveFoto' class='vriendenImage img2'>";
            }
            else{
              echo "    <img src='pic/profilepics/$liveFoto' class='vriendenImage'>";
            }
            echo "    </button>
                      <input type='hidden' name='naamVriend' value='$vriend'>
                    </form>
                  <span class='profielkleur'>($totaalV)
                  <span class='underline'>
                    $vriend
                  </span>
                </span>
              </div>";
          }
        }
      }

      //Ben er later achter gekomen hoe Ik een lange array in een table kan zetten. Dus dit moet nog veranderd worden.
      //Als je dit leest dan is dat niet gebeurd of moet nog.
      if($_SESSION['Waar'] == "profiel"){
        $sql = "UPDATE `notusers` SET `AantalVrienden` = '$aantal' WHERE Gebruikersnaam = '$current';";
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
    <div class="watProfiel tweev vriendbar">Vrienden (<?php echo $aantal; ?>)</div>
  </div>
  <div class="meer underline"><a href="Profielvrienden.php">Meer Vrienden...</a></div>
</div>
