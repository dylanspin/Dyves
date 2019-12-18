<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <span class="blauw">Accounts</span> Zoeken
      </div>

      <div class="zoekheader">
        <form class="" action="" method="post">
          <div class="zoek">
            <input type="text" class="zoekbalk" name="zoekResultaat" placeholder="Zoek...">
            <button type="submit" name="Zoek" class="zoekButton"><i class="fa fa-search icon2"></i>Zoek</button>
          </div>
        </form>
      </div>
        <?php
          include 'parts/zoekV.php';
        ?>
    </div>
    <?php
        // include 'parts/footer.php';
    ?>
  </body>
</html>
