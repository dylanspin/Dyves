<?php

  $vg = [0,16,1,6,3,5,7,12,14,8,2,10,11,9,13,15,4];

  for($b=0; $b<=count($vg)-1; $b++){
    $th = $vg[$b];
 ?>
     <div class="thema" name="button" id="<?php echo "t".$th; ?>" onclick="checkbox('<?php echo "t".$th;  ?>')">
       <img src="<?php echo "pic/themas/thema".$th.".png"; ?>" class="nieuws_img">
     </div>
<?php
  }
 ?>
