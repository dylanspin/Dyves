
<?php
  //het id dee raar als ik het gwn met echo liet uitprinten.

  $vg = [0,1,6,3,5,7,12,14,8,2,10,11,9,13,15,4];

  for($b=0; $b<=15; $b++){
    $th = $vg[$b];
 ?>
   <div class="thema" name="button" id="<?php echo "t".$th; ?>" onclick="checkbox('<?php echo "t".$th;  ?>')">
    <img src="<?php echo "pic/themas/thema".$th.".png"; ?>" class="nieuws_img">
  </div>
<?php
  }
 ?>
