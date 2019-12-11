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

  if(!$_SESSION['Aantal'] > 13){//checkt als de next knop all is ingedrukt
    if(count($LabelidArtikel)-1 > 13){
      $_SESSION['Aantal'] = 13;
    }
    else{
      $_SESSION['Aantal'] = count($LabelidArtikel)-1;
    }
  }

  if(isset($_POST['Next'])){
    $_SESSION['Start'] += 13;
    $_SESSION['Aantal'] += 13;
    reloadPost();
  }
  if(isset($_POST['Back'])){
    $_SESSION['Start'] -= 13;
    $_SESSION['Aantal'] -= 13;
    reloadPost();
  }
  $laatste = $_SESSION['Aantal'] +2;

  echo "<div class='kop blauw'>$label</div>
        <form class='NieuwsTop' method='post'>";

  for($i=$_SESSION['Start']; $i<=$_SESSION['Aantal']; $i++){
    $laatste --;
    if($laatste >= 0){
      echo "<button class='labeltop nonbutton' type='submit' value='$Labelartikel[$laatste]' name='Article'>
              <img src='pic/artikels/$LabelimgArtikel[$laatste]' class='nieuws_img'>
              <div class='overlayText'>$Labelartikel[$laatste]</div>
            </button>";
    }
  }

  if($_SESSION['Aantal'] < 13){//nav buttons
    echo "<button class='back nav navbottom' type='submit' name='Next'><i class='fa fa-arrow-left'></i></button>
          <button class='back nav navtop' type='submit' name='Next'><i class='fa fa-arrow-left'></i></button>";
  }
  if($_SESSION['Start'] <= 0 && !count($LabelidArtikel) + $_SESSION['Aantal'] > 0){
    echo "<button class='next nav navbottom' type='submit' name='Back'><i class='fa fa-arrow-right'></i></button>
          <button class='next nav navtop' type='submit' name='Back'><i class='fa fa-arrow-right'></i></button>";
  }

  echo "</form>";
 ?>
