<?php
include("includes/header.php");  
include("includes/siderbar.php"); 
?>
<style>
    .container{
   max-width: 1200px;
   margin:0 auto;
   padding:3rem 2rem;
}

.container .title{
   font-size: 3.5rem;
   color:#444;
   margin-bottom: 3rem;
   text-transform: uppercase;
   text-align: center;
}

.container .products-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
   gap:2rem;
}

.container .products-container .product{
   text-align: center;
   padding:3rem 2rem;
   background: #fff;
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
   outline: .1rem solid #ccc;
   outline-offset: -1.5rem;
   cursor: pointer;
}

.container .products-container .product:hover{
   outline: .2rem solid #222;
   outline-offset: 0;
}

.container .products-container .product img{
   height: 25rem;
}

.container .products-container .product:hover img{
   transform: scale(.9);
}

.container .products-container .product h3{
   padding:.5rem 0;
   font-size: 2rem;
   color:#444;
}

.container .products-container .product:hover h3{
   color:#27ae60;
}

.container .products-container .product .price{
   font-size: 2rem;
   color:#444;
}

.products-preview{
   position: fixed;
   top:0; left:0;
   min-height: 100vh;
   width: 100%;
   background: rgba(0,0,0,.8);
   display: none;
   align-items: center;
   justify-content: center;
}

.products-preview .preview{
   display: none;
   padding:2rem;
   text-align: center;
   background: #fff;
   position: relative;
   margin:2rem;
   width: 40rem;
}

.products-preview .preview.active{
   display: inline-block;
}

.products-preview .preview img{
   height: 30rem;
}

.products-preview .preview .fa-times{
   position: absolute;
   top:1rem; right:1.5rem;
   cursor: pointer;
   color:#444;
   font-size: 4rem;
}

.products-preview .preview .fa-times:hover{
   transform: rotate(90deg);
}

.products-preview .preview h3{
   color:#444;
   padding:.5rem 0;
   font-size: 2.5rem;
}

.products-preview .preview .stars{
   padding:1rem 0;
   font-size: 1.7rem;
}

.products-preview .preview .stars i{
   color:#27ae60;
}

.products-preview .preview .stars span{
   color:#999;
}

.products-preview .preview p{
   line-height: 1.5;
   padding:1rem 0;
   font-size: 1.6rem;
   color:#777;
}

.products-preview .preview .price{
   padding:1rem 0;
   font-size: 2.5rem;
   color:#27ae60;
}

.products-preview .preview .buttons{
   display: flex;
   gap:1.5rem;
   flex-wrap: wrap;
   margin-top: 1rem;
}

.products-preview .preview .buttons a{
   flex:1 1 16rem;
   padding:1rem;
   font-size: 1.8rem;
   color:#444;
   border:.1rem solid #444;
}

.products-preview .preview .buttons a.cart{
   background: #444;
   color:#fff;
}

.products-preview .preview .buttons a.cart:hover{
   background: #111;
}

.products-preview .preview .buttons a.buy:hover{
   background: #444;
   color:#fff;
}


@media (max-width:991px){

   html{
      font-size: 55%;
   }

}

@media (max-width:768px){

   .products-preview .preview img{
      height: 25rem;
   }

}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

}
</style>
<div class="container">

<h3 class="title"> Tropical Brands Our products </h3>

<div class="products-container">

<?php
$select = mysqli_query($con, "SELECT * FROM products");
$count = mysqli_num_rows($select);
if($count > 0)
{
    while($row = mysqli_fetch_assoc($select)){
        $id = $row['id'];
        ?>
          <div class="product" data-name="<?php echo $id ?>">
            <img src="staff/images/<?php echo $row['image'] ?>" alt="">
            <h3><?php echo $row['name'] ?></h3>
            <div class="price"><?php echo $row['price'] ?> Ksh</div>
          </div>
        <?php
    }
}
?>

</div>

</div>

<div class="products-preview">
<?php
  $select2 = mysqli_query($con, "SELECT * FROM products");
  $count2 = mysqli_num_rows($select2);
  if($count2 > 0)
  {
    while($rows = mysqli_fetch_assoc($select2)){
             $id2 = $rows['id'];
             $status = $rows['status'];
             $pro_qty = $rows['remain'];
        ?>
            <form class="preview" data-target="<?php echo $id2 ?>" action="insert.php" method="POST">
               <i class="fas fa-times"></i>
               <img src="staff/images/<?php echo $rows['image'] ?>" alt="" width="200" height="100">
               <input type="hidden" name="image" value="<?php echo $rows['image'] ?>">
               <input type="hidden" name="remain" value="<?php echo $rows['remain'] ?>">
               <input type="text" style="border:none;outline:none;background:none" name="title" value="<?php echo $rows['name'] ?>" readonly>
               <?php
               if($status=="OutStock"){
                  ?><p> Status : <b style="color:red"><?php echo $status ?> </b></p><?php
               }else{
                  ?><p> Status : <b style="color:blue"><?php echo $status ?> </b> | Product Remain: <?php echo $pro_qty ?></p><?php
               }
               ?>
            
               <p><?php echo $rows['description'] ?></p>
               <input type="text" class="price" name="price" style="border:none;outline:none;background:none;text-align:center;width:70px" value="<?php echo $rows['price'] ?>" readonly><b style="color:green;font-size:20px">Ksh</b>

               <div class="input-group mb-3">
                   <?php
                     if($status=="InStock")
                     {
                       ?>
                           <button class="input-group-text decrement-btn" style="border:1px solid #5a5a5a;padding:5px 5px;border-radius:4px;font-weight:bold"><i class="fas fa-minus-circle"></i></button>
                           <input type="hidden" name="qty" class="remain" value="<?php echo $rows['remain'] ?>">
                           <input type="text" name="select_qty" class="form-control input-qty" value="1" style="width:50px;text-align:center;font-weight:bold" readonly>
                           <button class="input-group-text increment-btn" style="border:1px solid #5a5a5a;padding:5px 5px;border-radius:4px;font-weight:bold"><i class="fas fa-plus-circle"></i></button>
                        <?php
                     }else{ 
                        echo ""; 
                     }
                    ?>
               </div>
               <?php
               if($status=="InStock"){
                  ?>
                  <div class="buttons">
                     <button type="submit" name="add_to_cart" style="background:#5a5a5a;color:white;border-radius:10px;padding:10px 10px;width:100%">add to cart</button>
                  </div>
                  <?php
               }else{
                  echo "";
               }
               ?>
            </form>
        <?php
    }
  }
?>


</div>
<!-- review section ends -->
<script src="js/script.js"></script>
<script>
let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

document.querySelectorAll('.products-container .product').forEach(product =>{
  product.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = product.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});

$(document).ready(function(){
    $('.increment-btn').click(function(e){
        e.preventDefault();

        var qty = $(this).closest('.preview').find('.input-qty').val();
        var remain = $(this).closest('.preview').find('.remain').val();
        var value = parseInt(qty, remain);
        value = isNaN(value) ? 0 : value;
        if(value < remain){
         value++;
         $(this).closest('.preview').find('.input-qty').val(value);
        }
    });
    $('.decrement-btn').click(function(e){
        e.preventDefault();

        var qty = $(this).closest('.preview').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value)? 0 : value;
        if(value > 1){
         value--;
         $(this).closest('.preview').find('.input-qty').val(value);
        }
    });

});
</script>