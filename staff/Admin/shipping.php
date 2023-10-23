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
                               <th scope="col">Invoice_no</th>
                               <th scope="col">Customer_email</th>
                               <th scope="col">Items</th>
                               <th scope="col">shipping_Place</th>
                               <th scope="col">Driver</th>
                               <th scope="col">Status</th>
                               </tr>  
                          </thead>  
                          <?php   
                          $query ="SELECT * FROM cart ORDER BY ID DESC";  
                          $result = mysqli_query($con, $query); 
                          $i = 0;
                          while($row = mysqli_fetch_array($result))  
                          {  
                            $id = $row['id'];
                            $status = $row['status'];
                            $invoice_no = $row['invoice_no'];
                            $sel = mysqli_query($con,"SELECT * FROM delivery WHERE order_id='$invoice_no'");
                            $driver_row = mysqli_fetch_assoc($sel);
                            $driver = $driver_row['driver'];
                            $i++;
                            ?>
                               <tr>  
                               <td><?php echo $row['invoice_no'] ?></td>
                               <td><?php echo $row['customer_email'] ?></td>
                               <td><?php echo $row['items'] ?></td>
                               <td><?php echo $row['shipping_place'] ?></td>
                                <td><?php echo $driver ?></td>
                                <td>
                                <?php
                                if($status=="pending"){
                                    echo "<label style='color: red;'>$status</label>";
                                }elseif($status=="approved"){
                                    echo "<label style='color: green;'>$status <b style='color:black'>And</b> <b style='color:red'>not delived</b></label>";
                                }elseif($status=="delived"){
                                    echo "<label style='color: orange;'><b style='color:green'>approved</b> <b style='color:black'>And</b> $status</label>";
                                }elseif($status=="received"){
                                    echo "<label style='color: grey;'><b style='color:green'>delived</b> <b style='color:orange'>And</b> $status</label>";
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
            