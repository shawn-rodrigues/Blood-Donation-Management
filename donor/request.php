<html>
    <body>
        <div class="row">
            <div class="col-md-6 m-auto">
            <br><center><h4><u>Donation Requests</u></h4><br></center>
            <table class="table">
                <thead>
                    <th>S.No</th>
                    <th>Donation ID</th>
                    <th>Units (in ml)</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from donation where donor_id = $_SESSION[uid]";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['no_units']; ?></td>
                            <td><?php if($row['status'] == 0){echo '<span class="badge bg-secondary">No Action</span>';}elseif($row['status'] == 1){echo '<span class="badge bg-success">Approved</span>';}else{echo '<span class="badge bg-danger">Rejected</span>';} ?></td>
                            <td><?php if($row['status'] == 0){?> <a href="edit_request.php?did=<?php echo $row['id']; ?>">Edit</a> | <a href="delete_request.php?did=<?php echo $row['id']; ?>">Delete</a> <?php } ?></td>
                        </tr>
                        <?php
                        $sno++;
                    }
                ?>
            </table> 
            </div>
        </div>  
    </body>
</html>