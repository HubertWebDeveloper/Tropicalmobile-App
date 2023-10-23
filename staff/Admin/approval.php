<?php
include_once 'includes/connection.php';
if(isset($_GET['id'])){
    $id4 = $_GET['id'];

    $change4 = mysqli_query($con, "UPDATE `usermember` SET `status`='approved' WHERE id='$id4'");
    if($change4){
        echo "<script>window.open('user.php','_self')</script>";
    }else{
        $_SESSION['status'] = "Failed";
		$_SESSION['status_code'] = "error";
    }
}
if(isset($_GET['new_id'])){
   $id = $_GET['new_id'];

   $change4 = mysqli_query($con, "UPDATE `usermember` SET `status`='approved' WHERE id='$id'");
   if($change4){
       echo "<script>window.open('staff.php','_self')</script>";
   }else{
       $_SESSION['status'] = "Failed";
     $_SESSION['status_code'] = "error";
   }
}
?>