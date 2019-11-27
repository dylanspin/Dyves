<div class="profielKop profielkleur2">
  <img src="pic/<?php echo "profilepics/".$liveFoto;?>" class="profielImage">
  <div class="innerProfiel">
    <span class="profielkleur tweev">
      <?php
        echo mb_strimwidth($voornaam_, 0, 10, "...")." ".mb_strimwidth($achternaam_, 0, 10, "...");
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
       <form method="post">
         <button class="buttonProfiel profielkleur anderhalfv underline" type="submit" name="ganaar" value="cv">
           CV
         </button>
      </form>
      <div class="buttonProfiel profielkleur anderhalfv">
        Contact:
      </div>
      <span class="eenv">

      </span>
      <?php  ?>
    </span>
  </div>
</div>
