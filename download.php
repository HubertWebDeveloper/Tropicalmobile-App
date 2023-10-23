<?php
include_once 'includes/connection.php';
    if(isset($_POST['donwload'])){
     
         header("Content-Type: application/xls");    
         header("Content-Disposition: attachment; filename=MyReceipt.xls");  
         header("Pragma: no-cache"); 
         header("Expires: 0");
     
        $i =0;
         
         
         $output = "";
         
         $output .="
        <table>
                 <thead>
              <tr>
              <th>No</th>
              <th>Product Tilte</th>
              <th>Product image</th>
              <th>Product Price</th>
              <th>Product Qty</th>
              <th>Total</th>
            </tr>
                 <tbody>
         ";
         
         $query = $con->query( "SELECT * FROM customer_order WHERE customer_email='{$_SESSION['email']}'") or die(mysqli_errno());
         while($ro2 = $query->fetch_array()){
            $i++;
             
         $output .= "
        <tr>
        <td>" . $i . "</td>
        <td>" . $ro2['product_title'] . "</td>
        <td>" . $ro2['product_image'] . "</td>
        <td>" . $ro2['price'] . " Ksh</td>
        <td>" . $ro2['qty'] . "</td>
        <td><b>" . $ro2['total'] . " Rfw</b></td>
     <tr>
         ";
         }
         
         $output .="
                 </tbody>
                 
             </table>
         ";
         
         echo $output;
    }
    if(isset($_GET['id'])){
        $msg = "";
       $id = $_GET['id'];

       $change = mysqli_query($con, "UPDATE `cart` SET `status`='received' WHERE id='$id'");
       if($change){
           $message = mysqli_query($con, "INSERT INTO `chat`(`sender`, `receiver`, `message`)
            VALUES ('{$_SESSION['email']}','driver','I have received my order thank you.')");
            $message2 = mysqli_query($con, "INSERT INTO `chat`(`sender`, `receiver`, `message`)
            VALUES ('{$_SESSION['email']}','shippingmanager','I have received my order thank you.')");
            $msg = "Thank for your feedback";
           echo "<script>window.open('receipt.php','_self')</script>";
       }else{
           $_SESSION['status'] = "Failed";
           $_SESSION['status_code'] = "error";
       }

    }
    ?>