<?php
  require_once __DIR__ . '/../php/bootstrap.php';

  if (isset($_POST['Next'])) {
      csrf_check();
      $_SESSION['Start']  += 14;
      $_SESSION['Aantal'] += 14;
      if (function_exists('reloadPost')) {
          reloadPost();
      }
  }
  if (isset($_POST['Back'])) {
      csrf_check();
      $_SESSION['Start']  -= 14;
      $_SESSION['Aantal'] -= 14;
      if (function_exists('reloadPost')) {
          reloadPost();
      }
  }

  $label = (string)($label ?? '');
  echo "<div class='kop blauw'>" . e($label) . "</div>" .
       "<form class='NieuwsTop' method='post'>";
  csrf_field();

  $next = false;
  for ($i = (int)($_SESSION['Start'] ?? 0); $i >= (int)($_SESSION['Aantal'] ?? 0); $i--) {
      if ($i > 0) {
          $art = $Labelartikel[$i]    ?? '';
          $img = $LabelimgArtikel[$i] ?? '';
          echo "<button class='labeltop nonbutton' type='submit' value='" . e($art) . "' name='Article'>" .
                 (int)$i .
                 "<img src='pic/artikels/" . e($img) . "' class='nieuws_img'>" .
                 "<div class='overlayText'>" . e($art) . "</div>" .
               "</button>";
          $next = true;
      }
  }
  $back = isset($_SESSION['Start']) && $_SESSION['Start'] != (($plus2 ?? 0) - 1);

  if ($next) {
      echo "<button class='next nav navbottom' type='submit' name='Back'><i class='fa fa-arrow-right'></i></button>" .
           "<button class='next nav navtop'    type='submit' name='Back'><i class='fa fa-arrow-right'></i></button>";
  }
  if ($back) {
      echo "<button class='back nav navbottom' type='submit' name='Next'><i class='fa fa-arrow-left'></i></button>" .
           "<button class='back nav navtop'    type='submit' name='Next'><i class='fa fa-arrow-left'></i></button>";
  }
  echo '</form>';
?>
