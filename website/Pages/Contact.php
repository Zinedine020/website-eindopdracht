<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registeren.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Contact</title>
</head>

<body>
    <?php require("../Include/Nav.php"); ?>

    <div class="container">
        <!-- Contact Left -->
        <div class="form-group">
            <h1>Let's Chat</h1>
            <p>
                Do you have a question or simple want to contact.
                Feel free to send me a message in the contact form
            </p>

        </div>
        <!-- Contact Right -->
        <div class="form-group">
            <h1>Contact</h1>
            <form method="post">
                <p>*Required</p>
                <input type="text" name="name" placeholder="Your Name*" required><br>
                <input type="email" name="email" placeholder="Your Email*" required><br>
                <input type="text" name="subject" placeholder="Your Subject*" required><br>
                <textarea name="message" rows="4" class="bericht" placeholder="Your Message*"></textarea><br>
                <button type="submit" class="button1">Send Message</button>
            </form>
        </div>
    </div>
</body>

</html>