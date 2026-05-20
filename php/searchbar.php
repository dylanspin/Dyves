<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/block.php';

if (isset($_POST['zoeken'])) {
    csrf_check();
    $_SESSION['zoek'] = isset($_POST['zoekinfor']) ? trim((string)$_POST['zoekinfor']) : '';
}
