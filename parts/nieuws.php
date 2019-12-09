
<?php
    $post1 = 3;
    $post2 = 2;
    $post3 = 5;
?>
<!--nieuws sectie-->
<div class="niews">
  <div class="links" onclick="schuif(1,20)">
    <?php echo "<img src='pic/artikels/$imgArtikel[$post1]' class='nieuws_img'>"; ?>
    <div class="uitschuif" id="info1">
      <?php
        echo $artikel[$post1];
        $laatste3 --;
      ?>
    </div>
  </div>

  <div class="rechts" onclick="schuif(2,62)">
    <?php echo "<img src='pic/artikels/$imgArtikel[$post2]' class='nieuws_img'>"; ?>
    <div class="uitschuif" id="info2">
      <?php
        echo $artikel[$post2];
        $laatste3 --;
      ?>
    </div>
  </div>
  <div class="space"></div>
  <div class="rechts" onclick="schuif(3,45)">
    <?php echo "<img src='pic/artikels/$imgArtikel[$post3]' class='nieuws_img'>"; ?>
    <div class="uitschuif" id="info3">
      <?php
        echo $artikel[$post3];
      ?>
    </div>
  </div>
</div>
