<?php 
include("includes/header.php");
if(!isset($_SESSION['email'])){
echo "<script>window.open('index.php','_self')</script>"; 
}
?>
<?php 
include("includes/sidebar.php"); 
?>
<a href="home.php" class="btn">Continue Shopping</a>
<style>
    .cart{
        height:100%;margin-bottom:50px;
        border-bottom: 5px solid red;
        padding-bottom:50px;
        width:500px;
        border-bottom-width: thin;
    }
    .cart img{
        width:150px;height:150px;
        border-radius: 100px;
    }
    .cart h2{
        margin-top:-130px;margin-left:150px;
    }
    .cart p{
        margin-left:150px;
        color:#212F3C;
        font-size:15px;
    }
    .cart input{
        width:50px;text-align:center;
        border-radius: .5rem;
        box-shadow: 0px 1px 1px 0px black;
    }
    .cart form{
        margin-left:150px;
        margin-top:3px;
    }
    .pt{
        margin-left:50%;
        margin-top:-40px;
        font-size:20px;
        margin-bottom:50px;
        border:2px solid;
    }
    .price-details{
        font-size:20px;
    }
    .pt h4{
        color:#929295;
        border:1px solid;
    }
    .res{
        margin-left:150px;
        margin-top:-60px;
        color:#929295;

    }
    .form1{
        margin-top:-150px;
        margin-left:30px;
        border: 2px solid black;
        width:400px;
        margin-bottom:50px;
        align-items:center;
    }
    .form1 input{
        outline: none;
        margin-bottom: 15px;
        font-size: 16px;
        color: #999;
        text-align: left;
        padding: 14px 20px;
        width: 70%;
        margin-left:60px;
        display: inline-block;
        box-sizing: border-box;
        border: none;
        outline: none;
        background: transparent;
        border: 1px solid blue;
        transition: 0.3s all ease;
    }
    .form1 h1{
        color: var(--orange);
        margin-left:50px;
    }
    .form1 button{
        color:black;
        border-radius:10px;
        height:30px;
        border: 1px solid var(--orange);
        width:150px;
        background:white;
        margin-left:100px;
    }
    .form1 button:hover{
        color:white;
        background:var(--orange);
    }




















@media (max-width:991px){

    .form1{
        margin-left:5px;
        width:240px;
        margin-top:-165px;
    }
    .form1 input{
        margin-left:20px
    }
    .form1 button{
        margin-left:20px;
    }

}

@media (max-width:768px){

    .form1{
        margin-left:5px;
        width:240px;
        margin-top:-165px;
    }
    .form1 input{
        margin-left:20px
    }
    .form1 button{
        margin-left:20px;
    }

}

