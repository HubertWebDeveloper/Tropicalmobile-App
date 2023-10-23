<?php 
include("../../includes/connection.php"); 
if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('../../index.php','_self')</script>";
    
}else{
    include("../../includes/header_admin.php");
?>

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
if(isset($_GET['view'])){
    $id = $_GET['view'];

    $select = mysqli_query($con, "SELECT * FROM cart WHERE id='$id'");
    $row = mysqli_fetch_assoc($select);
    $email = $row['customer_email'];
    $i =0;

    $ckeck = mysqli_query($con, "SELECT * FROM customer_order WHERE customer_email='$email'");
    $count = mysqli_num_rows($ckeck);
    if($count > 0){
        while($rows = mysqli_fetch_assoc($ckeck)){
            $i++;
            ?>

<tr style="font-size:13px">
    <td><?php echo $i ?>.</td>
    <td><?php echo $rows['product_title'] ?></td>
    <td><img src="../images/<?php echo $rows['product_image'] ?>" alt="" style="width:50px;height:50px"></td>
    <td><?php echo $rows['price'] ?> Ksh</td>
    <td><?php echo $rows['qty'] ?></td>
    <td><?php echo $rows['total'] ?> Ksh</td>
</tr>
            <?php
        }
    }
}
?>
</table>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" ></script>
<?php } ?>