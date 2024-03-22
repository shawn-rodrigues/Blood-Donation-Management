<html>
    <body>
        <div class="row">
            <div class="col-md-6 m-auto">
            <br><center><h4><u>List of all Patients</u></h4><br></center>
            <table class="table">
                <thead>
                    <th>S.No</th>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Patient Email</th>
                    <th>Mobile No</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from patients";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><a class="btn btn-sm btn-success" href="edit_patient.php?pid=<?php echo $row['id']; ?>">Edit</a> <a class="btn btn-sm btn-danger" href="delete_patient.php?pid=<?php echo $row['id']; ?>">Delete</a></td>
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