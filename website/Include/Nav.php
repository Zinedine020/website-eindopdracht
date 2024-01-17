<?php
require_once("../Database/Database.class.php");
require_once("../Database/GetData.class.php");

$getData = new GetData(new Database());

// Get product by id
if (isset($_SESSION["user_id"])) {
    $id = [
        "user_id" => $_SESSION["user_id"]
    ];
    $cart = $getData->getCart($id);
} else {
    $cart = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
   
</head>

<body>
<nav>
    <div class="svg-container">
        <div class="menu">
            <ul><a href="../Pages/Home.php" id="vehicle">Home</a></ul>
            <ul><a href="../Pages/Vehicle.php" id="vehicle">Voertuigen</a></ul>
            <ul><a href="../Pages/Contact.php" id="contact">Contact</a></ul>
            <ul><a href="../Pages/over_ons.php" id="aboutus">Over ons</a></ul>
            <ul><a href="../Pages/addcar.php" id="aboutus">voeg auto</a></ul>


            <?php if (isset($_SESSION["user_name"])) { ?>
                <!-- User is logged in -->
                <div class="dropdown" id="dropdown">
                    <div class="user" id="user">
                        
                    </div>
                    <!-- Dropdown -->
                    <ul id="dropdown-content">
    <li><a href="../Pages/Profile.php">Profiel</a></li>
    <li><a href="../Pages/Logout.php">Uitloggen</a></li>
</ul>
                </div>
            <?php } else { ?>
                <!-- User is not logged in -->
                <ul><a href="../Pages/Login.php">Inloggen</a></ul>
            <?php } ?>

        </div>
    </div>
</nav>

    <script src="../Assets/JS/script.js"></script>
</body>

</html>