<?php
require_once("../Database/Database.class.php");
require_once("../Database/Login.class.php");
include("../Include/Nav.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['brand'])) {
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $license_plate = $_POST['license_plate'];
        $availability = isset($_POST['availability']) ? 1 : 0;
        $daily_price = $_POST['daily_price'];

        // Check if a file was uploaded
        if (isset($_FILES['car_picture']) && $_FILES['car_picture']['error'] == 0) {
            // Get the uploaded image
            $image = ($_FILES['car_picture']['tmp_name']);
            $fileContent = file_get_contents($image);
            $image = base64_encode($fileContent);
        } else {
            // If no file was uploaded, set a default image or handle the case as needed
            $image = base64_encode(file_get_contents('default_image.jpg'));
        }

        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "Zinedine020";
        $dbname = "MU";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL query
        $stmt = $conn->prepare("INSERT INTO Producten (product_name, price_product, product_description, product_img, rent_buy, categories_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdsdsi", $brand, $daily_price, $model, $image, $availability, $categories_id);

        // Assuming $categories_id needs to be set based on your application logic

        // Execute the query
        $stmt->execute();

        // Close statement and connection
        $stmt->close();
        $conn->close();

        echo "Car added successfully.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel - Add Car</title>
    <link rel="stylesheet" href="../css/registeren.css">
</head>

<body>
    <div class="form-group">
    
    <form action="addcar.php" method="POST" enctype="multipart/form-data">
        <h2 style="text-align: center;">Add a New Car</h2>
       
        <input type="text" name="brand" placeholder="Brand" required><br><br>

        <input type="text" name="model" placeholder="Model" required><br><br>

        <input type="number" name="year" placeholder="Year" required><br><br>

        <input type="text" name="license_plate" placeholder="License Plate" required><br><br>

        <label>Availability</label>
        <input type="checkbox" name="availability" placeholder="Availability" checked><br><br>

        <input type="number" name="daily_price" placeholder="Daily Price" step="0.01"><br><br>

        <label>Upload Picture:</label>
        <input type="file" name="car_picture" accept="image/*"><br><br>

        <input type="submit" value="Add Car">
    </form>
    </html>