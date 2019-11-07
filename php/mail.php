
<?php
$button2 = $_POST['wachtwoordVer']; //krijgt de button

if(isset($button2)){
    $to = "dylanspin100@hotmail.com"; // this is your Email address
    $from  = "dylanspin@takties.nl"; // this is the sender's Email address
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $from . " wrote the following:" . "\n\n" . "Dit is een test email beter werkt dit";
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . "Dit is een test email beter werkt dit";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $from . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
}


 ?>
