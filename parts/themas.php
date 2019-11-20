
<?php
  //het id dee raar als ik het gwn met echo liet uitprinten.

  $vg = [0,1,2,3,5,7,12,4,8,9,6,10,11,13,14];
  
  for($b=0; $b<=14; $b++){
    $th = $vg[$b];
 ?>
   <div class="thema" name="button" id="<?php echo "t".$th; ?>" onclick="checkbox('<?php echo "t".$th;  ?>')">
    <img src="<?php echo "pic/themas/thema".$th.".png"; ?>" class="nieuws_img">
  </div>
<?php
  }
 ?>
