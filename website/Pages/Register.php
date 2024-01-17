<?php
session_start();
require_once("../Database/Database.class.php");
require_once("../Database/Login.class.php");
require("../Include/Nav.php");

$register = new Login(new Database());

// Make variables
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";


if (isset($_POST["register"])) {
    $register->Register($username, $password, $email);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registeren.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
    <form method="POST">
        <?php
        // Check if message is set in Login class
        if (isset($register->message)) {
            echo $register->message;
        }
        ?>
        <h1>Register</h1>
        <div class="form-group">
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
       
        <input type="email" name="email" placeholder="Email"><br><br>
        </div>
        <input type="submit" class="button1" name="register" value="Register">
        <a href="Login.php">Login</a>
        </div>
    </form>
</body>

</html>
