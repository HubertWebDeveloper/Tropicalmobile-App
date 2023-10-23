<?php 
include("includes/connection.php"); 
include("includes/header.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- ------- datatable.css ---------- -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

<div class="py-5">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:#F2F4F5">
                   <div class="modal" tabindex="-1">
                    
                    </div>
                    <div class="card-body">
                       <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="table-responsive">
                        <table id="mydata" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                               <th scope="col">No</th>
                               <th scope="col">Product Title</th>
                               <th scope="col">Quantity</th>
                               <th scope="col">price</th>
                               <th scope="col">total</th>
                               <th scope="col">Supplier Name</th>
                               <th scope="col">date</th>
                               <th scope="col">Status</th>
                               </tr>  
                          </thead>  
                          <?php   
                          $query ="SELECT * FROM send_order ORDER BY ID DESC";  
                          $result = mysqli_query($con, $query); 
                          $i = 0;
                          while($row = mysqli_fetch_array($result))  
                          {  
                            $id = $row['id'];
                            $status = $row['status'];
                            $i++;
                            ?>
                               <tr>  
                               <td><?php echo $i ?></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td><?php echo $row['qty'] ?></td>
                                <td><?php echo $row['price'] ?> Ksh</td>
                                <td><?php echo $row['total'] ?> Ksh</td>
                                <td>supplier</td>
                                <td><?php echo $row['date'] ?></td>
                                <td>
                                <?php
                                if($status=="pending"){
                                    echo "<label style='color: red;'>$status</label>";
                                }elseif($status=="approved"){
                                    echo "<label style='color: green;'>$status</label>";
                                }elseif($status=="payed"){
                                 echo "<label style='color: orange;'>$status</label>";
                             }

                               ?>
                               </td>
                               </tr> 
                            <?php
                          }  
                          ?>  
                     </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" ></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
    $('#mydata').DataTable();
});
</script>
            