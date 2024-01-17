<?php
session_start();
require_once("../Database/Database.class.php");
require_once("../Database/GetData.class.php");

$db = new Database();
$getData = new GetData(new Database());
$getUser = $getData->getUser($_SESSION["user_name"]);

if (isset($_POST["save-name"])) {
    $db->Profile($getUser["user_id"], "user_name = :user_name", ["user_name" => $_POST["username"]]);
}
if (isset($_POST["save-email"])) {
    $db->Profile($getUser["user_id"], "user_email = :user_email", ["user_email" => $_POST["useremail"]]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/sp.css">
    <title>MU</title>
</head>

<body>
    <?php
    require("../Include/Nav.php");
    ?>
    <h1>Profile</h1>
    <?php
    if (isset($db->message)) {
        echo $db->message;
    }
    ?>
    <div class="profile-user">
        <div>
            <img class="user" src="../Assets/img/user/<?php if (isset($getUser["user_img"])) {
                                                            echo $getUser["user_img"];
                                                        } else {
                                                            echo "default.png";
                                                        }
                                                        ?>" alt="user">
        </div>
        <div class="profile-details">
            <form method="post">
                <h2><span>Username:</span><span id="username"><?php echo $getUser["user_name"]; ?></span></h2>
                <button name="save-name" style="display: none;" id="save-name">Save</button>
            </form>
        </div>

        <div class="profile-details">
            <form method="post">
                <h2><span>Email:</span><span id="email"><?php echo $getUser["user_email"]; ?></span></h2>
                <button name="save-email" style="display: none;" id="save-email">Save</button>
            </form>
        </div>
    </div>
   
    <script src="../Assets/JS/script.js"></script>
</body>

</html>