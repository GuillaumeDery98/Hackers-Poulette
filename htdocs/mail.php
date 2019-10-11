<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

$from = "no-reply@poulette.be";

$to = $mail;

$subject = "Confirmation Hackers Poulette";

$message = "Votre requête a bien étée envoyée au service concerné";

$headers = "From:" . $from;

mail($to, $subject, $message, $headers);

echo " Un email de confirmation à été envoyé à l'adresse ";
echo $mail;
