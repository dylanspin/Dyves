<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dyves</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="shortcut icon" type="image/png" href="pic/Dyves.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/javascript.js"></script>
  </head>
  <body onload="checkCookie(true)">
    <?php
      include 'php/get.php';
      include 'php/login.php';
      include 'php/searchbar.php';
      include 'php/uitloggen.php';
      include 'parts/cookies.php';
    ?>

    <div class="header">
      <?php
        include 'parts/header.php';
        include 'parts/inlog.php';
       ?>
      <div class="searchbar">
        <div class="logotext">
          Dyves
        </div>
        <?php include 'parts/search.php'; ?>
      </div>
    </div>

    <div class="body" id="">
      <div class="kop">
        <span class="blauw">Nu</span> Meest Besproken
      </div>
      <?php
        include 'parts/nieuws.php';
        include 'parts/latest.php';
        include 'parts/poll.php';
        include 'parts/films.php';
        include 'parts/latestPost.php';
        include 'parts/aanmelding.php';
        include 'parts/footer.php';
      ?>
   </div>
  </body>
</html>
