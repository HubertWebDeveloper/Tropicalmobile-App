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
                        <?php
                     $all = mysqli_query($con, "SELECT SUM(Amount) as total FROM payment WHERE status='approved'");
                        $rew5 = mysqli_fetch_assoc($all);
                        $sav = $rew5['total'];
                        if($sav==""){
                            $saving = "0";
                        }else{
                            $saving = $sav;
                        }
                        $all2 = mysqli_query($con, "SELECT SUM(total) as total FROM send_order WHERE status='payed'");
                        $rew2 = mysqli_fetch_assoc($all2);
                        $sav2 = $rew2['total'];
                        if($sav2==""){
                            $saving2 = "0";
                        }else{
                            $saving2 = $sav2;
                        }
                        
                        $total = $saving - $saving2;
                    ?>
                    <p>Total Amount Received : <b><?php echo $saving ?> Ksh</b></p>
                    <p>Total Amount Payed : <b><?php echo $saving2 ?> Ksh</b></p>
                    <p style="float:right">Total Amount Remain : <b style="text-decoration:underline"><?php echo $total ?> Ksh</b></p>
                        <div class="table-responsive">
                        <table id="mydata" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                               <th scope="col">payment_ID</th>
                               <th scope="col">customer_Name</th>
                               <th scope="col">Amount</th>
                               <th scope="col">Transaction</th>
                               <th scope="col">Date</th>
                               <th scope="col">Status</th>
                               </tr>  
                          </thead>  
                          <?php   
                          $query ="SELECT * FROM payment ORDER BY ID DESC";  
                          $result = mysqli_query($con, $query); 
                          $i = 0;
                          while($row = mysqli_fetch_array($result))  
                          {  
                            $id = $row['id'];
                            $status = $row['status'];
                            $i++;
                            ?>
                               <tr>  
                               <td><?php echo $row['payment_id'] ?></td>
                                <td><?php echo $row['customer_email'] ?></td>
                                <td><?php echo $row['amount'] ?> <b>Ksh</b></td>
                                <td><?php echo $row['transaction_code'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td>
                                <?php
                                if($status=="pending"){
                                    echo "<label style='color: red;'>$status</label>";
                                }elseif($status=="approved"){
                                    echo "<label style='color: green;'>$status</label>";
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
            