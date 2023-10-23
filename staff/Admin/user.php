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
                                   <th scope="col">Email</th>
                                   <th scope="col">Name</th>
                                   <th scope="col">County</th>
                                   <th scope="col">Phone</th>
                                   <th scope="col">Password</th>
                                   <th scope="col">status</th>
                                   <th scope="col">Approval</th>
                               </tr>  
                          </thead>  
                          <?php   
                          $query ="SELECT * FROM usermember WHERE user_type='customer' ORDER BY ID DESC";  
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
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['county'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['password'] ?></td>
                                <td>
                                    <?php
                                    if($status=="approved"){
                                        echo "<label style='color: green;font-weight:bold'>$status</label>";
                                    }elseif($status=="pending"){
                                        echo "<label style='color: red;font-weight:bold'>$status</label>";
                                    }
                                   ?>
                                </td>
                                <td>
                                    <a style="color:white;background:green;padding:10px 10px;text-decoration:none;border-radius:10px" href="approval.php?id=<?php echo $id; ?>">
                                      <i class="fa fa-check"> </i> Approval
                                    </a>
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
            