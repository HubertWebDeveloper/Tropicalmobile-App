<?php
include("includes/connection.php");
 
if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}else{
    include("includes/header.php");
?>
<?php
 
 $sel = mysqli_query($con, "SELECT * FROM products");
 $count = mysqli_num_rows($sel);

 $sel1 = mysqli_query($con, "SELECT * FROM cart");
 $count1 = mysqli_num_rows($sel1);

 $sel2 = mysqli_query($con, "SELECT * FROM payment");
 $count2 = mysqli_num_rows($sel2);

 $sel3 = mysqli_query($con, "SELECT * FROM delivery");
 $count3 = mysqli_num_rows($sel3);

 $sel7 = mysqli_query($con, "SELECT * FROM send_order");
 $count7 = mysqli_num_rows($sel7);

//  $sel1 = mysqli_query($con, "SELECT * FROM cart");
//  $count1 = mysqli_num_rows($sel1);

 $sel5 = mysqli_query($con, "SELECT * FROM usermember WHERE user_type='customer'");
 $count5 = mysqli_num_rows($sel5);

 $sel6 = mysqli_query($con, "SELECT * FROM usermember WHERE NOT user_type='customer'");
 $count6 = mysqli_num_rows($sel6);
 
 $sel8 = mysqli_query($con, "SELECT * FROM customer_rating");
 $count8 = mysqli_num_rows($sel8);
?>
<!-- End Navbar -->
<div class="row mt-4" style="margin-left:10px">
    <div class="col-lg-5 col-sm-7">
        <a href="product.php" style="color:black">
        <div class="card  mb-2" style="margin-top:20px">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">list</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">products</p>
                    <h4 class="mb-0"><?php echo $count; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
        </div>
        </a>
    </div>
    <div class="col-lg-5 col-sm-7">
        <a href="order.php" style="color:black">
        <div class="card  mb-2" style="margin-top:20px">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">list</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Orders</p>
                    <h4 class="mb-0"><?php echo $count1; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
        </div>
        </a>
    </div>
    <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
        <a href="payment.php" style="color:black">
        <div class="card  mb-2" style="margin-top:20px">
            <div class="card-header p-3 pt-2 bg-transparent">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">money</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">Payments</p>
                    <h4 class="mb-0 "><?php echo $count2; ?></h4>
                </div>
            </div>
            <hr class="horizontal my-0 dark">
        </div>
        </a>
    </div>
    <!-- ============= line 2 ==================== -->
    <div class="col-lg-5 col-sm-7">
        <a href="shipping.php" style="color:black">
        <div class="card  mb-2" style="margin-top:20px">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">list</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Shipping Details</p>
                    <h4 class="mb-0"><?php echo $count3; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
        </div>
        </a>
    </div>
    <div class="col-lg-5 col-sm-7">
        <a href="receiver_order.php" style="color:black">
        <div class="card  mb-2" style="margin-top:20px">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">list</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Supplied products</p>
                    <h4 class="mb-0"><?php echo $count7; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
        </div>
        </a>
    </div>
    <div class="col-lg-5 col-sm-7">
        <a href="supplier_payment.php" style="color:black">
        <div class="card  mb-2" style="margin-top:20px">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">list</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Supplier Payment Confirmed</p>
                    <h4 class="mb-0"><?php echo $count7; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
        </div>
        </a>
    </div>
    <div class="col-lg-5 col-sm-7">
        <a href="rating.php" style="color:black">
        <div class="card  mb-2" style="margin-top:20px">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">list</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Customer Rating</p>
                    <h4 class="mb-0"><?php echo $count8; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
        </div>
        </a>
    </div>
    <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
        <a href="staff.php" style="color:black">
        <div class="card  mb-2" style="margin-top:20px">
            <div class="card-header p-3 pt-2 bg-transparent">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">people</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">Staff Members</p>
                    <h4 class="mb-0 "><?php echo $count6; ?></h4>
                </div>
            </div>
            <hr class="horizontal my-0 dark">
        </div>
        </a>
    </div>
    <!-- ============= line 3 ==================== -->
    <div class="col-lg-5 col-sm-7">
        <a href="user.php" style="color:black">
        <div class="card  mb-2" style="margin-top:20px">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">people</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Users</p>
                    <h4 class="mb-0"><?php echo $count5; ?></h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
        </div>
        </a>
    </div>
    
</div>
<?php //include("../includes/footer.php"); ?>
<?php } ?>