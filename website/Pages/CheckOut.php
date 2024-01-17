<?php

session_start();
require_once("../Database/Database.class.php");

if (!isset($_GET["productid"])) {
    header("Location: Vehicle.php");
    exit();
}

if (isset($_POST["checkout"])) {
    // Handle form submission
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $productID = $_GET["productid"];

    // Perform necessary validation on form data here

    // Insert order details into the Orders table
    $userID = $_SESSION["user_id"]; // Assuming you have a user ID stored in the session
    $sql = "INSERT INTO bestel (order_id, name, email, phone, address, city, state, zip) 
            VALUES ($orderID, '$name', '$email', '$phone', '$address', '$city', '$state', '$zip')";

    if ($result = $database->query($sql)) {
        // Order successfully inserted
        header("Location: OrderConfirmation.php"); // Redirect to a confirmation page
        exit();
    } else {
        // Handle database error
        echo "Error: " . $database->error;
        

      
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registeren.css">
    <title>Check out</title>
</head>

<body>
    <?php require("../Include/Nav.php"); ?>
    <!-- BUY -->
    <div class="form-group">
        <h1 class="witte">Check out</h1>
        <form action="Order.php?productid=<?php echo $_GET['productid']; ?>" method="post">
            <input type="text" name="name" placeholder="Name*">
            <input type="text" name="email" placeholder="Email*">
            <input type="number" name="phone" placeholder="Phone*">
            <input type="text" name="address" placeholder="Address*">
            <input type="text" name="city" placeholder="City*">
            <input type="text" name="state" placeholder="State*">
            <input type="text" name="zip" placeholder="Zip*">
            <button name="checkout">Check Out</button">
        </form>
    </div>
    <!-- RENT -->
 
</body>

</html>