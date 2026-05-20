<div class='Vrienden'>
  <?php
    require_once __DIR__ . '/../php/bootstrap.php';
    require_once __DIR__ . '/../php/connect.php';

    if (isset($_POST['Zoek'])) {
        csrf_check();
        $_SESSION['zoek'] = isset($_POST['zoekResultaat']) ? trim((string)$_POST['zoekResultaat']) : '';
        if (function_exists('reloadPost')) {
            reloadPost();
        }
    }

    if (isset($_POST['buttonSU'])) {
        csrf_check();
        $userIN = (string)$_POST['buttonSU'];

        $row = db_one($conn, 'SELECT UNIQ FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', $userIN);
        if ($row !== null) {
            $IDDB = (string)$row['UNIQ'];

            $r1 = db_one($conn, 'SELECT SendUsers FROM `friend_invite` WHERE User = ? LIMIT 1', 's', (string)$current);
            $SendUsers = $r1 !== null ? dyves_decode($r1['SendUsers']) : [];

            $r2 = db_one($conn, 'SELECT To_user FROM `friend_invite` WHERE User = ? LIMIT 1', 's', $IDDB);
            $ToUser = $r2 !== null ? dyves_decode($r2['To_user']) : [];

            $ToUser[]    = (string)($gebruikersnaam_ ?? '');
            $SendUsers[] = $IDDB;

            if (db_query($conn, 'UPDATE `friend_invite` SET `To_user` = ? WHERE User = ?', 'ss', dyves_encode($ToUser), $IDDB)) {
                db_query($conn, 'UPDATE `friend_invite` SET `SendUsers` = ? WHERE User = ?', 'ss', dyves_encode($SendUsers), (string)$current);
                echo "<script>
                        if (window.history.replaceState) {
                          window.history.replaceState(null, null, window.location.href);
                        }
                      </script>";
            }
        }
        if (function_exists('reloadPost')) {
            reloadPost();
        }
    }

    $number = 0;
    $zoek = (string)($_SESSION['zoek'] ?? '');
    if ($zoek === '') {
        return;
    }
    $like = '%' . $zoek . '%';
    $rows = db_all($conn, 'SELECT Gebruikersnaam, Man, ProfielFoto FROM `notusers` WHERE Gebruikersnaam LIKE ?', 's', $like);

    $r2 = db_one($conn, 'SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = ? LIMIT 1', 's', (string)$current);
    $vrienden = $r2 !== null ? dyves_decode($r2['Vrienden']) : [];

    $r3 = db_one($conn, 'SELECT SendUsers FROM `friend_invite` WHERE User = ? LIMIT 1', 's', (string)$current);
    $SendUsers = $r3 !== null ? dyves_decode($r3['SendUsers']) : [];

    foreach ($rows as $row) {
        $check_ = true;
        $number++;
        $remainder = $number % 2;
        $gender = $row['Man'];
        $naam   = (string)$row['Gebruikersnaam'];
        $foto   = (string)$row['ProfielFoto'];

        if ($naam === (string)$current) { $check_ = false; }
        if (in_array($naam, $vrienden, true)) { $check_ = false; }
        if ($naam === (string)($gebruikersnaam_ ?? '')) { $check_ = false; }
        if (strlen((string)($gebruikersnaam_ ?? '')) <= 1) { $check_ = false; }

        if ($check_) {
            $r4 = db_one($conn, 'SELECT UNIQ FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', $naam);
            $IDDB = $r4 !== null ? (string)$r4['UNIQ'] : '';
            if ($IDDB !== '' && in_array($IDDB, $SendUsers, true)) {
                $check_ = false;
            }
        }

        $liveFoto = strlen($foto) <= 1 ? 'g' . $gender . '.jpg' : $foto;
        $cls = ($remainder === 0) ? 'VriendVak' : 'VriendVak backgroundV';
        echo "<div class='" . e($cls) . "'>" .
               "<img src='pic/profilepics/" . e($liveFoto) . "' class='profielVriend'>" .
               "<div class='vriendText blauw underline'>" . e($naam) . "</div>";
        if ($check_) {
            echo "<form method='post' class='voegF'>";
            csrf_field();
            echo "<button class='addV' type='submit' value='" . e($naam) . "' name='buttonSU'>" .
                   "<i class='fa fa-plus-circle blauw'></i>" .
                   "<span class='blauw underline'>Vriend Toevoegen</span>" .
                 "</button>" .
               "</form>";
        }
        echo "</div>";
    }
  ?>
</div>
