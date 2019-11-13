<div class="over">
  <div class="watProfiel tweev">Over</div>
  <div class="persoonlijke profielkleur2 anderhalfv">
    <i class="fa fa-eye profielkleur3"></i>
    <?php
      echo "ProfielBezoekers : </span class='bold'>"."</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur2 anderhalfv">
    <i class="fa fa-globe profielkleur3"></i>
    <?php
      echo "Woonplaats : <span class='bold'>".$woonplaats_."</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur2 anderhalfv">
    <i class="fa fa-calendar profielkleur3"></i>
    <?php
      echo "Geboortedatum : <span class='bold'>".$geboortedatum_."</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur2 anderhalfv">
    <?php
      if($gender_){
        echo "<i class='fa fa-mars profielkleur3'></i> ";
        echo "Geslacht : <span class='bold'>Man</span>";
      }
      else{
        echo "<i class='fa fa-venus profielkleur3'></i> ";
        echo "Geslacht : <span class='bold'>Vrouw</span>";
      }
     ?>
  </div>
  <div class="persoonlijke profielkleur2 anderhalfv">
    <i class="fa fa-university"></i>
    <?php
      echo "Opleiding : <span class='bold'>Mbo Aplicatie ontwikkelaar</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur2 anderhalfv">
    <i class="fa fa-money"></i>
    <?php
      echo "Baan : <span class='bold'>Kookstudio schoonmaker</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur2 anderhalfv">
    <i class="fa fa-music"></i>
    <?php
      echo "Muziek : <span class='bold'>iets</span>";
     ?>
  </div>
  <div class="persoonlijke profielkleur2 anderhalfv">
    <i class="fa fa-futbol-o"></i>
    <?php
      echo "Sport : <span class='bold'>niks</span>";
     ?>
  </div>

</div>
