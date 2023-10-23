<?php 
include("includes/header.php");
if(!isset($_SESSION['email'])){
echo "<script>window.open('index.php','_self')</script>"; 
}
?>
<?php 
include("includes/sidebar.php"); 
$email = $_SESSION['email'];
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<style>
   .form{
      width:100%;
      text-align:center;
      align-items:center;
      padding:100px 0;
   }
   .form h3{
      font-size:20px;
      color:#FF8C00;
      font-weight:400;
      font-family:arigerian;
      padding:20px 0;
   }
   .form label{
      font-size:15px;
      color:#5a5a5a;
      font-weight:bold;
   }
   .form input{
      outline:none;
      background:none;
      font-size:15px;
      color:#5a5a5a;
      width:300px;
      text-align:center;
      padding:4px 0;
   }
   .form .rateyo{
      margin-left:30%;
      font-size:15px;
   }
   .form .result{
      font-size:15px;
      color:#5a5a5a;
      font-weight:bold;
      font-family:arigerian;
   }
</style>
<?php
$msg = "";
$select = mysqli_query($con, "SELECT * FROM usermember WHERE email='{$_SESSION['email']}'");
$row = mysqli_fetch_assoc($select);
$name = $row['name'];

if(isset($_POST['receive'])){
    $cust_name=$_POST['name'];
    $cust_email=$_POST['email'];
    $rating=$_POST['rating'];
    
    $insert = mysqli_query($con, "INSERT INTO `customer_rating`(`name`, `email`, `rating`) 
    VALUES ('$cust_name','$cust_email','$rating')");
    if($insert){
        $msg = "Thank you for Feedback to Us.";
    }
}
?>
<form action="" class="form" method="post">

   <div>
    <h3>Rating Tropical brands Services</h3>
    <hr>
   </div>

   <div>
     <label>Customer Details</label><br>
     <input type="text" value="<?php echo $name; ?>" name="name" readonly>
    <input type="text" value="<?php echo $email; ?>" name="email" readonly>
   </div>
     <div class="rateyo" id= "rating"
     data-rateyo-rating="0"
     data-rateyo-num-stars="5"
     data-rateyo-score="3">
     </div>

   <span class='result'>0</span>
   <input type="hidden" name="rating"><br>

   <button type="submit" name="receive" class="btn" style="background:blue;border:1px solid blue">send feedback</button><br> 
   <b style='color:green;font-size:15px;margin-top:20px'><?php echo $msg; ?></b>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>
<script src="js/script.js"></script>
<script src="../js/script.js"></script>

