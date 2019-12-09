<?php
  $label = $_SESSION['label'];

  $plus2 = 0;
  if($_SESSION['label'] == "nieuws"){
    $sql = "SELECT Artikel,Text_,Img,Status,Datum,Id FROM `artikels`;";
  }
  else{
    $sql = "SELECT Artikel,Text_,Img,Status,Datum,Id FROM `artikels` WHERE Label = '$label';";
  }
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $Labelartikel[$plus2] = $row['Artikel'];
      $LabeltextArtikel[$plus2] = $row['Text_'];
      $LabelimgArtikel[$plus2] = $row['Img'];
      $LabelstatusArtikel[$plus2] = $row['Status'];
      $LabeldatumArtikel[$plus2] = $row['Datum'];
      $LabelidArtikel[$plus2] = $row['Id'];
      $plus2 ++;
    }
  }

  echo "<div class='kop blauw'>$label</div>";

  echo "<form class='NieuwsTop' method='post'>";
    for($i=0; $i<=count($LabelidArtikel)-1; $i++){
      echo "<button class='labeltop nonbutton' type='submit' value='$Labelartikel[$i]' name='Article'>
              <img src='pic/artikels/$LabelimgArtikel[$i]' class='nieuws_img'>
              <div class='overlayText'>$Labelartikel[$i]</div>
            </button>";
    }
  echo "</form>";
 ?>
