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

$ArtikelTitle  = (string)($_POST['ArtikelTitle']  ?? '');
$ArtikelText   = (string)($_POST['ArtikelText']   ?? '');
$ArtikelLabel  = (string)($_POST['ArtikelLabel']  ?? '');
$ArtikelStatus = (string)($_POST['ArtikelStatus'] ?? '');

$naamFoto = dyves_upload_image('artikel_foto', __DIR__ . '/../pic/artikels');
if ($naamFoto === null) {
    $naamFoto = '';
}

db_query(
    $conn,
    'INSERT INTO `artikels` (`Artikel`,`Text_`,`Label`,`Img`,`Status`) VALUES (?, ?, ?, ?, ?)',
    'sssss',
    $ArtikelTitle, $ArtikelText, $ArtikelLabel, $naamFoto, $ArtikelStatus
);
reload();
