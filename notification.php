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
                    <?php 
                    $select = mysqli_query($con, "SELECT * FROM chat WHERE receiver='{$_SESSION['email']}'");
                    $count = mysqli_num_rows($select);
                    if($count > 0){
                        ?>
                        <div class="content-wthree">
                            <h2 style="color:orange">All notifications</h2>
                        <?php
                        while($row = mysqli_fetch_assoc($select)){
                            $id = $row['id'];
                            ?>
                            <a href="reply.php?id=<?php echo $id ?>">
                                <p>Sender : <?php echo $row['sender'] ?></p>
                                <p style="border-bottom:1px solid grey">Message : <?php echo $row['message'] ?></p>
                               </a>
                            <?php
                        }
                    }else{
                        ?>
                          <div class="content-wthree">
                               <h2 style="color:orange">All notifications</h2>
                               <p>** You don't have any notification, please check it later. **</p>
                               <a href="chat.php" class="btn">Start Chat</a>
                        <?php
                    }
                    ?>
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