<html>
    <body>
        <div class="row">
            <div class="col-md-10 m-auto">
            <br><center><h4><u>Manage Donation Request</u></h4><br></center>
            <table class="table">
                <thead>
                    <th>S.No</th>
                    <th>Donation ID</th>
                    <th>Donor Name</th>
                    <th>Mobile No</th>
                    <th>Blood group</th>
                    <th>Units(in ml)</th>
                    <th>Disease</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from donation where status = 0";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        $query1 = "select name,mobile from donors where id = $row[donor_id]";
                        $query_run1 = mysqli_query($connection,$query1);
                        while($row1 = mysqli_fetch_assoc($query_run1)){
                            if($row['blood_group'] == 'A+'){
                                $bg = 'AP';
                            }elseif($row['blood_group'] == 'B+'){
                                $bg = 'BP';
                            }elseif($row['blood_group'] == 'AB+'){
                                $bg = 'ABP';
                            }elseif($row['blood_group'] == 'O+'){
                                $bg = 'OP';
                            }else{
                                $bg = $row['blood_group'];
                            }
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row1['name']; ?></td>
                            <td><?php echo $row1['mobile']; ?></td>
                            <td><?php echo $row['blood_group']; ?></td>
                            <td><?php echo $row['no_units']; ?></td>
                            <td><?php echo $row['disease']; ?></td>
                            <td><?php if($row['status'] == 0){echo '<span class="badge bg-secondary">No Action</span>';} ?></td>
                            <td><a class="btn btn-sm btn-success" href="accept_don.php?did=<?php echo $row['id']; ?>&bg=<?php echo $bg; ?>&nu=<?php echo $row['no_units'];?>">Approve</a>
                            <a class="btn btn-sm btn-danger" href="reject_don.php?did=<?php echo $row['id']; ?>">Reject</a></td>
                        </tr>
                        <?php
                        }
                        $sno++;
                    }
                ?>
            </table> 
            </div>
        </div>  
    </body>
</html>