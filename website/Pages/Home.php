<?php
require_once("../Database/Database.class.php");
require_once("../Database/Login.class.php");
include("../Include/Nav.php");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
    <link rel="stylesheet" href="../css/websi.css">
    <title>Home</title>
</head>
<body> 


<h1 class="Welkom">Welkom bij  Sports & Luxury Car Rental</h1>
<p class="Begin">Begin van een ultieme voertuig ervaring </p>
   <a href="vehicle.php"> <button class="button1">Rent</button> </a>
            
       <div>  
 
    <div class="plaatjess">
        <figure>
          
           <a href="../Pages/Vehicle.php"><img class="plaatjess" src="../Assets/img/rs6.png" alt=""></a> 
            <figcaption>Sport Cars</figcaption>
        </figure>
        <figure>
          <a href="../Pages/Vehicle.php">  <img class="plaatjess" src="../Assets/img/merc.png" alt=""></a>
            <figcaption>Luxury Cars</figcaption>
        </figure>
        
        
       </div>
  </div>
    <script>
function showRegistrationForm() {
    document.getElementById("registreren-form").style.display = "block";
    document.getElementById("login-form").style.display = "none";
}

function showLoginForm() {
    document.getElementById("registreren-form").style.display = "none";
    document.getElementById("login-form").style.display = "block";
}
</script>

</body>
</html>
