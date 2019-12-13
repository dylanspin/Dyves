
<div class="Delete">
  <?php
      if(isset($_POST['Delete'])){
          $ID = $_POST['ID'];
          $sql = "DELETE FROM `vrienden` WHERE `Id` = $ID;";
          if ($conn->query($sql) === true) {
          }
          header('Location: '.$_SERVER['PHP_SELF']);
      }
      $sql = "SELECT User,Vriend,Id FROM `vrienden` WHERE User = '$current' OR Vriend = '$current';";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $nu = $row['User'];
              $vriend = $row['Vriend'];
              $id = $row['Id'];
              $aantal ++;

              if($vriend == $current){
                  $vriend = $row['User'];
                  $nu = $row['Vriend'];
              }
              $sql2 = "SELECT ProfielFoto,Man FROM `notusers` WHERE Gebruikersnaam = '$vriend'"; /*pakt de opties uit de tabel*/
              $result2 = $conn->query($sql2);

              if ($result2->num_rows > 0) {
                  while($row = $result2->fetch_assoc()) {
                      $foto_ = $row['ProfielFoto'];
                      $gender_ = $row['Man'];
                  }
              }
              if(strlen($foto_) <= 1){
                  $liveFoto = "g".$gender_.".jpg";
              }
              else{
                  $liveFoto = $vriend.$foto_;
              }
              echo "<div class='vriend'>
                      <form method='post'>
                        <button type='button' class='vriendenButton'>
                          <img src='pic/profilepics/$liveFoto' class='vriendenImage'>
                          <button name='Delete' class='ZekerDelete'>
                            Delete
                          </button>
                        </button>
                        <input type='hidden' name='ID' value='$id'>
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
</div>
