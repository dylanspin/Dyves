<?php

  $leestNu = $_SESSION['CurentArticle'];

  //Dit kan waarschijnlijk anders door het van de get.php tehalen
  $sql = "SELECT Artikel,Text_,Img,Label,Status,Datum FROM `artikels` Where Artikel = '$leestNu';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $artikel1 = $row['Artikel'];
        $artikel2 = $row['Text_'];
        $artikel3 = $row['Img'];
        $artikel4 = $row['Label'];
        $artikel5 = $row['Status'];
        $artikel6 = $row['Datum'];
    }
  }
 ?>
 <!-- Ergens moeten de label komen testaan. -->
 <div class="LeesArtikel">
   <div class="LeesArtikelKop">
     <?php echo $artikel1;?>
   </div>
    <?php echo "<img src='pic/artikels/$artikel3' class='LeesArtikelFoto'>"; ?>
   <div class="LeesArtikelText">
     <hr>
     <?php echo $artikel2;?>
   </div>
   <div class="LeesArtikelDatum grijs">
     <?php echo $artikel6; ?>
   </div>
 </div>
