
<div class='Vrienden'>
   <?php
     include 'connect.php';
     if(isset($_POST['Zoek'])){
       $_SESSION["zoek"] = $_POST['zoekResultaat']; //dit moet nog gecheckt worden op script
       reloadPost();
     }

     if(isset($_POST['buttonSU'])){

       $userIN = $_POST['buttonSU'];

       $sql = "SELECT UNIQ FROM `notusers` WHERE Gebruikersnaam = '$userIN';";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
           $IDDB = $row['UNIQ'];
         }
       }

       $sql = "SELECT To_user,SendUsers FROM `friend_invite` WHERE User = '$current';";
       $result = $conn->query($sql); $ToUser = unserialize($row['To_user']);
       if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()){
           $SendUsers = unserialize($row['SendUsers']);
         }

         $sql = "SELECT To_user,SendUsers FROM `friend_invite` WHERE User = '$IDDB';";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()){
              $ToUser = unserialize($row['To_user']);
           }
         }

         if(strlen($ToUser[0]) == 0){
           $ToUser = [$gebruikersnaam_];
         }
         else{
           array_push($ToUser,$gebruikersnaam_);
         }

         if(strlen($SendUsers[0]) == 0){
           $SendUsers = [$IDDB];
         }
         else{
           array_push($SendUsers,$IDDB);
         }

         $compresInvites = serialize($ToUser);
         $compresSend = serialize($SendUsers);
         $sql = "UPDATE `friend_invite` SET `To_user` = '$compresInvites' WHERE User = '$IDDB';";
         if ($conn->query($sql) === true) {
           $sql = "UPDATE `friend_invite` SET `SendUsers` = '$compresSend' WHERE User = '$current';";
           if ($conn->query($sql) === true) {
           }
           echo "<script>
                   if ( window.history.replaceState ) {
                     window.history.replaceState( null, null, window.location.href );
                   }
                 </script>";
         }
       }
       reloadPost();
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
         if($naam == $current){
           $check_ = false;
         }
         $sql2 = "SELECT Vrienden FROM `allfriends` Where Gebruikersnaam = '$current';";
         $result2 = $conn->query($sql2);
         if ($result2->num_rows > 0) {
           while($row = $result2->fetch_assoc()) {
             $vrienden = unserialize($row['Vrienden']);
             for($i=0; $i<=count($vrienden)-1; $i++){
               if($vrienden[$i] == $naam){
                 $check_ = false;
               }
             }
           }
         }
         $sql3 = "SELECT SendUsers FROM `friend_invite` WHERE User = '$current';";
         $result2 = $conn->query($sql3);
         if ($result2->num_rows > 0) {
           while($row2 = $result2->fetch_assoc()) {
             $SendUsers = unserialize($row2['SendUsers']);
           }
         }
         for($i=0; $i<=count($SendUsers); $i++){
           if($SendUsers[$i] == $naam){
             $check_ = false;
           }
         }
         if($naam == $gebruikersnaam_){
           $check_ = false;
         }
         if(strlen($gebruikersnaam_) <= 1){
           $check_ = false;
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
