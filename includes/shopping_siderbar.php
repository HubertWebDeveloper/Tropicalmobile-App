<?php
include("includes/connection.php");
?>
<!-- navbar section  -->

<nav class="navbar">

    <div class="user">
        <img src="myLogo.png" alt="">
        <h3>Don't Miss</h3>
    </div>

    <div class="links">
        <a href="index.php">home</a>
        <a href="shopping.php">Online Shopping</a>
        <a href="earn_money/apps.php">Quiz Challenge</a>
        <a href="consultation/consultation.php">Life Consultation</a>
        <a href="Admin_side/shop/index.php">Shop Registration</a>
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