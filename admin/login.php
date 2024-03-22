<?php
session_start();
if(isset($_POST['login'])){
    include('../includes/connection.php');
    $query = "select id,email,password,name from admins where email = '$_POST[email]' AND password = '$_POST[password]'";
    $query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
        $_SESSION['email'] = $_POST['email'];
        while($row = mysqli_fetch_assoc($query_run)){
            $_SESSION['name'] = $row['name'];
            $_SESSION['uid'] = $row['id'];
        }
        echo "<script type='text/javascript'>
          window.location.href = 'admin_dashboard.php';
        </script>";
    }
    else{
      echo "<script type='text/javascript'>
          alert('Please enter correct email and password.');
          window.location.href = 'login.php';
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
    <title>Admin Login</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/css//bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="../css/styles.css">    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="../index.php">Blood Donation Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../donor/login.php">Donor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../patient/login.php">Patient</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row" style="margin-top: 7%;">
            <div class="col-md-4 mx-auto" id="login-container">
                <center><h4>Admin Login Page</h4></center><hr><br>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email ID" required>
                    </div><br>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div><br>
                    <input type="submit" class="btn btn-danger" value="Login" name="login">
                </form>
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