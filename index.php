<?php include 'includes/connection.php'; ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form-Don't Miss</title>
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

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $sql = "SELECT * FROM usermember WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['status']=="approved") {
                if($row['user_type']=="customer"){
                    $_SESSION['email'] = $email;
                    echo "<script>window.open('home.php','_self')</script>";
                }else if($row['user_type']=="stockmanager"){
                    $_SESSION['stock_email'] = $email;
                    echo "<script>window.open('staff/Stock_manager/index.php','_self')</script>";
                }else if($row['user_type']=="financemanager"){
                    $_SESSION['finance_email'] = $email;
                    echo "<script>window.open('staff/Finance_manager/index.php','_self')</script>";
                }else if($row['user_type']=="shippingmanager"){
                    $_SESSION['shipping_email'] = $email;
                    echo "<script>window.open('staff/shipping_manager/index.php','_self')</script>";
                }else if($row['user_type']=="driver"){
                    $_SESSION['driver_email'] = $email;
                    echo "<script>window.open('staff/driver/index.php','_self')</script>";
                }else if($row['user_type']=="admin"){
                    $_SESSION['admin_email'] = $email;
                    echo "<script>window.open('staff/Admin/index.php','_self')</script>";
                }else if($row['user_type']=="supplier"){
                    $_SESSION['supplier_email'] = $email;
                    echo "<script>window.open('staff/supplier/index.php','_self')</script>";
                }
                
            } else {
                $msg = "<div class='alert alert-danger'>Your Account still pending, please wait approval.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
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
                        <h2 style="color:orange">Login Now</h2>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <!-- <select class="select" name="user" required>
                                <option value="">Select User here...</option>
                                <option value="customer">Customer</option>
                                <option value="financemamanger">Finance Manager</option>
                                <option value="stockmanager">Stock Manager</option>
                                <option value="shippingmanager">Shipping Manager</option>
                                <option value="supplier">Supplier</option>
                                <option value="driver">Driver</option>
                            </select> -->
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required><br><br>
                            <!--<p><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>-->
                            <button name="submit" name="submit" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a href="register.php">Register</a>.</p>
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