<div class="profielKop profielkleur2">
  <img src="pic/<?php echo "profilepics/".$liveFoto;?>" class="profielImage">
  <div class="innerProfiel">
    <span class="profielkleur tweev">
      <?php
        echo $voornaam_." ".$achternaam_;
      ?>
    </span>
    <div class="space"></div>
    <span class="profielkleur anderhalfv">
      <?php
        echo "Leeftijd: ".$leeftijd."<br>";
        if($gebruikersnaam_ == "Dylanspin"){
          echo "Eigenaar Dyves";
        }
       ?>
    </span>
  </div>
</div>
