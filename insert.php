<?php
include_once 'includes/connection.php';
if(!isset($_SESSION['email'])){

    echo "<script>window.open('index.php','_self')</script>";
    
}else{
    if(isset($_GET['prod_id'])){
        $id = $_GET['prod_id'];

        $change = mysqli_query($con, "SELECT * FROM products WHERE id='$id'");
        $row = mysqli_fetch_assoc($change);

        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];
        $remain = $row['remain'];
        $qty = $_POST['qty'];
        $total = $price * $qty;

        if($change){
            $select = mysqli_query($con, "SELECT * FROM cart_pending WHERE customer_email='{$_SESSION['email']}' AND product_title='$name'");
            $count = mysqli_num_rows($select);
            if($count == 1){
                $qty2 = $qty + 1;
                $total2 = $qty2 * $price;
                $insert = mysqli_query($con, "UPDATE `cart_pending` SET `qty`='$qty2',`total`='$total2' WHERE product_title='$name' AND customer_email='{$_SESSION['email']}'");
                if($insert){
                    // echo "<script>alert('Cart Updated.')</script>";
                   echo "<script>window.open('cart.php','_self')</script>";
                }else{
                   echo "<script>alert('Something Went Wrong')</script>";
                }
            }else{
                $insert2 = mysqli_query($con, "INSERT INTO `cart_pending`(`customer_email`, `product_title`, `product_image`, `price`, `qty`, `product_remain`, `total`, `status`) 
                VALUES ('{$_SESSION['email']}','$name','$image','$price','$qty','$remain','$total','pending')");
                if($insert2){
                    // echo "<script>alert('Product Added to Cart.')</script>";
                   echo "<script>window.open('cart.php','_self')</script>";
                }else{
                   echo "<script>alert('Something Went Wrong')</script>";
                }
            }
            
        }else{
            echo "<script>alert('Something went wrong')</script>";
        }
    }
    if(isset($_POST['add_to_cart'])){

        $title = $_POST['title'];
        $price = $_POST['price'];
        $qty = $_POST['select_qty'];

        $change = mysqli_query($con, "SELECT * FROM products WHERE name='$title'");
        $row = mysqli_fetch_assoc($change);
        $product_remain = $row['remain'];

        $remain = $product_remain - $qty;
        if($remain == 0){
            $status = "OutStock";
        }else{
            $status = "InStock";
        }

        $image = $_POST['image'];
        $total = $price * $qty;

        // echo "$title $price  $qty $remain";
            $select = mysqli_query($con, "SELECT * FROM cart_pending WHERE customer_email='{$_SESSION['email']}' AND product_title='$title'");
            $count = mysqli_num_rows($select);
            if($count == 1){
                $qty_row = mysqli_fetch_assoc($select);
                $qty_add = $qty_row['product_remain'];
                $qty2 = $qty_add + $qty;
                $total2 = $qty2 * $price;
                $insert = mysqli_query($con, "UPDATE `cart_pending` SET `qty`='$qty2',`total`='$total2' WHERE product_title='$title' AND customer_email='{$_SESSION['email']}'");
                if($insert){
                    // echo "<script>alert('Cart Updated.')</script>";
                   echo "<script>window.open('cart.php','_self')</script>";
                }else{
                   echo "<script>alert('Something Went Wrong')</script>";
                }
            }else{
                $insert2 = mysqli_query($con, "INSERT INTO `cart_pending`(`customer_email`, `product_title`, `product_image`, `price`, `qty`, `product_remain`, `total`, `status`) 
                VALUES ('{$_SESSION['email']}','$title','$image','$price','$qty','$remain','$total','pending')");
                if($insert2){
                    $update = mysqli_query($con, "UPDATE `products` SET `remain`='$remain',`status`='$status' WHERE name='$title'");
                    // echo "<script>alert('Product Added to Cart.')</script>";
                   echo "<script>window.open('cart.php','_self')</script>";
                }else{
                   echo "<script>alert('Something Went Wrong')</script>";
                }
            }
    }
}
?>