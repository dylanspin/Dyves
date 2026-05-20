<?php
require_once __DIR__ . '/bootstrap.php';

if (!isset($_POST['wachtwoordVer'])) {
    return;
}
csrf_check();

$cfg  = dyves_config();
$to   = (string)($cfg['mail']['to']   ?? '');
$from = (string)($cfg['mail']['from'] ?? '');
if ($to === '' || $from === '') {
    return;
}

$subject  = 'Form submission';
$subject2 = 'Copy of your form submission';
$message  = $from . " wrote the following:\n\nDit is een test email beter werkt dit";
$message2 = "Here is a copy of your message\n\nDit is een test email beter werkt dit";

$headers  = 'From:' . $from;
$headers2 = 'From:' . $to;
@mail($to,   $subject,  $message,  $headers);
@mail($from, $subject2, $message2, $headers2);

echo 'Mail verzonden, check uw email voor de verificatie';
header('Location: ' . $_SERVER['PHP_SELF']);
exit;
