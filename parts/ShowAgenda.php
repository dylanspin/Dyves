<div class='outsideAgenda'>
  <form method='post'>
    <?php require_once __DIR__ . '/../php/bootstrap.php'; csrf_field(); ?>
    <div class='navDiv'>
      <button class='nonbutton agendaNav' type='submit' name='BackY'><i class='fa fa-arrow-left'></i></button>
      <button class='nonbutton agendaNav typeAgenda' type='submit' name='Jaar'>Jaren</button>
      <button class='nonbutton agendaNav' type='submit' name='NextY'><i class='fa fa-arrow-right'></i></button>
    </div>
    <div class='navDiv'>
      <button class='nonbutton agendaNav' type='submit' name='BackM'><i class='fa fa-arrow-left'></i></button>
      <button class='nonbutton agendaNav typeAgenda' type='submit' name='Maand'>Maanden</button>
      <button class='nonbutton agendaNav' type='submit' name='NextM'><i class='fa fa-arrow-right'></i></button>
    </div>
  </form>

<?php
    require_once __DIR__ . '/../php/connect.php';

    function reload() {
        echo "<script>
                if (window.history.replaceState) {
                  window.history.replaceState(null, null, window.location.href);
                }
              </script>";
    }

    function translatedag($Dag) {
        switch ($Dag) {
            case 'Mon': return 'Maandag';
            case 'Tue': return 'Dinsdag';
            case 'Wed': return 'Woensdag';
            case 'Thu': return 'Donderdag';
            case 'Fri': return 'Vrijdag';
            case 'Sat': return 'Zaterdag';
            case 'Sun': return 'Zondag';
            default:    return 'Een dag';
        }
    }

    function KrijgGB(array $jarenNum, array $geboortedatumAG, int $timestamp, int $aantal, int $J, array $vrienden) {
        for ($b = 0; $b < $aantal; $b++) {
            $gd = (string)($geboortedatumAG[$b] ?? '');
            if (strlen($gd) < 10) {
                continue;
            }
            $vriendMaand = ltrim(substr($gd, 5, 2), '0');
            $vriendag    = ltrim(substr($gd, 8, 2), '0');
            if ($vriendMaand === '' || $vriendag === '') {
                continue;
            }
            $vriendGEB = $jarenNum[$J] . '-' . $vriendMaand . '-' . $vriendag;
            if (strtotime($vriendGEB) === $timestamp) {
                return $vrienden[$b] ?? null;
            }
        }
        return null;
    }

    $row = db_one($conn, 'SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = ? LIMIT 1', 's', (string)$current);
    $vrienden = $row !== null ? dyves_decode($row['Vrienden']) : [];
    $aantal   = count($vrienden);

    $geboortedatumAG = [];
    for ($i = 0; $i < $aantal; $i++) {
        $row = db_one($conn, 'SELECT Geboortedatum FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', (string)$vrienden[$i]);
        $geboortedatumAG[$i] = $row !== null ? (string)$row['Geboortedatum'] : '';
    }

    $isPost = $_SERVER['REQUEST_METHOD'] === 'POST';
    if ($isPost && (isset($_POST['NextY']) || isset($_POST['BackY']) || isset($_POST['NextM']) || isset($_POST['BackM']) ||
                    isset($_POST['Jaar'])  || isset($_POST['Maand'])  || isset($_POST['planning']) || isset($_POST['close']) ||
                    isset($_POST['Dag']))) {
        csrf_check();
    }

    if (isset($_POST['NextY'])) {
        $_SESSION['Jaar'] = ($_SESSION['Jaar'] <= 7) ? $_SESSION['Jaar'] + 1 : 0;
        reload();
    }
    if (isset($_POST['BackY'])) {
        $_SESSION['Jaar'] = ($_SESSION['Jaar'] != 0) ? $_SESSION['Jaar'] - 1 : 8;
        reload();
    }
    if (isset($_POST['NextM'])) {
        $_SESSION['Maand'] = ($_SESSION['Maand'] <= 10) ? $_SESSION['Maand'] + 1 : 0;
        reload();
    }
    if (isset($_POST['BackM'])) {
        $_SESSION['Maand'] = ($_SESSION['Maand'] > 0) ? $_SESSION['Maand'] - 1 : 11;
        reload();
    }
    if (isset($_POST['Jaar']))  { $_SESSION['Agenda'] = 1; reload(); }
    if (isset($_POST['Maand'])) { $_SESSION['Agenda'] = 0; reload(); }
    if (isset($_POST['planning'])) { reload(); }
    if (isset($_POST['close'])) {
        $_SESSION['ShowForm'] = 'false';
        reload();
    }

    $row = db_one($conn, 'SELECT Agenda FROM `agenda` WHERE Gebruikersnaam = ? LIMIT 1', 's', (string)$current);
    $agendaDB = $row !== null ? $row['Agenda'] : '';
    $uncompressedAgenda = dyves_decode($agendaDB);

    $maanden  = ['Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December'];
    $jarenNum = [2017,2018,2019,2020,2021,2022,2023,2024,2025];
    $J        = (int)$_SESSION['Jaar'];
    $agenda   = (int)$_SESSION['Agenda'];
    $t = 0;
    $jaren = [];
    $dagen = [];

    for ($i = 2017; $i < 2026; $i++) {
        for ($b = 1; $b <= 12; $b++) {
            $dagen[$t] = cal_days_in_month(CAL_GREGORIAN, $b, $i);
            $t++;
        }
        $jaren[] = [$dagen];
    }

    if (isset($_POST['Dag'])) {
        if (is_numeric($_POST['Dag']) && isset($_POST['agendaHidden']) && is_numeric($_POST['agendaHidden'])) {
            $_SESSION['ShowForm']    = 'true';
            $_SESSION['dag']         = (int)$_POST['Dag'];
            $_SESSION['maandPOST']   = (int)$_POST['agendaHidden'];
        }
    }

    if (($_SESSION['ShowForm'] ?? '') === 'true') {
        $dag       = (int)$_SESSION['dag'];
        $maandPOST = (int)$_SESSION['maandPOST'];
        $datum     = $jarenNum[$J] . '-' . ($maandPOST + 1) . '-' . $dag;
        $timestamp = strtotime($datum);
        $dagNaam   = translatedag(date('D', $timestamp));

        if (isset($_POST['planning'])) {
            $textAG = (string)($_POST['AgendaTextarea'] ?? '');
            if (count($uncompressedAgenda) < 3) {
                $uncompressedAgenda = ['', ''];
            }
            $uncompressedAgenda[] = $timestamp;
            $uncompressedAgenda[] = $textAG;
            db_query($conn, 'UPDATE `agenda` SET `Agenda` = ? WHERE Gebruikersnaam = ?', 'ss', dyves_encode($uncompressedAgenda), (string)$current);
            reload();
        }

        echo "<form class='AgendaDiv' method='post'>";
        csrf_field();
        echo "<div class='AgendaDatum'>" . e($dagNaam) . ' ' . (int)$dag . ' ' . e($maanden[$maandPOST]) . "</div>" .
             "<textarea rows='7' cols='50' class='AgendaTextarea' name='AgendaTextarea'></textarea>" .
             "<button class='AgendaSave buttonnone scale' type='submit' name='planning' value='Save'><i class='fa fa-plus'></i></button>" .
             "<button class='AgendaClose buttonnone scale' type='submit' name='close'><i class='fa fa-times'></i></button>" .
             "<div class='agendaPlaningen'>";

        for ($i = 1; $i < count($uncompressedAgenda); $i++) {
            if ((int)$uncompressedAgenda[$i] === (int)$timestamp && isset($uncompressedAgenda[$i + 1])) {
                echo "<div class='planning'>" . e($uncompressedAgenda[$i + 1]) . "</div>";
            }
        }
        $jarig = KrijgGB($jarenNum, $geboortedatumAG, (int)$timestamp, $aantal, $J, $vrienden);
        if ($jarig !== null) {
            echo "<div class='planning'>" . e($jarig) . " is jarig</div>";
        }

        echo "</div></form>";
    }

    if ($agenda) {
        echo "<div class='Jaar'>" . (int)$jarenNum[$J] . "</div><div class='Maanden'>";
        for ($M = 0; $M <= 11; $M++) {
            echo "<form class='outside' method='post'>";
            csrf_field();
            echo "<div class='Maand'>" . e($maanden[$M]) . "</div>";
            for ($D = 1; $D <= $jaren[$J][0][$M]; $D++) {
                $datum     = $jarenNum[$J] . '-' . ($M + 1) . '-' . $D;
                $timestamp = strtotime($datum);
                $check     = false;
                for ($i = 1; $i < count($uncompressedAgenda); $i++) {
                    if ((int)$uncompressedAgenda[$i] === (int)$timestamp) {
                        $check = true;
                    }
                }
                $check2 = KrijgGB($jarenNum, $geboortedatumAG, (int)$timestamp, $aantal, $J, $vrienden);
                $hasBoth = $check && $check2;

                if (!$hasBoth) {
                    if ($check) {
                        echo "<button class='dag' type='submit' value='$D' name='Dag'>$D<div class='AgendaMelding'>&#10071;</div></button>";
                    } elseif ($check2) {
                        echo "<button class='dag' type='submit' value='$D' name='Dag'>$D<div class='AgendaMelding2'>&#127874;</div></button>";
                    } else {
                        echo "<button class='dag' type='submit' value='$D' name='Dag'>$D</button>";
                    }
                } else {
                    echo "<button class='dag' type='submit' value='$D' name='Dag'>$D" .
                           "<div class='AgendaMelding'>&#10071;</div>" .
                           "<div class='AgendaMelding2'>&#127874;</div>" .
                         "</button>";
                }
                echo "<input type='hidden' name='agendaHidden' value='$M'>";
            }
            echo "</form>";
        }
        echo "</div><br>";
    } else {
        $Maand = (int)$_SESSION['Maand'];
        echo "<form class='GroteMaand' method='post'>";
        csrf_field();
        echo "<div class='GroteNaam'>" . (int)$jarenNum[$J] . ' ' . e($maanden[$Maand]) . "</div>";
        for ($D = 1; $D <= $jaren[$J][0][$Maand]; $D++) {
            $datum     = $jarenNum[$J] . '-' . ($Maand + 1) . '-' . $D;
            $timestamp = strtotime($datum);
            $check     = false;
            $check2    = KrijgGB($jarenNum, $geboortedatumAG, (int)$timestamp, $aantal, $J, $vrienden);
            for ($i = 1; $i < count($uncompressedAgenda); $i++) {
                if ((int)$uncompressedAgenda[$i] === (int)$timestamp) {
                    $check = true;
                }
            }
            $hasBoth = $check && $check2;
            if (!$hasBoth) {
                if ($check) {
                    echo "<button class='dag Grote' type='submit' value='$D' name='Dag'>$D<div class='AgendaMelding GrotereMelding'>&#10071;</div></button>";
                } elseif ($check2) {
                    echo "<button class='dag Grote' type='submit' value='$D' name='Dag'>$D<div class='AgendaMelding GrotereMelding2'>&#127874;</div></button>";
                } else {
                    echo "<button class='dag Grote' type='submit' value='$D' name='Dag'>$D</button>";
                }
            } else {
                echo "<button class='dag Grote' type='submit' value='$D' name='Dag'>$D" .
                       "<div class='AgendaMelding GrotereMelding'>&#10071;</div>" .
                       "<div class='AgendaMelding GrotereMelding2'>&#127874;</div>" .
                     "</button>";
            }
            echo "<input type='hidden' name='agendaHidden' value='$Maand'>";
        }
        echo "</form></div>";
    }
?>
</div>
