
<?php
    $post1 = 3;
    $post2 = 2;
    $post3 = 5;
?>
<!--nieuws sectie-->
<form class="niews" method="post">
  <div class="links" onclick="schuif(1,20)">
    <?php echo "<img src='pic/artikels/$imgArtikel[$post1]' class='nieuws_img'>"; ?>
    <button class="uitschuif" id="info1" value="<?php echo $artikel[$post1];?>" type="submit" name="Article">
      <?php
        echo $artikel[$post1];
        $laatste3 --;
      ?>
    </button>
  </div>

  <div class="rechts" onclick="schuif(2,62)">
    <?php echo "<img src='pic/artikels/$imgArtikel[$post2]' class='nieuws_img'>"; ?>
    <button class="uitschuif" id="info2" value="<?php echo $artikel[$post2];?>" type="submit" name="Article">
      <?php
        echo $artikel[$post2];
        $laatste3 --;
      ?>
    </button>
  </div>
  <div class="space"></div>
  <div class="rechts" onclick="schuif(3,45)">
    <?php echo "<img src='pic/artikels/$imgArtikel[$post3]' class='nieuws_img'>"; ?>
    <button class="uitschuif" id="info3" value="<?php echo $artikel[$post3];?>" type="submit" name="Article">
      <?php
        echo $artikel[$post3];
      ?>
    </button>
  </div>
</form>
