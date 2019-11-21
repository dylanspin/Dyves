<div class="over profielkleur2">
  <div class="watProfiel tweev">Over</div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-eye"></i>
    <?php
      echo "ProfielBezoekers : </span class='bold'>".$aantal_."</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-globe"></i>
    <?php
      echo "Woonplaats : <span class='bold'>".$woonplaats_."</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-calendar"></i>
    <?php
      echo "Geboortedatum : <span class='bold'>".$geboortedatum_."</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <?php
      if($gender_){
        echo "<i class='fa fa-mars'></i> ";
        echo "Geslacht : <span class='bold'>Man</span>";
      }
      else{
        echo "<i class='fa fa-venus'></i> ";
        echo " Geslacht : <span class='bold'>Vrouw</span>";
      }
     ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-book"></i>
    <?php
      echo "Opleiding : <span class='bold'>$opleiding_</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-money"></i>
    <?php
      echo "Baan : <span class='bold'>$baan_</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-music"></i>
    <?php
      echo "Muziek : <span class='bold'>$muziek_</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-film"></i>
    <?php
      echo "Fav Film : <span class='bold'>$film_</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-futbol-o"></i>
    <?php
      echo "Sport : <span class='bold'>$sport_</span>";
     ?>
  </div>

</div>
