<?php
    include 'connect.php';
    include 'block.php';

    $t1 = 0;
    $t2 = 0;
    $GebruikerU  = $_POST['Gebruikersnaam'];
    $WoonplaatsU  = $_POST['Wooonplaats'];
    $Voornaam  = $_POST['Voornaam'];
    $achternaam  = $_POST['Achternaam'];
    $OpleidingU = $_POST['Opleiding'];
    $BaanU = $_POST['Baan'];
    $FilmU = $_POST['FilmU'];
    $SportU = $_POST['Sport'];
    $MuziekU = $_POST['MuziekU'];
    $Private = $_POST['Aanprive'];
    $VriendenAan = $_POST['AanVrienden'];
    $MuziekAan = $_POST['AanMuziek'];
    $FilmAan = $_POST['AanFilms'];
    $Muziek = $_POST['Muziek'];
    $inputVal = $_POST['Hidden'];
    $profielfoto = $_FILES["fileToUpload"]["name"];
    $foto = $_FILES["fotoToUpload"]["name"];
    $pstFont = $_POST['font'];

    // $current = $_COOKIE["nu"];
    $current = $_SESSION["nu"];

    $updated = "";
    $updated2 = "";

    if (strlen($OpleidingU) > 0) {
        $update[$t1] = "`Opleiding` = '$OpleidingU'";
        $t1 ++;
    }
    if (strlen($BaanU) > 0) {
        $update[$t1] = "`Baan` = '$BaanU'";
        $t1 ++;
    }
    if (strlen($MuziekU) > 0) {
        $update[$t1] = "`Muziek` = '$MuziekU'";
        $t1 ++;
    }
    if (strlen($FilmU) > 0) {
        $update[$t1] = "`Film` = '$FilmU'";
        $t1 ++;
    }
    if (strlen($SportU) > 0) {
        $update[$t1] = "`Sport` = '$SportU'";
        $t1 ++;
    }
    if (!$Private == $private_) {
        $update[$t1] = "`Private` = '$Private'";
        $t1 ++;
    }
    if (!$VriendenAan ==  $vrienAan_) {
        $update[$t1] = "`VriendenAan` = '$VriendenAan'";
        $t1 ++;
    }
    if (!$FilmAan ==  $filmAan_) {
        $update[$t1] = "`FilmAan` = '$FilmAan'";
        $t1 ++;
    }
    if (!$MuziekAan == $muziekAan_) {
        $update[$t1] = "`MuziekAan` = '$MuziekAan'";
        $t1 ++;
    }

    if(!$pstFont == $font){
        $update2[$t2] = "`Font` = '$pstFont'";
        $_SESSION['test'] = "test font";
        $t2 ++;
    }
    if ($inputVal != $achtergrond_) {
        if($inputVal != ""){
            $update2[$t2] = "`Achtergrond` = '$inputVal'";
            $t2 ++;
        }
    }
    if(strlen($profielfoto) > 0){
        $update2[$t2] = "`ProfielFoto` = '$profielfoto'";
        unlink("pic/profilepics/".$gebruikersnaam_.$profielfoto_);
        $t2 ++;
    }

  if (isset($_POST['update'])){
      if(strlen($foto) > 0){
          if($_FILES["fotoToUpload"]["size"] > 2000000){}//Weet niet waarom maar met een ! voor de statement werkt niet dus daarom else
          else{
              $sql = "SELECT Fotos FROM `notusers` WHERE UNIQ = '$current';";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      $fotoDB = $row['Fotos'];
                  }
              }
              $uncompressed = unserialize($fotoDB);
              $foto2 = $gebruikersnaam_.$foto;

              if(!strlen($uncompressed[0]) > 0){
                  $uncompressed = [$foto2];
              }
              else{
                  array_push($uncompressed,$foto2);
              }
              $compressed = serialize($uncompressed);
              $update2[$t2] = "`Fotos` = '$compressed'";
              $t2 ++;
          }
      }

      $t1 --;
      $t2 --;
      if($t1 >0){
        for($i=0; $i<=$t1-1; $i++){
          $updated2 .= $update[$i].",";
        }
        $updated2 .= $update[$t1];
      }
      else if($t1 == 0){
        $updated2 .= $update[$t1];
      }
      if($t2 >0){
        for($i=0; $i<=$t2-1; $i++){
          $updated .= $update2[$i].",";
        }
        $updated .= $update2[$t2];
      }
      else if($t2 == 0){
        $updated .= $update2[$t2];
      }
  }

    if (isset($_POST['update'])){
        if(strlen($profielfoto) > 0){
            $loc = "pic/profilepics/";
            $IMG = "fileToUpload";
            UploadIMG($loc,$IMG);//foto function
        }
        if(strlen($foto) > 0){
            $loc = "pic/fotos/";
            $IMG = "fotoToUpload";
            UploadIMG($loc,$IMG);//foto function
            rename("pic/fotos/$foto","pic/fotos/$gebruikersnaam_$foto");
        }

        if($t1 >= 0){
            $sql = "UPDATE `over` SET $updated2 WHERE Wie = '$gebruikersnaam_';";
            if ($conn->query($sql) === true) {
            }
        }

        if($t2 >= 0){
            $sql2 = "UPDATE `notusers` SET $updated WHERE UNIQ = '$current';";
            if ($conn->query($sql2) === true) {
                rename("pic/profilepics/$profielfoto","pic/profilepics/$gebruikersnaam_$profielfoto");
            }
        }
        reloadPost();
    }

 ?>
