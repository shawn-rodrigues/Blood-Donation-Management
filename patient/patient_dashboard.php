<?php
session_start();
if(isset($_SESSION['email'])){
include('../includes/connection.php');
$query = "select * from requests where patient_id = $_SESSION[uid]";
$query_run = mysqli_query($connection,$query);
$total_request = mysqli_num_rows($query_run);

$query = "select * from requests where patient_id = $_SESSION[uid] AND status = 1";
$query_run = mysqli_query($connection,$query);
$request_acc = mysqli_num_rows($query_run);

$query = "select * from requests where patient_id = $_SESSION[uid] AND status = 2";
$query_run = mysqli_query($connection,$query);
$request_rej = mysqli_num_rows($query_run);

$query = "select * from requests where patient_id = $_SESSION[uid] AND status = 1";
$query_run = mysqli_query($connection,$query);
$blood_requested = 0;
while($row = mysqli_fetch_assoc($query_run)){
    $blood_requested = $blood_requested + number_format($row['no_units']);
}
if(isset($_POST['request_blood'])){
    $query = "insert into requests values(null,$_SESSION[uid],'$_POST[units]','$_POST[bgroup]','$_POST[reason]',0)";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
              alert('Request submitted successfully...');
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
<!DOCTYPE html>
<html lang="en">
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
        body{
            background-color: #EFF5F5;
        }
        .info_card{
            box-shadow: 3px 3px 3px gray;
            height:200px;
            border-left:2px solid gray;
            border-top:2px solid gray;
            padding-top:4%;
            padding-left:3%;
            margin:2%;
            border-radius:3%;  
        }

        .info_card:hover{
            box-shadow: 3px 3px 3px gray;
            height:200px;
            border-left:2px solid gray;
            border-top:2px solid gray;
            padding-top:4%;
            padding-left:3%;
            margin:2%;
            border-radius:3%;
            height: 210px;
            font-size: large; 
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

    <script type="text/javascript">
        $(document).ready(function(){
            $("#request_blood").click(function(){
            $("#main-container").load("request_blood.php");
            });
        });

        $(document).ready(function(){
            $("#request_history").click(function(){
            $("#main-container").load("request_history.php");
            });
        });

    </script>
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
                <a class="nav-link" href="patient_dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="request_blood">Request Blood</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="request_history">Requests History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
        </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row" id="main-container">
            <div class="col-md-2 info_card">
                <h5 class="text-danger">Blood Requested</h5>
                <b>Total: <?php echo $blood_requested; ?> Units</b>
            </div>

            <div class="col-md-2 info_card">
                <h5 class="text-danger">Total Requests</h5>
                <b>Total: <?php echo $total_request; ?></b>
            </div>

            <div class="col-md-2 info_card">
                <h5 class="text-danger">Request Pending</h5>
                <b>Total: <?php echo $total_request - $request_acc - $request_rej; ?></b>
            </div>

            <div class="col-md-2 info_card">
                <h5 class="text-danger">Request Accepted</h5>
                <b>Total: <?php echo $request_acc; ?></b>
            </div>

            <div class="col-md-2 info_card">
                <h5 class="text-danger">Request Rejected</h5>
                <b>Total: <?php echo $request_rej ?></b>
            </div>
        </div>
    </div>
<div class="container-fluid">
<div class="row">
    <div class="col-md-12 bg-danger" id="footer">
        Made With Love ❤
    </div>
</div>
</div>
</body>
</html>
<?php 
}
else{
    header('Location:login.php');
}
?>