<?php
    $nuOn = $_SESSION["nu"];
    $sql = "SELECT Gebruikersnaam,ProfielFoto,Man FROM `notusers` WHERE UNIQ = '$nuOn';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $gebruikersnaam2_ = $row['Gebruikersnaam'];
            $profielfoto2_ = $row['ProfielFoto'];
            $gender2_ = $row['Man'];
        }
    }
    if(strlen($profielfoto2_) <= 1){
        $liveFoto2 = "g".$gender2_.".jpg";
    }
    else{
        $liveFoto2 = $gebruikersnaam2_.$profielfoto2_;
    }

 ?>
