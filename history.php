<?php 
include("includes/header.php");
if(!isset($_SESSION['email'])){
echo "<script>window.open('index.php','_self')</script>"; 
}
?>
<?php 
include("includes/sidebar.php"); 
?>

  <!-- CSS Files -->
  <link id="pagestyle" href="../../css/material-dashboard.min.css" rel="stylesheet" />
<style>
    .rec{
        width:95%;
        margin-left:10px;
        
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
    <div class="pro_details"style="margin-top:-120%">
        <h2 style="text-align:center">HiSTORY FOLDER</h2>
        <div class="table-responsive">
        <table style="border:1px solid black;margin-top:20px">
            <tr style="font-size:15px;margin-bottom:10px;text-decoration:underline">
                <th style="border-right:2px solid #5a5a5a">No</th>
                <th style="border-right:2px solid #5a5a5a">Invoce_no</th>
                <th style="border-right:2px solid #5a5a5a">Items</th>
                <th style="border-right:2px solid #5a5a5a">Price</th>
                <th style="border-right:2px solid #5a5a5a">Ship_place</th>
                <th style="border-right:2px solid #5a5a5a">Ship_fee</th>
                <th style="border-right:2px solid #5a5a5a">Amount</th>
                <th style="border-right:2px solid #5a5a5a">Review</th>
            </tr>
            <?php 
              $select = mysqli_query($con, "SELECT * FROM cart WHERE customer_email='{$_SESSION['email']}'");
              $count = mysqli_num_rows($select);
              $i = 0;
              if($count > 0){
                while($row = mysqli_fetch_assoc($select)){
                    $i++;
                    ?>
                    <tr style="font-size:13px">
                        <td style="border-right:1px solid #5a5a5a;border-bottom:2px solid #5a5a5a"><?php echo $i ?>.</td>
                        <td style="border-right:1px solid #5a5a5a;border-bottom:2px solid #5a5a5a"><?php echo $row['invoice_no'] ?></td>
                        <td style="border-right:1px solid #5a5a5a;border-bottom:2px solid #5a5a5a"><?php echo $row['items'] ?></td>
                        <td style="border-right:1px solid #5a5a5a;border-bottom:2px solid #5a5a5a"><?php echo $row['price'] ?> Ksh</td>
                        <td style="border-right:1px solid #5a5a5a;border-bottom:2px solid #5a5a5a"><?php echo $row['shipping_place'] ?></td>
                        <td style="border-right:1px solid #5a5a5a;border-bottom:2px solid #5a5a5a"><?php echo $row['shipping_fee'] ?></td>
                        <td style="border-right:1px solid #5a5a5a;border-bottom:2px solid #5a5a5a"><?php echo $row['Total_Amount'] ?> Ksh</td>
                        <td style="border-bottom:2px solid #5a5a5a"><a href="receipt.php" style="text-decoration:none;color:white;background:orange;padding:4px 4px;border-radius:5px">Review</a></td>
                    </tr>
                    <?php
                }
              }
            ?>
        </table>
        </div>
        <?php
          $select2 = mysqli_query($con, "SELECT * FROM cart WHERE customer_email='{$_SESSION['email']}'");
          $row2 = mysqli_fetch_assoc($select2);
        ?>
    </div>
    <?php
      $sel = mysqli_query($con, "SELECT * FROM cart WHERE customer_email='{$_SESSION['email']}'");
      $user_row = mysqli_fetch_assoc($sel);
      $user_id = $user_row['id'];
    ?>
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

