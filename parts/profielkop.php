<div class="profielKop profielkleur2">
  <img src="pic/<?php echo "profilepics/".$liveFoto;?>" class="profielImage">
  <div class="innerProfiel">
    <span class="profielkleur tweev">
      <?php
        echo mb_strimwidth($voornaam_, 0, 10, "...")." ". mb_strimwidth($achternaam_, 0, 10, "...");
      ?>
    </span>
    <div class="space"></div>
    <span class="profielkleur anderhalfv">
      <?php
        echo "Leeftijd: ".$leeftijd;
       ?>
    </span>
    <form method="post">
      <button class="buttonProfiel profielkleur anderhalfv underline" type="submit" name="ganaar" value="instellingen">
        Profiel Pimpen
      </button>
      <button class="buttonProfiel profielkleur anderhalfv underline" type="submit" name="ganaar" value="cv">
        Mijn CV
      </button>
      <button class="buttonProfiel profielkleur anderhalfv underline">
        Mijn Bezoekers
      </button>
    </form>
  </div>
</div>
