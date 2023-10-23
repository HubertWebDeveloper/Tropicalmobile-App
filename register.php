<?php include("includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Register Form-Don't Miss</title>
    <link href="myLogo.png" rel="icon">
    <link href="myLogo.png" rel="apple-touch-icon">
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/login.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>
<?php
    $msg = "";
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $county = mysqli_real_escape_string($con, $_POST['county']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($con, $_POST['confirm-password']);
        
        if(strlen($phone) == 10){
            if($password == $confirm_password){
                $insert = mysqli_query($con, "INSERT INTO `usermember`(`user_type`, `email`, `name`, `county`, `phone`, `password`, `status`) VALUES ('customer','$email','$name','$county','$phone','$password','pending')");
                if($insert){
                   $msg = "<div class='alert alert-info'>Registration successfully, continue login.</div>";
                }else{
                   $msg = "<div class='alert alert-danger'>Something went wrong,Try again.</div>";
                }
            }else{
                $msg = "<div class='alert alert-danger'>Password And Confirm-Password Doesn't much.</div>";
            }
        }else{
            $msg = "<div class='alert alert-danger'>Phone number not valid.</div>";
        }
        
    }
    ?>
    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="myLogo.png" alt=""style="border-radius:150px">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2 style="color:orange">New Registration</h2>
                        <?php echo $msg; ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="text" class="name" name="name" placeholder="Enter Your Name *" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
                            <input type="phone" class="phone" name="phone" placeholder="Enter Your phone *" value="<?php if (isset($_POST['submit'])) { echo $phone; } ?>" required>
                            <select class="select" name="county" value="<?php if (isset($_POST['submit'])) { echo $location; } ?>" required>
                               <option value="">Select County Here...</option>
                               <option value="meru">Meru</option>
                               <option value="chuka">Chuka</option>
                               <option value="kirinyaga">Kirinyaga</option>
                               <option value="embu">Embu</option>
                               <option value="machakos">Machakos</option>
                               <option value="kisumu">Kisumu</option>
                               <option value="thika">Thika</option>
                               <option value="mombasa">Mombasa</option>
                               <option value="mandera">Mandera</option>
                               <option value="nyeri">Nyeri</option>
                               <option value="isiolo">Isiolo</option>
                               <option value="nairobi">Nairobi</option>
                            </select>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email *" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password *" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Confirm Password *" required>
                            <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="index.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>