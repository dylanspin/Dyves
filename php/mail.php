
<?php
    include 'block.php';
    $button2 = $_POST['wachtwoordVer']; //krijgt de button

    if(isset($button2)){
        $to = "dylanspin100@hotmail.com";
        $from  = "dylanspin@takties.nl";
        $subject = "Form submission";
        $subject2 = "Copy of your form submission";
        $message = $from . " wrote the following:" . "\n\n" . "Dit is een test email beter werkt dit";
        $message2 = "Here is a copy of your message " . $first_name . "\n\n" . "Dit is een test email beter werkt dit";

        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        mail($from,$subject2,$message2,$headers2);
        echo "Mail verzonden Bedankt " . $from . ", check U email voor de verificatie";
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
    }

 ?>
