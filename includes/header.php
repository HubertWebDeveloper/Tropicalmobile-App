<?php
include("includes/connection.php");
if(!isset($_SESSION['email'])){

    echo "<script>window.open('index.php','_self')</script>";
    
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropical Brands</title>
    <link href="myLogo.png" rel="icon">
    <link href="myLogo.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" 
    integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" 
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
<!-- header section starts  -->

<header>

    <a href="#" class="logo">Tropical Brands<span>.</span></a>

    <form action="search.php" class="search" method="POST">
        <input type="search" name="type" placeholder="search here...">
        <button style="background:none" type="submit" name="search"><i class="fas fa-search" style="color:white;font-size:20px;margin-right:10px"></i></button>
    </form>

    <div class="icons">
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        <a href="history.php" class="fas fa-undo"></a>
        <a style="background:red" href="logout.php" class="fas fa-power-off"></a>
    </div>

</header>

<!-- header section ends -->