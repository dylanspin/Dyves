<div class="over profielkleur2">
  <div class="watProfiel tweev">Over</div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-eye"></i>
    <?php echo "ProfielBezoekers : <span class='bold'>" . e($aantal_ ?? 0) . "</span>"; ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-globe"></i>
    <?php echo "Woonplaats : <span class='bold'>" . e($woonplaats_ ?? '') . "</span>"; ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-calendar"></i>
    <?php echo "Geboortedatum : <span class='bold'>" . e($geboortedatum_ ?? '') . "</span>"; ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <?php
      if ($gender_ ?? false) {
          echo "<i class='fa fa-mars'></i> Geslacht : <span class='bold'>Man</span>";
      } else {
          echo "<i class='fa fa-venus'></i> Geslacht : <span class='bold'>Vrouw</span>";
      }
    ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-book"></i>
    <?php echo "Opleiding : <span class='bold'>" . e($opleiding_ ?? '') . "</span>"; ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-money"></i>
    <?php echo "Baan : <span class='bold'>" . e($baan_ ?? '') . "</span>"; ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-music"></i>
    <?php echo "Muziek : <span class='bold'>" . e($muziek_ ?? '') . "</span>"; ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-film"></i>
    <?php echo "Fav Film : <span class='bold'>" . e($film_ ?? '') . "</span>"; ?>
  </div>
  <div class="persoonlijke profielkleur anderhalfv">
    <i class="fa fa-futbol-o"></i>
    <?php echo "Sport : <span class='bold'>" . e($sport_ ?? '') . "</span>"; ?>
  </div>
</div>
