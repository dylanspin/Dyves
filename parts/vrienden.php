
<div class="vrienden">
  <div class="watProfiel tweev">Vrienden (<?php echo $aantalVrienden; ?>)</div>
  <div class="vrienden_inner">
    <?php
      for($i=0; $i<=8; $i++){//aantal vrienden moet daar komen te staan tot 9 als onder 9 moet er een plus teken bij die je naar vrienden toevoegt 
     ?>
    <div class="vriend">
      <img src="pic/<?php echo "profilepics/g1.jpg";?>" class="vriendenImage">
        <span class="profielkleur2">(3)Dylan Spin</span> <!--moet de naam en aantal vrienden van de vriend komen te staan-->
    </div>
  <?php
      }
   ?>
  </div>
</div>
