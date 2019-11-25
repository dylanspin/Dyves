<div class="krabels profielkleur2">
  <div class="watProfiel tweev">Krabels</div>
    <div class="Krabelss" id="Krabelss">
      <form class="hide" method="post" id="show1">
        <textarea name="textarea" rows="8" cols="80" id="textarea" class="textarea anderhalfv" placeholder="Krabel"></textarea>
        <button type="submit" name="PostKrabel" class="PostKrabel profielkleur"><i class="fa fa-paper-plane"></i></i></button>
      </form>
      <button name="closekr" onclick="showK()" id="hide" class="close"><i class="fa fa-comments profielkleur"></i></button>
      <button name="closekr" onclick="showK()" id="hide2" class="close hide"><i class="fa fa-times profielkleur"></i></button>

      <div class="smileys hide" id="show2">
        <?php
          $smileys = ['129297','129303','129325','129323','129300','129296','129320','129317','129321','129392','129315','129297',
                      '128532','128554','129316','129298','129301','129314','129326','129319','129397','129398','129396','129327',
                      '129312','129395','129299','129488','129402','129324','128127','128128','9760','128169','129313','128121','128122',
                      '128123','128125','128126','129302','128572','128573','128584','128585','128586','128175',
                      '128162','128165','128171','128166','128168','128163','128172','128173','128164','128064','129504','129463','128067',
                      '128066','129460','129462','129461','128170','128080','129308','129307','9757','128071','128073','128072','128405',
                      '129305','129304','129311','129310','128076','9996','128406','9995','128400','128075','128069'];
          for($i=12; $i<=91; $i++){
            $id = "sm".$i;
            //met echo dee de id raar daarom gwn html mischien fix later
        ?>
            <input type="button" class="Smiley" id="<?php echo $id;?>" onclick="smiley('<?php echo $id;?>')" value="&#1285<?php echo $i;?>;">
        <?php
          }
          for($b=0; $b<=83; $b++){
            $id = "smi".$b;
        ?>
            <input type="button" class="Smiley" id="<?php echo $id;?>" onclick="smiley('<?php echo $id;?>')" value="&#<?php echo $smileys[$b];;?>;">
        <?php
          }
        ?>
      </div>
      <?php
        if(basename($_SERVER['PHP_SELF']) == "bezoek.php"){
          $naar  = $_SESSION["bezoek"];
        }
        else{
          $naar = $current;
        }
        $sql = "SELECT Gebruikersnaam,Postnaam,Text_ FROM `krabels` WHERE Postnaam = '$naar';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $Stuurder = $row['Gebruikersnaam'];
            $ontvanger = $row['Postnaam'];
            $text_ = $row['Text_'];
            $kleur = $row['Kleur'];
            echo "<div class='Krabelpost profielkleur'>
                    <div class='NaamKrabel tweev'>$Stuurder</div>
                    <div class='berichtKrabel anderhalfv'>$text_</div>
                  </div>";
          }
        }
       ?>
   </div>
</div>
