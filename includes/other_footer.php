<!-- footer section starts  -->

<!-- footer section starts  -->

<section class="footer">

<div class="footer-container">

    <div class="box-container">
       
    <div class="box">
        <h3>Our Services</h3>
        <style>
            .popup i{
                background:white;
                color:red;
                font-size:80px;
                border-radius:50%;
                width:80px;
                margin-top:-50px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            }
            .popup{
                width:400px;
                background:#fff;
                border-radius:6px;
                position:absolute;
                top:50%;
                left:50%;
                text-align:center;
                padding:0 30px 30px;
                transform: translate(-50%, -50%) scale(0.1);
                visibility:hidden;
                transition: transform 0.4s, top 0.4s;
            }
            .open-popup{
                transform: translate(-50%, -50%) scale(1);
                visibility:visible;
                top:200%;
            }
            .popup h2{
                font-size:38px;
                font-weight:500;
                margin:30px 0 10px;
            }
            .popup button{
                width:100%;
                margin-top:50px;
                padding:10px 0;
                background:#6fd649;
                color:#fff;
                border:0;
                outline:none;
                border-radius:4px;
                cursor:pointer;
                box-shadow: 0 5px 5px rgba(0,0,0,0.2);
            }
            .popup button:hover{
                background:green;
            }
        </style>
        <div class="popup" id="popup">
            <i class="fas fa-times-circle"></i>
            <h2>Warning!</h2>
            <p style="font-size:15px">LogOut to access here. Thanks!</p>
            <button type="button" onclick="closePopup()">Ok</button>
        </div>
            <p>Quality and loyalty that is Our Behavior.</p>
            <div class="share">
               <a href="logout.php" class="links"> <i class="fas fa-check"></i> home </a>
               <a href="#" onclick="openPopup()" class="links"> <i class="fas fa-check"></i>Online Shopping</a>
               <a href="#" onclick="openPopup()" class="links"> <i class="fas fa-check"></i>Quiz Challenge</a>
               <a href="#" onclick="openPopup()" class="links"> <i class="fas fa-check"></i>Shop Register</a>
               <a href="#" onclick="openPopup()" class="links"> <i class="fas fa-check"></i>Life Consultation</a>
            </div>
        </div> 

        <div class="box">
            <h3>Don't Miss</h3>
            <a href="about_us.php" class="links"> <i class="fas fa-arrow-right"></i>About Us</a>
            <a href="help.php" class="links"> <i class="fas fa-arrow-right"></i>Help</a>
        </div>
       
        <div class="box">
            <h3>Social Media</h3>
            <a href="https://api.whatsapp.com/send?phone=0724421398"><i class="fab fa-whatsapp" style="color:green"></i> WhatsApp</a>
            <a href="#"><i class="fab fa-facebook-f" style="color:blue"></i> Facebook</a>
            <a href="#"><i class="fab fa-instagram" style="color:orange"></i> Instagram</a>
        </div>

        <div class="box">
        <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +250 78 179 4795 </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +254 74 224 1398 </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> hhirwa1390@stu.kemu.ac.ke </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> hirwa1998.hubert@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> dont123.miss@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Kigali muhanga rd, Gitarama </a>
        </div>
        <div class="box">
            <h3>Comments</h3>
            <p>Make Comment here</p>
            <?php
                $msg = "";
                if(isset($_POST['sub'])){
                    $name = $_POST['name'];
                    $comment = $_POST['comment'];
                    $status = "pending";

                    $data = mysqli_query($con, "INSERT INTO `home_comment` (`name`, `comment`, `type`, `status`) VALUES('$name','$comment','home','$status')");
                    if($data){
                        $msg = "Thank you for Comments";
                    }
                }
            ?>
            <p style="font-size:20px;color:var(--orange)"><?php echo $msg;?></p>
            <form action="" method="POST">
                <input type="text" name="name" placeholder="your name" class="email">
                <textarea name="comment" cols="30" rows="10" class="email" placeholder="your comment here..."></textarea>
                <button type="submit" name="sub" class="btn">Submit</button>
            </form>
        </div>

    </div>

</div>

</section>

<!-- footer section ends -->

<!-- footer section ends -->

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link -->
<script src="js/script.js"></script>
<script src="../js/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        let popup = document.getElementById('popup');

        function openPopup(){
            popup.classList.add('open-popup');
        }
        function closePopup(){
            popup.classList.remove('open-popup');
        }
    </script>

</body>
</html>