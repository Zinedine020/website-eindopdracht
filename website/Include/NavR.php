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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/CSS/sp.css">
    <title>NAV</title>
</head>

<body>
    <nav>
        <!-- Logo -->
        <ul class="logo"><a href="Home.php"><img src="../Assets/img/logo.png"></a></ul>

        <!-- Menu -->
        <div class="menu">
            <ul><a href="../Pages/Vehicle.php" id="vehicle">Vehicles</a></ul>
            <ul><a href="../Pages/Contact.php" id="contatct">Contact</a></ul>
            <ul><a href="../Pages/AboutUse.php" id="aboutus">About Us</a></ul>
        </div>
        <!-- Search Bar -->
        <!-- <ul class="searchbar"><input type="text" placeholder="Search"><svg class="search" xmlns="http://www.w3.org/2000/svg" swidth="50" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg></ul> -->


        <!-- Inloggen -->
        <!-- check if the user is Login -->
        <?php if (isset($_SESSION["user_name"])) {
        ?>
            <!-- User -->
            <?php
            ?>
            <div class="dropdown" id="dropdown">
                <div class="user" id="user">
                    <img src="../Assets/img/user/default.png">
                </div>
                <!-- Dropdown -->

                <ul id="dropdown-content">
                    <li><a href="../Pages/Profile.php">Profiel</a></li>
                    <li><a href="../Pages/Logout.php">Uitloggen</a></li>
                </ul>
            </div>
        <?php
        } else {
        ?>
            <ul><a href="../Pages/Login.php">Inloggen</a></ul>
        <?php
        }
        ?>

        <!-- Hamburger menu -->
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
    <script src="../Assets/JS/script.js"></script>
</body>

</html>