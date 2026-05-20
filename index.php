<?php
    require_once __DIR__ . '/php/bootstrap.php';
    // include __DIR__ . '/php/Ban.php'; // Ban systeem

    function reloadPost() {
        echo "<script>
                if (window.history.replaceState) {
                  window.history.replaceState(null, null, window.location.href);
                  location.reload(true);
                }
                var scroll = $(window).scrollTop();
                $('html').scrollTop(scroll);
              </script>";
    }

    function randomId($Lengte) { // maakt een random string
        $randomid = '';
        $a = round($Lengte / 10);
        $randomcijfers = Rand($a * 1, $a * 5);
        for ($i = 0; $i <= $Lengte; $i++) {
            $random = Rand(1, 60);
            $randomid .= chr(64 + $random);
        }
        for ($b = 0; $b <= $randomcijfers; $b++) {
            $random = Rand(1, 50);
            $randomid = str_replace(chr(64 + $random), $random, $randomid);
        }
        $randomid = str_replace("'", $random, $randomid);
        $randomid = str_replace('`', $random, $randomid);
        return $randomid;
    }

    function check($randomid, $conn) {
        $rows = db_all($conn, 'SELECT UNIQ FROM `notusers`');
        foreach ($rows as $row) {
            if ($randomid === $row['UNIQ']) {
                return randomId(20);
            }
        }
        return $randomid;
    }

    $current = $_SESSION['nu'] ?? '';

    // POST navigation requires a valid CSRF token (skip the silent
    // background-reload triggered by reloadPost(), which carries no token).
    $isNavPost = $_SERVER['REQUEST_METHOD'] === 'POST' && (
        isset($_POST['Menu'])       || isset($_POST['Meldingen']) || isset($_POST['instellingen']) ||
        isset($_POST['Profiel'])    || isset($_POST['Meerfotos']) || isset($_POST['vrienden']) ||
        isset($_POST['backend'])    || isset($_POST['Polls'])     || isset($_POST['Artikel']) ||
        isset($_POST['bezoek'])     || isset($_POST['Article'])   || isset($_POST['Nieuws']) ||
        isset($_POST['zoeken'])     || isset($_POST['Aanmelden']) || isset($_POST['Agenda'])
    );
    if ($isNavPost) {
        csrf_check();
    }

    if (isset($_POST['Menu']))         { $_SESSION['Waar'] = 'hoofdmenu';    reloadPost(); }
    elseif (isset($_POST['Meldingen']))    { $_SESSION['Waar'] = 'meldingen';    reloadPost(); }
    elseif (isset($_POST['instellingen'])) { $_SESSION['Waar'] = 'instellingen'; reloadPost(); }
    elseif (isset($_POST['Profiel']))      { $_SESSION['Waar'] = 'profiel'; $_SESSION['bezoek'] = ''; reloadPost(); }

    if     (isset($_POST['Meerfotos']))    { $_SESSION['Waar'] = 'fotos';        reloadPost(); }
    elseif (isset($_POST['vrienden']))     { $_SESSION['Waar'] = 'vrienden';     reloadPost(); }
    elseif (isset($_POST['backend'])) {
        if (is_admin($current)) {
            $_SESSION['Waar'] = 'backend';
            reloadPost();
        }
    }
    elseif (isset($_POST['Polls'])) {
        if (is_admin($current)) {
            $_SESSION['Waar'] = 'poll';
            reloadPost();
        }
    }
    elseif (isset($_POST['Artikel'])) {
        if (is_admin($current)) {
            $_SESSION['Waar'] = 'artikel';
            reloadPost();
        }
    }
    elseif (isset($_POST['bezoek']))       { $_SESSION['Waar'] = 'bezoek'; }
    elseif (isset($_POST['Article']))      {
        $_SESSION['Waar'] = 'Currentarticle';
        $_SESSION['CurentArticle'] = (string)$_POST['Article'];
        reloadPost();
    }
    elseif (isset($_POST['Nieuws']))       {
        $_SESSION['Waar']  = 'Nieuws';
        $_SESSION['label'] = (string)$_POST['Nieuws'];
        include __DIR__ . '/php/get.php';
        $_SESSION['Aantal'] = ($_SESSION['aantall'] ?? 0) - 13;
        $_SESSION['Start']  = $_SESSION['aantall'] ?? 0;
        reloadPost();
    }
    elseif (isset($_POST['zoeken']))       { $_SESSION['Waar'] = 'zoeken';    reloadPost(); }
    elseif (isset($_POST['Aanmelden']))    {
        $_SESSION['Nieuwacc'] = 'false';
        $_SESSION['Waar']     = 'aanmelden';
        reloadPost();
    }
    elseif (isset($_POST['Agenda']))       {
        $_SESSION['Waar']  = 'Agenda';
        $_SESSION['Agenda'] = 1;
        $_SESSION['Jaar']   = 2;
        $_SESSION['Maand']  = 5;
        reloadPost();
    }

    if (empty($_SESSION['Waar'])) {
        $_SESSION['Waar'] = 'hoofdmenu';
        reloadPost();
    }

    $page = dyves_safe_page($_SESSION['Waar'] ?? '');
    include __DIR__ . '/paginas/' . $page . '.php';
?>
