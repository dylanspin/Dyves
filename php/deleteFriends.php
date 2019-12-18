
<div class="Delete">
  <?php
      $zoek = $_POST['Zoekdel'];

      $sql = "SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = '$current';";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $vrienden = unserialize($row['Vrienden']);
          }
      }

      if(isset($_POST['Delete'])){
          $welk = $_POST['Delete'];
          $sql = "SELECT UNIQ FROM `notusers` Where Gebruikersnaam = '$vrienden[$welk]';";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $naamGo = $row['UNIQ'];
            }
          }
          $sql = "SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = '$naamGo';";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $vriendenDEL = unserialize($row['Vrienden']);
              }
          }
          for($n=0; $n<=count($vriendenDEL); $n++){
              if($vriendenDEL[$n] == $gebruikersnaam_){
                  unset($vriendenDEL[$n]);
              }
          }
          unset($vrienden[$welk]);
          $compressedvrienden = serialize($vrienden);
          $compressedvriendenDEL = serialize($vriendenDEL);

          $sql = "UPDATE `allfriends` SET `Vrienden` = '$compressedvrienden' WHERE Gebruikersnaam = '$current';";
          if ($conn->query($sql) === true) {
            $sql = "UPDATE `allfriends` SET `Vrienden` = '$compressedvriendenDEL' WHERE Gebruikersnaam = '$naamGo';";
            if ($conn->query($sql) === true) {
            }
          }
          reloadPost();
      }

      for($i=0; $i<=count($vrienden)-1; $i++){
          $sql = "SELECT ProfielFoto,Man FROM `notusers` WHERE Gebruikersnaam = '$vrienden[$i]'"; /*pakt de opties uit de tabel*/
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  $foto_ = $row['ProfielFoto'];
                  $gender_ = $row['Man'];
              }
          }
          if(strlen($foto_) <= 1){
              $liveFoto = "g".$gender_.".jpg";
          }
          else{
              $liveFoto = $vrienden[$i].$foto_;
          }
          
          echo "<form class='vriend' method='post'>
                  <button type='button' class='vriendenButton' id='$i' onclick='zeker(this)'>
                    <img src='pic/profilepics/$liveFoto' class='vriendenImage'>
                    <button name='Delete' class='ZekerDelete' value='$i' id='t$i'>
                      Delete
                    </button>
                  </button>
                  <div class='profielkleur deletenaam'>
                      $vrienden[$i]
                  </div>
                </form>";
      }
   ?>
</div>
