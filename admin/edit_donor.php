<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    if(isset($_POST['update_donor'])){
        $query = "update donors set name = '$_POST[name]',email = '$_POST[email]',password = '$_POST[password]',mobile = $_POST[mobile] where id = $_GET[did]";
        $query_result = mysqli_query($connection,$query);
        if($query_result){
            echo "<script type='text/javascript'>
                  alert('Donor updated successfully...');
                window.location.href = 'admin_dashboard.php';  
              </script>";
        }
        else{
            echo "<script type='text/javascript'>
                  alert('Error...Plz try again.');
                  window.location.href = 'admin_dashboard.php';
              </script>";
        }
    }

    $query = "select * from donors where id = $_GET[did]";
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){

?>
<html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/css//bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- jQuery file -->
    <script src="../includes/juqery_latest.js"></script>
    <body>
    <nav class="navbar bg-danger">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" style="color: white;" href="index.php">Blood Donation Bank</a>
            </div>
            <div style="color: white;">
                <strong>Name: </strong> <?php echo $_SESSION['name'];?>
            </div>
            <ul class="nav navbar">
            <li class="nav-item">
                <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="donors_list">Donors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="patients_list">Patients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="manage_donation">Donations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="manage_requests">Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
        </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 m-auto">
            <center><h4>Edit Donor</h4></center>
            <form action="" method="POST">
            <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
                </div><br>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                </div><br>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
                </div><br>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>" required>
                </div><br>
                <input type="submit" class="btn btn-danger" value="Update" name="update_donor">
            </form>
            </div>
        </div>
    </div>
<?php
    }
?>
    </body>
</html>
<?php
}
else{
    header('Location:login.php');
}