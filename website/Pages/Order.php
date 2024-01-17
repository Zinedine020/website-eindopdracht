<?php
session_start();
require_once("../Database/Database.class.php");
require_once("../Database/GetData.class.php");
require_once("../Database/Order.class.php");


if (isset($_GET["productid"]) && isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
} else {
    header("Location: ../Pages/CheckOut.php");
}

$getData = new GetData(new Database);
$car = $getData->getProduct($_GET["productid"]);

// Check if the order form is submitted
if (isset($_POST['order'])) {
    // Assuming you have a user_id and product_id available
    $user_id = 1;  // Replace with the actual user_id
    $product_id = $_GET["productid"];

    // Insert the order into the bestel table
    $order = new Order(new Database);
    $order->placeOrder([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':address' => $address,
        ':city' => $city,
        ':state' => $state,
        ':zip' => $zip
    ]);

    // Redirect to a confirmation page or any other appropriate action
    header("Location: confirmation.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Place</title>
</head>

<body>
    <?php
    require("../Include/Nav.php");
    ?>
    <h1 class="title">Order Place</h1>
    <div class="order">
    <form class="order-form" method="POST">



            <h3>Deleivery Adress</h3>
            <div class="details">
                
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Name*" value="<?php echo $name; ?>">
                <label for="email">Email:</label>
                <input type="text" name="email" placeholder="Email*" value="<?php echo $email; ?>">
                <label for="phone">Phone:</label>
                <input type="number" name="phone" placeholder="Phone*" value="<?php echo $phone; ?>">
                <label for="address">Address:</label>
                <input type="text" name="address" placeholder="Address*" value="<?php echo $address; ?>">
                <label for="city">City:</label>
                <input type="text" name="city" placeholder="City*" value="<?php echo $city; ?>">
                <label for="state">State:</label>
                <input type="text" name="state" placeholder="State*" value="<?php echo $state; ?>">
                <label for="zip">Zip:</label>
                <input type="text" name="zip" placeholder="Zip*" value="<?php echo $zip; ?>">

                
</div>
        </form>
        <div class="payment">
            <h3>Payment</h3>
            <div class="total-price">
                <img src="../Assets/img/<?php echo $car["product_img"]; ?>" alt="car" class="car-img">
                <p>
                    <?php
                    echo $car["product_name"];
                    ?>
                </p>
                <div class="price">
                    <h3>Total:</h3>
                    <h4>
                        €
                        <?php
                        echo $car["price_product"];
                        ?>
                    </h4>
                </div>
            </div>
            <div class="payment-choices">
                <select name="payment-methods">
                    <option value="cash">Cash</option>
                    <option value="ideal">IDEAL</option>
                    <option value="visa">VISA</option>
                </select>
                <form action="Finish.php">
                <button name="order" value="submit">Order</button>

                </form>
            </div>
        </div>
    </div>
    
</body>

</html>