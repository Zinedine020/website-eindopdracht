<?php
session_start();
require_once("../Database/Database.class.php");
require_once("../Database/Login.class.php");
require("../Include/Nav.php");



// Make variables
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

// Make object of Login whit the database
$login = new Login(new Database());

// Check if the user is logged in
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login->Login($username, $password);
}

if (isset($_POST["register"])) {
    header("Location: ../Pages/Register.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="../css/registeren.css">
</head>
<body>

<body>
<div class="container">
    <form method="POST" class="login-form">
        <?php
        // Check if message is set in Login class
        if (isset($login->message)) {
            echo $login->message;
        }
        ?>


        
        <h2>Login</h2>
        <div class="form-group">
        <input type="text" name="username" placeholder="Username"><br><br>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password"><br><br>
    </div>
    

            <input type="submit" name="login" value="LOGIN" class="button1">
            <a href="register.php" class="regist">Registeren</a>
       
       
    </form>
</body>

</html>
