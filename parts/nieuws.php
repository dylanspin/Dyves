
<?php
    $post1 = 3;
    $post2 = 2;
    $post3 = 5;
?>
<!--nieuws sectie-->
<form class="niews" method="post">
  <?php csrf_field(); ?>
  <div class="links" onclick="schuif(1,20)">
    <?php if (isset($imgArtikel[$post1])) { echo "<img src='pic/artikels/".htmlspecialchars($imgArtikel[$post1])."' class='nieuws_img'>"; } ?>
    <button class="uitschuif" id="info1" value="<?php echo isset($artikel[$post1])?htmlspecialchars($artikel[$post1]):'';?>" type="submit" name="Article">
      <?php
        echo isset($artikel[$post1])?htmlspecialchars($artikel[$post1]):'Product niet beschikbaar';
      ?>
    </button>
  </div>

  <div class="rechts" onclick="schuif(2,62)">
    <?php if (isset($imgArtikel[$post2])) { echo "<img src='pic/artikels/".htmlspecialchars($imgArtikel[$post2])."' class='nieuws_img'>"; } ?>
    <button class="uitschuif" id="info2" value="<?php echo isset($artikel[$post2])?htmlspecialchars($artikel[$post2]):'';?>" type="submit" name="Article">
      <?php
        echo isset($artikel[$post2])?htmlspecialchars($artikel[$post2]):'Product niet beschikbaar';
      ?>
    </button>
  </div>
  <div class="space"></div>
  <div class="rechts" onclick="schuif(3,45)">
    <?php if (isset($imgArtikel[$post3])) { echo "<img src='pic/artikels/".htmlspecialchars($imgArtikel[$post3])."' class='nieuws_img'>"; } ?>
    <button class="uitschuif" id="info3" value="<?php echo isset($artikel[$post3])?htmlspecialchars($artikel[$post3]):'';?>" type="submit" name="Article">
      <?php
        echo isset($artikel[$post3])?htmlspecialchars($artikel[$post3]):'Product niet beschikbaar';
      ?>
    </button>
  </div>
</form>
