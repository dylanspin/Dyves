<div class="profielKop profielkleur2">
  <img src="pic/<?php echo "profilepics/g".$liveFoto.".jpg";?>" class="profielImage">
  <div class="innerProfiel">
    <span class="profielkleur tweev">
      <?php
        echo $voornaam_." ".$achternaam_;
      ?>
    </span>
    <div class="space"></div>
    <span class="profielkleur eenv">
      <?php
        echo "Leeftijd: ".$leeftijd;
       ?>
    </span>
    <button class="buttonProfiel profielkleur anderhalfv underline" onclick="goto('instellingen')">Profiel Pimpen</button>
    <button class="buttonProfiel profielkleur anderhalfv underline">Mijn Gadgets</button>
    <button class="buttonProfiel profielkleur anderhalfv underline">Mijn Bezoekers</button>
  </div>
</div>
