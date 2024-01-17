<?php
session_start();
// Check if the user is logged in as an admin, if not then redirect him to login page
if (!isset($_SESSION["admin"])) {
    header("Location: ../Pages/Home.php");
}

require_once("../Database/Database.class.php");
require_once("../Database/Login.class.php");

$getData = new GetData(new Database());
$login = new Login(new Database());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php
    require_once("../Include/Nav.php");
    ?>
    <div>
        <h1>HOI <?php echo $_SESSION["user_name"]; ?></h1>
    </div>
    <form method="post">

    </form>

    <?php
    require_once("../Include/Footer.php");
    ?>
</body>

</html>