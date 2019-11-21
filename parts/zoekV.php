
 <div class='Vrienden'>
    <?php
      include 'connect.php';

      if(isset($_POST['Zoek'])){
        $_SESSION["zoek"] = $_POST['zoekResultaat']; //dit moet nog gecheckt worden op script
        header('Location: '.$_SERVER['PHP_SELF']);
      }
      if(isset($_POST['buttonSU'])){
        $checkUP = true;
        $userIN = $_POST['buttonSU']; //Dit moet nog veilig gemaakt worden
        $sql = "SELECT To_user FROM `friend_invite` WHERE User = '$current';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $check1 = $row['To_user'];
            if($check1 == $userIN){
              $checkUP = false;
            }
          }
        }
        if(!$checkUP){
            // echo "Mislukt";
        }
        else{
          $sql2 = "INSERT INTO `friend_invite` (`User`,`To_user`) VALUES ('$current','$userIN');";
          if ($conn->query($sql2) === true) {
          }
          else {
            // echo "mislukt". $sql . "<br>" . $conn->error;
          }
          header('Location: '.$_SERVER['PHP_SELF']);
        }
      }

      $number = 0;
      $zoek = $_SESSION["zoek"];
      $sql = "SELECT Gebruikersnaam,Man,ProfielFoto FROM `notusers` WHERE Gebruikersnaam LIKE '%$zoek%'"; /*pakt de opties uit de tabel*/
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $check_ = true;
          $number++;
          $remainder = $number % 2;

          $gender = $row['Man'];
          $naam = $row['Gebruikersnaam'];
          $foto = $row['ProfielFoto'];

          $sql3 = "SELECT To_user FROM `friend_invite` WHERE User = '$current';";
          $result2 = $conn->query($sql3);
          if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
              $check3 = $row2['To_user'];
              if($check3 == $naam){
                $check_ = false;
              }
            }
          }

          if(strlen($foto) <= 1){
            $liveFoto = "g".$gender.".jpg";
          }
          else{
            $liveFoto = $naam.$foto;
          }

          if($remainder == 0){
            echo "<div class='VriendVak'>
                    <img src='pic/profilepics/$liveFoto' class='profielVriend'>
                    <div class='vriendText blauw underline'>
                      $naam
                    </div>";
            if($check_){
              echo "<form method='post' class='voegF'>
                      <button class='addV' type='submit' value='$naam' name='buttonSU'>
                        <i class='fa fa-plus-circle blauw'></i>
                        <span class='blauw underline'>Vriend Toevoegen</span>
                      </button>
                    </form>";
            }
            echo "</div>";
          }
          else{
            echo "<div class='VriendVak backgroundV'>
                    <img src='pic/profilepics/$liveFoto' class='profielVriend'>
                    <div class='vriendText blauw underline'>
                      $naam
                    </div>";
            if($check_){
              echo "<form method='post' class='voegF'>
                      <button class='addV' type='submit' value='$naam' name='buttonSU'>
                        <i class='fa fa-plus-circle blauw'></i>
                        <span class='blauw underline'>Vriend Toevoegen</span>
                      </button>
                    </form>";
            }
            echo "</div>";
          }
        }
      }
     ?>
 </div>
