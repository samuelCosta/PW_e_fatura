<?php
$to = 'hugo.555@hotmail.com';
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = 'andre_torres_619@hotmail.com';
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>