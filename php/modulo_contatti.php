<?php
/*------------------------------------------------------------------------
                        MODULO DI CONTATTO
--------------------------------------------------------------------------*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "your_email@example.com"; // Replace with your email
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $body)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>