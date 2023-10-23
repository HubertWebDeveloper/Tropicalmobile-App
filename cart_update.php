<?php
include_once 'includes/connection.php';
if(isset($_GET['cart_id'])){
    $id = $_GET['cart_id'];

    $select = mysqli_query($con, "SELECT * FROM cart_pending WHERE id='$id'");
    $row = mysqli_fetch_assoc($select);

    $name = $row['product_title'];
    $qty = $row['qty'];

    $select2 = mysqli_query($con, "SELECT * FROM products WHERE name='$name'");
    $row2 = mysqli_fetch_assoc($select2);

    $remain = $row2['remain'];


    $total = $remain + $qty; 

    $update = mysqli_query($con, "UPDATE `products` SET `remain`='$total',`status`='InStock' WHERE name='$name'");
    if($update){
        $delete = mysqli_query($con, "DELETE FROM cart_pending WHERE id=$id");
        if($delete){
            echo "<script>window.open('cart.php','_self')</script>";
        }else{
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
    
}
?>