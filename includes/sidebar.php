<!-- navbar section  -->
<?php
 $sel = mysqli_query($con, "SELECT * FROM usermember WHERE email='{$_SESSION['email']}'");
 $fetch = mysqli_fetch_assoc($sel);
 ?>
<nav class="navbar">

    <div class="user">
        <img src="myLogo.png" alt="">
        <h3>Tropical Brands</h3>
    </div>

    <div class="links">
        <p style="color:darkgreen;font-size:15px;margin-bottom:20px">Username: <b><?php echo $fetch['name'] ?></b></p>
        <p style="color:darkgreen;font-size:15px;margin-bottom:20px">Location: <b><?php echo $fetch['county'] ?></b></p>
        <a href="cart.php">My cart</a>
        <a href="help.php">Help</a>
        <a href="about_us.php">About Us</a>
        <a href="receipt.php">Receipt</a>
        <a href="chat.php">Chat / Feedback</a>
    </div>

    <div id="close" class="fas fa-times"></div>

</nav>

<!-- home section starts  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" 
integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$('.side').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});
</script>
<!-- home section ends -->