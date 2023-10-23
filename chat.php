<?php
include_once 'includes/connection.php';
if(!isset($_SESSION['email'])){

    echo "<script>window.open('index.php','_self')</script>";
    
}else{
    ?>
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
        $receiver = mysqli_real_escape_string($con, $_POST['receiver']);
        $sender = $_SESSION['email'];
        $message = mysqli_real_escape_string($con, $_POST['message']);
        
        $insert = mysqli_query($con, "INSERT INTO `chat`(`sender`, `receiver`, `message`) 
        VALUES ('$sender','$receiver','$message')");
        if($insert){
            $msg = "<div class='alert alert-info'>Message Sent successfully.</div>";
        }else{
            $msg = "<div class='alert alert-danger'>Something went wrong,Try again.</div>";
        }
    }
    $select = mysqli_query($con, "SELECT * FROM chat WHERE receiver='{$_SESSION['email']}'");
    $count = mysqli_num_rows($select);
    if($count > 0){
        $mes = $count;
    }else{
        $mes = 0;
    }
    ?>
    <style>
        .content-wthree textarea{
            outline: none;
    margin-bottom: 15px;
    font-size: 16px;
    color: #999;
    text-align: left;
    padding: 14px 20px;
    width: 100%;
    display: inline-block;
    box-sizing: border-box;
    border: none;
    outline: none;
    background: transparent;
    border: 1px solid blue;
    transition: 0.3s all ease;
        }
    </style>
    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <!-- <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="myLogo.png" alt=""style="border-radius:150px">
                        </div>
                    </div> -->
                    <div class="content-wthree">
                        <h2 style="color:orange">My Chat</h2>
                        <p style="font-size:20px">New notifications : <a href="notification.php"><?php echo $mes ?> messages</a></p>
                        <?php echo $msg; ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <select class="select" name="receiver" value="<?php if (isset($_POST['submit'])) { echo $location; } ?>" required>
                               <option value="">Send To Who...</option>
                               <option value="stockmanager">Stock Manager</option>
                               <option value="driver">Driver</option>
                               <option value="shippingmanager">shipping Manager</option>
                               <option value="financemanager">Finance Manager</option>
                            </select>
                            <textarea name="message" class="textarea" cols="30" rows="6" placeholder="Type message here..."></textarea>
                            <button name="submit" class="btn" type="submit">Submit</button>
                        </form>
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
<?php } ?>