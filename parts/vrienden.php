
<div class="vrienden profielkleur2">
  <div class="vrienden_inner">
    <?php
      $file = basename($_SERVER['PHP_SELF']);
      if($file == "bezoek.php"){
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

          $sql2 = "SELECT ProfielFoto FROM `notusers` WHERE Gebruikersnaam='$vriend';"; /*pakt de opties uit de tabel*/
          $result2 = $conn->query($sql2);

          if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
              $foto_ = $row['ProfielFoto'];
            }
          }

          echo "<div class='vriend'>
                  <form method='post'>
                    <button type='submit' class='vriendenButton' name='ganaarP' value='bezoek'>
                      <img src='pic/profilepics/$vriend$foto_' class='vriendenImage'>
                    </button>
                    <input type='hidden' name='naamVriend' value='$vriend'>
                  </form>
                  <span class='profielkleur'>(3)
                    <span class='underline'>
                      $vriend
                    </span>
                  </span>
                </div>";
        }
      }
    ?>
    <div class="watProfiel tweev vriendbar">Vrienden (<?php echo $aantal; ?>)</div>
  </div>
  <div class="meer underline"><a href="Profielvrienden.php">Meer Vrienden...</a></div>
</div>
