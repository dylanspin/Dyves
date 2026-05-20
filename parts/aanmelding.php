
<?php
    require_once __DIR__ . '/../php/bootstrap.php';
    $checkwachtwoord = $_SESSION['wachtwoordCheck'] ?? '';
    if ($checkwachtwoord !== 'true') {
        $token = e(csrf_token());
        echo "
        <form class='aanmelden iphone' id='aanmeldVak' method='post'>
            <input type='hidden' name='_csrf' value='$token'>
            <button type='submit' name='Aanmelden' class='aanmelden_button'>
              Geen account? Meld je gratis aan!
            </button><br>
            <button class='inlog_ver'>
              <span class='blauw'>Vragen of hulp nodig ?</span>
            </button>
        </form>";
    }
?>
