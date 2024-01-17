<?php
session_start();
require_once("../Database/Database.class.php");
require_once("../Database/GetData.class.php");
require_once("../Database/Order.class.php");

$getData = new GetData(new Database());
$buy = $getData->getProduct(null, "buy");
$rent = $getData->getProduct(null, "rent");
$order = new Order();

// Add to cart
if (isset($_POST["add"])) {
    if (isset($_SESSION["user_id"])) {
        $data = [
            "user_id" => $_SESSION["user_id"],
            "product_id" => $_POST["productid"],
        ];
        $order->AddToCart($data);
    } else {
        header("Location: ../Pages/Login.php");
    }
}

// Buy the car
if (isset($_POST["buy"])) {
    if (isset($_SESSION["user_id"])) {
        header("Location: ../Pages/CheckOut.php?productid=" . $_POST["productid"]);
    } else {
        header("Location: ../Pages/Login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/websi.css">
    <title>Vehicles</title>
</head>

<body>
    <?php
    require("../Include/Nav.php");
    ?>
    <div class="vehicle-container">
        <h1>Vehicles</h1>

        <div class="car-choose">
            <button id="buy">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                </svg>
                Buy
            </button>
            <button id="rent">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                </svg>
                Rent
            </button>
        </div>
        <h2>
            <?php if (isset($order->message)) {
                echo $order->message;
            }
            ?>
        </h2>
        <div class="car-buy" style="display: none" id="car-buy">
            <h1>BUY VEHICLES</h1>
            <!-- Producten -->
            <?php
            foreach ($buy as $product) {
            ?>
                <div class="product">
                    <h1><?= $product["product_name"] ?></h1>
                    <img class="product-img" src="../Assets/img/<?= $product["product_img"] ?>">
                    <span>
                        <form method="post">
                        <p class="witte">€<?= $product["price_product"] ?></p>
                            <button name="add">Add to Favorite</button>
                            <button name="buy">Buy Now</button>
                            <input type="hidden" name="productid" value="<?= $product["product_id"] ?>">
                            

                        </form>
                    </span>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="car-rent" style="display: none" id="car-rent">
            <h1>RENT VEHICLES</h1>
            <!-- Producten -->
            <?php
            foreach ($rent as $product) {
            ?>
                <div class="product">
            <h1><?= $product["product_name"] ?></h1>
            <img class="product-img" src="../Assets/img/<?= $product["product_img"] ?>">
            <p class="witte">€<?= $product["price_product"] ?> Per Day</p>
            <button type="submit" name="rent">
                <a href="Rent.php?productid=<?= $product["product_id"] ?>">Rent Now</a>
            </button>
        </div>
  
</span>
                </div>
            <?php
            }
            ?>
        </div>
        <?php
        // Additional scripts or content
        ?>
<script src="../Assets/JS/script.js"></script>
<script>
    console.log("Script executed successfully");
</script>    </body>
</html>  
