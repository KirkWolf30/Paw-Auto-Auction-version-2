
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif/png" href="images/build/logo.png">
    <title>Paw Auto Auction</title>
    <link rel="stylesheet" href="Bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/1ed5841aba.js" crossorigin="anonymous"></script>    
<script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>


</head>
<body class="dark">

<nav class="navbar fixed-top dark">
  <div class="container">
    <a class="navbar-brand" href="home.php">
    <img src="Images/build/logo.png" alt="" class="img-fluid logo">
    </a>

    <form action="Includes/Logout.php" method="POST" >

<button class=" mx-2"> <i class="fas fa-sign-out-alt logs"></i> </button>

</form>

  </div>
</nav>

<div class=" container text-center my-4 py-5 align-items-center" >


<form action="Search_Page.php" method="POST" >

<input type="text" name="Search_Input" id="Search" class="py-2 px-3 mr-2" placeholder="Search Items Here">


<button type="submit" name="search">

<lord-icon
    src="https://cdn.lordicon.com//msoeawqm.json"
    trigger="hover"
    colors="primary:#34d761,secondary:#e5e5e5"
    style="width: 35px;height:35px;">
</lord-icon>

</button>

</form>




</div>

