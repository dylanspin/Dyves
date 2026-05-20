<div class="Delete">
  <?php
    require_once __DIR__ . '/bootstrap.php';
    require_once __DIR__ . '/connect.php';

    $row = db_one($conn, 'SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = ? LIMIT 1', 's', (string)$current);
    $vrienden = $row !== null ? dyves_decode($row['Vrienden']) : [];

    if (isset($_POST['Delete'])) {
        csrf_check();
        if (!is_numeric($_POST['Delete'])) {
            return;
        }
        $welk = (int)$_POST['Delete'];
        if (!isset($vrienden[$welk])) {
            return;
        }
        $friendName = (string)$vrienden[$welk];

        $row2 = db_one($conn, 'SELECT UNIQ FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', $friendName);
        $naamGo = $row2 !== null ? (string)$row2['UNIQ'] : '';

        $row3 = db_one($conn, 'SELECT Vrienden FROM `allfriends` WHERE Gebruikersnaam = ? LIMIT 1', 's', $naamGo);
        $vriendenDEL = $row3 !== null ? dyves_decode($row3['Vrienden']) : [];

        $vriendenDEL = array_values(array_filter($vriendenDEL, fn($v) => (string)$v !== (string)$gebruikersnaam_));
        unset($vrienden[$welk]);
        $vrienden = array_values($vrienden);

        if (db_query($conn, 'UPDATE `allfriends` SET `Vrienden` = ? WHERE Gebruikersnaam = ?', 'ss', dyves_encode($vrienden), (string)$current)) {
            db_query($conn, 'UPDATE `allfriends` SET `Vrienden` = ? WHERE Gebruikersnaam = ?', 'ss', dyves_encode($vriendenDEL), $naamGo);
        }
        if (function_exists('reloadPost')) {
            reloadPost();
        }
    }

    for ($i = 0; $i < count($vrienden); $i++) {
        $friendName = (string)$vrienden[$i];
        $row = db_one($conn, 'SELECT ProfielFoto, Man FROM `notusers` WHERE Gebruikersnaam = ? LIMIT 1', 's', $friendName);
        $foto_   = $row['ProfielFoto'] ?? '';
        $gender_ = $row['Man']         ?? 0;
        $liveFoto = strlen((string)$foto_) <= 1 ? 'g' . $gender_ . '.jpg' : (string)$foto_;

        echo "<form class='vriend' method='post'>" .
             '<input type="hidden" name="_csrf" value="' . e(csrf_token()) . '">' .
             "<button type='button' class='vriendenButton' id='" . e($i) . "' onclick='zeker(this)'>" .
             "<img src='pic/profilepics/" . e($liveFoto) . "' class='vriendenImage'>" .
             "<button name='Delete' class='ZekerDelete' value='" . e($i) . "' id='t" . e($i) . "'>Delete</button>" .
             "</button>" .
             "<div class='profielkleur deletenaam'>" . e($friendName) . "</div>" .
             "</form>";
    }
  ?>
</div>
