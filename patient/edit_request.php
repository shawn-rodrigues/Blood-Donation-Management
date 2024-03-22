<?php 
session_start(); 
if(isset($_SESSION['email'])){
if(isset($_POST['update_request'])){
    include('../includes/connection.php');
    $query = "update requests set no_units = '$_POST[units]',blood_group = '$_POST[bgroup]',reason = '$_POST[reason]' where id = $_POST[pid]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
              alert('Request updated successfully...');
            window.location.href = 'patient_dashboard.php';  
          </script>";
    }
    else{
        echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'patient_dashboard.php';
          </script>";
    }
}
?>
<html>
    <head>
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
        <style>
            .donate-form{
                box-shadow: 3px 3px 3px gray;
                border-left: 1px solid gray;
                border-top: 1px solid gray;
                border-radius: 7px;
                padding: 7px;
            }

            .nav-link{
            color: white;
            opacity: 0.9;
            cursor: pointer;
            }

            .nav-link:hover{
                color: white;
                cursor: pointer;
                opacity: 1;
                text-decoration: underline;
            }
        </style>
    </head>
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
                <a class="nav-link" href="patient_dashboard.php">Back to Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
        </ul>
        </div>
    </nav>
    <div class="row" style="margin-top: 4%;">
        <div class="col-md-3 m-auto donate-form">
        <center><h4>Edit your request</h4></center><br>
        <?php 
            include('../includes/connection.php');
            $query = "select * from requests where id = $_GET[pid]";
            $query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="pid" value="<?php echo $_GET['pid'];?>">
                </div>
                <div class="form-group">
                    <label for="units">No of Units:</label>
                    <input type="text" class="form-control" name="units" value="<?php echo $row['no_units']; ?>">
                </div><br>
                <div class="form-group">
                    <label for="name">Blood Group:</label>
                    <select name="bgroup" class="form-control" required>
                        <option value=""><?php echo $row['blood_group']; ?></option>
                        <option value="A">A</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B">B</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div><br>
                <div class="form-group">
                    <label for="">Reason:</label>
                    <textarea name="reason" cols="45" rows="3" class="form-control"><?php echo $row['reason']; ?></textarea>
                </div><br>
                <input type="submit" class="btn btn-danger" name="update_request" value="Update">
            </form> 
        <?php     
            }
        ?>
        </div>
    </div>
</body>
</html>
<?php
}
else{
    header('Location:login.php');
}