@media (max-width:450px){

    .form1{
        margin-left:5px;
        width:240px;
        margin-top:-165px;
    }
    .form1 input{
        margin-left:20px
    }
    .form1 button{
        margin-left:20px;
    }

}
</style>
<?php
$select = mysqli_query($con, "SELECT * FROM `cart_pending` WHERE customer_email='{$_SESSION['email']}'");
$count = mysqli_num_rows($select);
if($count > 0){
    while($row = mysqli_fetch_assoc($select)){
        $idd = $row['id'];
        $quantity = $row['product_remain'];
        $price = $row['price'];
        ?>
        <div class="cart">
    <img src="staff/images/<?php echo $row['product_image'] ?>" alt="">
    <h2><?php echo $row['product_title'] ?></h2>
    <p><?php echo $row['price'] ?><b> Ksh</b></p>
    <p style="margin-left:250px;margin-top:10px;color:green;font-size:11px;text-decoration:underline"></p>
    <form action="" class="cls" method="post">
        <input type="hidden" value="<?php echo $idd; ?>" name="id">
        <input type="hidden" value="<?php echo $price; ?>" name="price">
        <b style="font-size:15px">Qty: </b><input style="font-size:20px;font-weight:bold;" type="number" name="quantity" value="<?php echo $row['qty'] ?>" min="1" max="<?php echo $quantity ?>" readonly>
        <a href="cart_update.php?cart_id=<?php echo $idd; ?>" style="margin-left:20px;border:1px solid red;height:30px;font-size:13px" class="btn">Remove</a>
    </form>
    </div>
        <?php
    }
}else{
    ?>
    <i style="width:100%;text-align:center;font-size:150px;color:#212F3C;margin-top:10%" class="fas fa-shopping-cart"></i><br>
    <p style="font-size:20px;width:100%;text-align:center">Your Cart is current Empty!<b style='color:var(--orange);margin-left:10px;margin-right:10px'><a href='home.php'style='color:var(--orange);text-decoration:none'>Go Back</a></b></p>
    <?php  
}
?>
<?php
                // if(isset($_POST['btn'])){
                //     $update_quantity = $_POST['quantity'];
                //     $update_id = $_POST['id'];
                //     $new = mysqli_query($con, "SELECT * FROM cart_pending WHERE id='$idd'");
                //     $new_row = mysqli_fetch_assoc($new);
                //     $pr = $_POST['price'];
                
                //     $tt = $pr * $update_quantity;
                //     mysqli_query($con, "UPDATE `cart_pending` SET qty = '$update_quantity', total = '$tt' WHERE id='$update_id'") or die('query failed');
                //     echo "<script>window.open('cart.php','_self')</script>";
                // }
                // if(isset($_POST['plus'])){
                //     $qty = $_POST['quantity'];
                //     if($qty < $quantity)
                //     {
                //         $qty++;
                //         $update_id = $_POST['id'];
                //         $pr = $_POST['price'];
                
                //         $tt = $pr * $qty;
                //         mysqli_query($con, "UPDATE `cart_pending` SET qty = '$qty', total = '$tt' WHERE id='$update_id'") or die('query failed');
                //         echo "<script>window.open('cart.php','_self')</script>";
                //     }      
                // }
                // if(isset($_POST['minus'])){
                //     $qty2 = $_POST['quantity'];
                //     if($qty2 > 1)
                //     {
                //         $qty2--;
                //         $update_id = $_POST['id'];
                //         $pr2 = $_POST['price'];
                
                //         $tt2 = $pr2 * $qty2;
                //         mysqli_query($con, "UPDATE `cart_pending` SET qty = '$qty2', total = '$tt2' WHERE id='$update_id'") or die('query failed');
                //         echo "<script>window.open('cart.php','_self')</script>";
                //     }      
                // }
                ?>
                <?php
                if($count > 0){
                    ?>
                    <div class="location" style="margin-bottom:50px">
                <form action="" method="post" style="width=100%;text-align:center">
                    <p style="font-size:20px;font-weight:bold;">SELECT SHIPPING METHOD</p>
                    <select name="type" id="name" style="margin-bottom: 15px;font-size: 16px;color: #999;text-align: center;padding: 14px 20px;width: 100%;border:1px solid black">
                        <option value="pickup">PickUp</option>
                        <option value="shipping">Shipping</option>
                    </select>
                        <div id="shipping" class="data">
                            <p style="color:blue;font-size:20px">Select Your County</p>
                            <select name="county" style="font-size: 16px;text-align: center;padding: 7px 10px;width: 50%;border:1px solid black">
                                <option value="meru">Meru</option>
                                <option value="isiolo">Isiolo</option>
                                <option value="nakuru">Nakuru</option>
                                <option value="mombasa">Mombasa</option>
                                <option value="nanyuki">Nanyuki</option>
                                <option value="thika">Thika</option>
                                <option value="mandera">Mandera</option>
                                <option value="embu">Embu</option>
                                <option value="nairobi">Nairobi</option>
                                <option value="busia">Busia</option>
                                <option value="tana river">Tana River</option>
                            </select>
                            <button type="submit" name="filter" class="btn" style="font-size:12px">Ok</button>
                        </div>
                </form>
                <?php
                if(isset($_POST['filter'])){
                    $county = $_POST['county'];
                    if($county=="meru"){
                        $new_price = "200";
                        $co = "meru";
                    }else if($county=="embu"){
                        $new_price = "200";
                        $co = "embu";
                    }else if($county=="mombasa"){
                        $new_price = "500";
                        $co = "mombasa";
                    }else if($county=="nairobi"){
                        $new_price = "50";
                        $co = "nairobi";
                    }else if($county=="nakuru"){
                        $new_price = "300";
                        $co = "nakuru";
                    }else if($county=="nanyuki"){
                        $new_price = "150";
                        $co = "nanyuki";
                    }else if($county=="thika"){
                        $new_price = "100";
                        $co = "thika";
                    }else if($county=="mandera"){
                        $new_price = "400";
                        $co = "mandera";
                    }else if($county=="busia"){
                        $new_price = "700";
                        $co = "busia";
                    }else if($county=="tana river"){
                        $new_price = "450";
                        $co = "tana river";
                    }
                }else{
                    $new_price = "0";
                }
                ?>
                </div>
                    <?php
                     $ss = mysqli_query($con, "SELECT SUM(total) as total FROM cart_pending WHERE customer_email='{$_SESSION['email']}'");
                     $ro = mysqli_fetch_assoc($ss);
                     $total = $ro['total'];
                     $tot = $ro['total'] + $new_price;
                     $ss2 = mysqli_query($con, "SELECT SUM(qty) as qty FROM cart_pending WHERE customer_email='{$_SESSION['email']}'");
                     $ro2 = mysqli_fetch_assoc($ss2);
                     $tot2 = $ro2['qty'];
                    ?>
            <div class="pt" style="">
                <div class="row price-details">
                    <div class="detail">
                        <h6>Items :</h6><br>
                        <h6>Delivery Price :</h6><br>
                        <h6>Total Price :</h6>
                    </div>
                    <div class="result" style="margin-left:120px;margin-top:-97px;color:#616A6B">
                        <h6><?php echo $tot2; ?> Products</h6><br>
                        <h6><?php echo $new_price; ?> Ksh</h6><br>
                        <h6><?php echo $tot; ?> Ksh</h6>
                    </div>
                </div>
         </div>
                    <?php
                    ?>
                    <style>
    .cls a:hover{
        background:red;
    }
    .cls .update:hover{
        background:green;
    }
</style>
<div class="but" style="width:100%;text-align:center">
    <form action="" method="POST">
        <input type="hidden" name="cou" value="<?php echo $co ?>">
        <input type="hidden" name="fee" value="<?php echo $new_price ?>">
        <button name="payment" class="btn" style="background:orange">Continue</button>
    </form>
   <?php
   if(isset($_POST['payment'])){
      $invoice = rand(999999, 111111);
      $customer = $_SESSION['email'];
      $items = $tot2;
      $price = $total;
      $place = $_POST['cou'];
      $fee = $_POST['fee'];
      $total_amount = $tot + $fee;
      $status = "pending";

      $insert = mysqli_query($con, "INSERT INTO `cart`(`invoice_no`, `customer_email`, `items`, `price`, `shipping_place`, `shipping_fee`, `total_amount`, `status`) 
      VALUES ('$invoice','$customer','$items','$price','$place','$fee','$total_amount','$status')");
      if($insert){
        $copy = mysqli_query($con, "INSERT INTO customer_order SELECT * FROM cart_pending");
        if($copy){
            $delete = mysqli_query($con, "DELETE FROM `cart_pending` WHERE customer_email='{$_SESSION['email']}'");
            if($delete){
                echo "<script>window.open('payment.php','_self')</script>";
            }
            
        }
        
      }
      
   }
   ?>
    
</div>
<?php
                }else{
                    echo "";
                }
                ?>
                
                    

<script src="js/script.js"></script>
<script src="../js/script.js"></script>
<script>
        $(document).ready(function(){
            $("#name").on('change', function(){
                $(".data").hide();
               $("#" + $(this).val()).fadeIn(700);
            }).change();
        });
    </script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>


