<?php
  include 'block.php';

  function UploadIMG($loc,$bestand){
    $target_dir = $loc;//locatie image
    $target_file = $target_dir . basename($_FILES[$bestand]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      $uploadOk = 0;
    }
    if ($_FILES[$bestand]["size"] > 2000000) {
      $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
    }
    else {
      if (move_uploaded_file($_FILES[$bestand]["tmp_name"], $target_file)) {
      }
    }
  }
?>
