<?php 
include("includes/header.php");
if(!isset($_SESSION['email'])){
echo "<script>window.open('index.php','_self')</script>"; 
}
?>
<?php 
include("includes/sidebar.php"); 
?>
<div class="content-wthree" style="width:100%;text-align:center;margin-top:50px">
    <h2 style="color:orange;font-size:20px">Pay Now</h2>
    <p style="margin-bottom:10px;font-size:20px">To complete your payment,please following process. </p>
    <div class="wrapper">
        <div class="menu">
            <?php
            //  $select = mysqli_query($con, "SELECT SUM(qty) as qty FROM cart_pending WHERE customer_email='{$_SESSION['email']}'");
            //  $row = mysqli_fetch_assoc($select);
            //  $qty = $row['qty'];
            //  $select3 = mysqli_query($con, "SELECT SUM(total) as total FROM cart_pending WHERE customer_email='{$_SESSION['email']}'");
            //  $row3 = mysqli_fetch_assoc($select3);
            //  $total = $row3['total'];

             $select = mysqli_query($con, "SELECT * FROM cart WHERE customer_email='{$_SESSION['email']}'");
             $row = mysqli_fetch_assoc($select);
             $select2 = mysqli_query($con, "SELECT * FROM usermember WHERE email='{$_SESSION['email']}'");
             $row2 = mysqli_fetch_assoc($select2);
            ?>
            <?php
            $msg = "";
            $msg2 = "";
            if(isset($_POST['submit'])){
                $payment = rand(999999, 111111);
                $name = $row2['name'];
                $total_amount = $row['Total_Amount'];
                $code = $_POST['code'];
                if(strlen($code) > 10){
                    $msg = "**Code should be equal to 10 digits only.**";
                }else if(strlen($code) < 10){
                    $msg = "**Code should be equal to 10 digits only.**";
                }else if(ctype_lower($code)){
                    $msg = "**Code should be having Uppwercases And Numbers.**";
                }else if(ctype_upper($code)){
                    $msg = "**Code should be having Uppwercases And Numbers.**";
                }else if(is_numeric($code)){
                    $msg = "**Code should be having Uppwercases And Numbers.**";
                }else{
                    $insert = mysqli_query($con, "INSERT INTO `payment`(`payment_id`, `customer_email`, `amount`, `transaction_code`, `date`, `status`)
                    VALUES ('$payment','$name','$total_amount','$code',NOW(),'pending')");
                    if($insert){
                        //$msg2 = "**Payment Successfuly.**";
                        echo "<script>window.open('home.php','_self')</script>";
                    }
                }

                
            }
            ?>
            <form action="" method="post">
                <div id="mpesa" class="data" style="font-size:20px">
                    <p>// Customer Details</p>
                    <p>Name : <b><?php echo $row2['name'] ?></b></p>
                    <p>Phone : <b><?php echo $row2['phone'] ?></b></p>
                    <p>Email : <b><?php echo $row2['email'] ?></b></p><br>
                    <p>// Product Details</p>
                    <p>Items : <b><?php echo $row['items'] ?> Pcs</b></p>
                    <p>Product prices : <b><?php echo $row['price'] ?> Ksh</b></p>
                    <p>Delivery Fee : <b><?php echo $row['shipping_fee'] ?> Ksh</b></p><br>
                    <p>Total Amount : <b><?php echo $row['Total_Amount'] ?> Ksh</b></p><br>
                    <p style="color:black">TO COMPLETE YOUR PAYMENT PROCESS</p>
                    <input type="text" id="code" style="font-size: 16px;text-align: center;padding: 7px 10px;width: 50%;border:1px solid black" name="code" placeholder="Enter Code Ex: QH22CC0DC " required><br>
                    <span style="color:red"><?php echo $msg; ?></span><p style="color:green"><?php echo $msg2; ?></p>
                </div>
                <button name="submit" class="btn" type="submit" style="margin-bottom:20px">Complete Payment</button>
            </form>
        </div>
    </div>
</div>
<script src="js/script.js"></script>
<script src="../js/script.js"></script>

