<?php
session_start();
require_once("../Database/Database.class.php");
require_once("../Database/GetData.class.php");
require_once("../Database/Order.class.php");

$db = new Database();

$cars = $db->mu();

if (isset($_GET['search'])) {
    $cars = $db->searchCars($_GET['search']);
} else {
}

if ($cars) {
    foreach ($cars as $car) {
        $imageurl = "images/" . $car['image'];
        echo "<div class='car-details'>";
        echo "<h2>{$car['Merk']} {$car['Model']}</h2>";
        echo "<div class='image-container'>";
        echo "<img class='autoss' src='{$imageurl}' alt='{$car['Merk']} {$car['Model']}'>";
        echo "</div>";
        echo "<p>Year: {$car['Jaar']}</p>";
        echo "<p>Kenteken: {$car['Kenteken']}</p>";

        echo "<div class='add-car-button-container'>";
        echo "<a href='rserveerformuli.php?id={$car['AutoID']}' class='add-car-button'>Reserveren</a>";
        echo "</div>";
        echo "</div>";
    }
}
?>

