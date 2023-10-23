<?php 
include("includes/header_receipt.php");
if(!isset($_SESSION['email'])){
echo "<script>window.open('index.php','_self')</script>"; 
}
?>
<?php 
include("includes/sidebar.php"); 
?>
<style>
    .rec{
        width:95%;
        margin-left:10px;
        margin-top:50px;
        
    }
    .rec .logo{
        border-bottom:2px solid grey;
    }
    .rec .cu_details{
        text-align:left;
        margin-top:50px;
    }
    .rec .co_details{
        text-align:right;
        margin-top:-120px;
        margin-bottom:10px;
    }
    .rec .pro_details{
        text-align:left;
    }
    .rec .pro_details .total{
        text-align:right;
    }
</style>
<?php
$select3 = mysqli_query($con, "SELECT * FROM usermember WHERE email='{$_SESSION['email']}'");
$row3 = mysqli_fetch_assoc($select3);
$name = $row3['name'];

$check = mysqli_query($con, "SELECT * FROM payment WHERE customer_email='$name'");
$ass = mysqli_num_rows($check);
if($ass > 0){
    ?>
    <?php
  $select4 = mysqli_query($con, "SELECT * FROM payment WHERE customer_email='$name'");
  $row4 = mysqli_fetch_assoc($select4);
  $status = $row4['status'];
  if($status=="pending"){
    $new = "<label style='color:red'>$status</label>";
  }else{
    $new =  "<label style='color:green'>$status</label>";
  }
?>
<div class="rec">
    <div class="logo">
         <img src="myLogo.png" alt="" style="width:100px;height:100px">
         <h2 style="text-align:right;margin-top:-50px;font-size:15px">Status : <?php echo $new ?></h2>
    </div>
    <div class="cu_details">
        <h2>INVOICED TO;</h2><br>
        <h2><?php echo $row3['name'] ?></h2>
        <h2><?php echo $row3['email'] ?></h2>
        <h2><?php echo $row3['phone'] ?></h2>
        <h2><?php echo $row3['county'] ?></h2><br>
        <h2>Date : <?php echo $row4['date'] ?></h2>
    </div>
    <div class="co_details">
        <h2>PAY TO;</h2><br>
        <h2>Tropical Brands Africa Ltd.</h2>
        <h2>Kasarani Mwiki Road, Nairobi</h2>
        <h2>info@tropikal.co.ke</h2>
        <h2>+254729965800</h2>
        <h2>P.O. Box: 49465-00100</h2>
        <h2>Nairobi City</h2>
    </div>
    <div class="pro_details">
        <h2 style="text-align:center">PRODUCT DETAILS</h2>
        <table style="border:1px solid black">
            <tr style="font-size:15px;margin-bottom:10px">
                <th>No</th>
                <th>Product Tilte</th>
                <th>Product image</th>
                <th>Product Price</th>
                <th>Product Qty</th>
                <th>Total</th>
            </tr>
            <?php 
              $select = mysqli_query($con, "SELECT * FROM customer_order WHERE customer_email='{$_SESSION['email']}'");
              $count = mysqli_num_rows($select);
              $i = 0;
              if($count > 0){
                while($row = mysqli_fetch_assoc($select)){
                    $i++;
                    ?>
                    <tr style="font-size:13px">
                        <td><?php echo $i ?>.</td>
                        <td><?php echo $row['product_title'] ?></td>
                        <td><img src="staff/images/<?php echo $row['product_image'] ?>" alt="" style="width:50px;height:50px"></td>
                        <td><?php echo $row['price'] ?> Ksh</td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row['total'] ?> Ksh</td>
                    </tr>
                    <?php
                }
              }
            ?>
        </table>
        <?php
          $select2 = mysqli_query($con, "SELECT * FROM cart WHERE customer_email='{$_SESSION['email']}'");
          $row2 = mysqli_fetch_assoc($select2);
        ?>
        <div class="total">
              <h2>Sub Total : <?php echo $row2['price'] ?> Ksh</h2>
              <h2>Delivery Fee : <?php echo $row2['shipping_fee'] ?> Ksh</h2>
              <h2 style="text-decoration:underline">Total Amount : <?php echo $row2['Total_Amount'] ?> Ksh</h2>
        </div>
    </div>
    <?php
      $sel = mysqli_query($con, "SELECT * FROM cart WHERE customer_email='{$_SESSION['email']}'");
      $user_row = mysqli_fetch_assoc($sel);
      $user_id = $user_row['id'];
    ?>
    <?php
      if(isset($_GET['id'])){
       $id = $_GET['id'];

       $change = mysqli_query($con, "UPDATE `cart` SET `status`='received' WHERE id='$id'");
       if($change){
           $message = mysqli_query($con, "INSERT INTO `chat`(`sender`, `receiver`, `message`)
            VALUES ('{$_SESSION['email']}','driver','I have received my order thank you.')");
            $message2 = mysqli_query($con, "INSERT INTO `chat`(`sender`, `receiver`, `message`)
            VALUES ('{$_SESSION['email']}','shippingmanager','I have received my order thank you.')");
            //$msg = "Thank for your feedback.";
            echo "<script>window.open('rating.php','_self')</script>";
       }else{
           $_SESSION['status'] = "Failed";
           $_SESSION['status_code'] = "error";
       }

    }
    ?>
    <form action="" class="button" method="POST">
        <!-- <button type="submit" name="donwload" class="btn">Download</button> -->
        <a href="receipt.php?id=<?php echo $user_id ?>" name="receive" class="btn" style="background:blue;border:1px solid blue">Received Order</a>
    </form>
</div>
    <?php
}else{
    echo "<b style='margin-left:100px;margin-top:100px;font-size:20px'>No Receipt Found.</b>";
}
?>
<script>
    function myfun(){
        window.print();
        android.print();
    }
</script>
<script src="js/script.js"></script>
<script src="../js/script.js"></script>

