<?php

  if(isset($_POST['Next'])){
      $_SESSION['Start'] += 14;
      $_SESSION['Aantal'] += 14;
      reloadPost();
  }
  if(isset($_POST['Back'])){
      $_SESSION['Start'] -= 14;
      $_SESSION['Aantal'] -= 14;
      reloadPost();
  }

  echo "<div class='kop blauw'>$label</div>
        <form class='NieuwsTop' method='post'>";
  for($i=$_SESSION['Start']; $i>=$_SESSION['Aantal']; $i--){
      if($i > 0){
          echo "<button class='labeltop nonbutton' type='submit' value='$Labelartikel[$i]' name='Article'>
                  $i
                  <img src='pic/artikels/$LabelimgArtikel[$i]' class='nieuws_img'>
                  <div class='overlayText'>$Labelartikel[$i]</div>
                </button>";
                $next = true;
      }
      else{
          $next = false;
      }
  }
  if($_SESSION['Start'] != $plus2-1){
      $back = true;
  }
  else{
      $back = false;
  }

  if($next){//nav buttons
    echo "<button class='next nav navbottom' type='submit' name='Back'><i class='fa fa-arrow-right'></i></button>
          <button class='next nav navtop' type='submit' name='Back'><i class='fa fa-arrow-right'></i></button>";
  }
  if($back){
    echo "<button class='back nav navbottom' type='submit' name='Next'><i class='fa fa-arrow-left'></i></button>
          <button class='back nav navtop' type='submit' name='Next'><i class='fa fa-arrow-left'></i></button>";
  }

  echo "</form>";
 ?>
