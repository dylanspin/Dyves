<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/connect.php';

function reload() {
    echo "<script>
            if (window.history.replaceState) {
              window.history.replaceState(null, null, window.location.href);
              location.reload(true);
            }
          </script>";
}

if (!isset($_POST['Post'])) {
    return;
}
if (!is_admin($_SESSION['nu'] ?? '')) {
    http_response_code(403);
    return;
}
csrf_check();

$PollTitle  = (string)($_POST['PollTitle'] ?? '');
$PollStatus = (string)($_POST['AanPoll']   ?? '');
$vragen = [
    (string)($_POST['Vraag1'] ?? ''),
    (string)($_POST['Vraag2'] ?? ''),
    (string)($_POST['Vraag3'] ?? ''),
    (string)($_POST['Vraag4'] ?? ''),
];
$compresvragen = dyves_encode($vragen);

db_query(
    $conn,
    'INSERT INTO `poll` (`Naam`,`Status`,`Vragen`) VALUES (?, ?, ?)',
    'sss',
    $PollTitle, $PollStatus, $compresvragen
);
reload();
