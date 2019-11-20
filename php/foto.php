<?php
  $target_dir = "pic/profilepics/";//locatie image
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if(isset($_POST["update"])) {
    if (file_exists($target_file)) {
        // echo "Sorry, Bestand bestaat all.";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        // echo "Sorry, je File is tegroot.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        // echo "Alleen JPG, JPEG, PNG & GIF files zijn toegestaan.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        // echo "Sorry, Het is niet geupload.";
    }
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". basename($_FILES["fileToUpload"]["name"]). " Is geuploaded.";
        }
        else {
            // echo "Er was een Probleem";
        }
    }

  }

?>
