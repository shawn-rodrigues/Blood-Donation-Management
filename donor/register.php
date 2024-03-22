<?php
if(isset($_POST['register'])){
    include('../includes/connection.php');
    $query = "insert into donors values(null,'$_POST[name]','$_POST[email]',$_POST[mobile],'$_POST[bgroup]','$_POST[password]')";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
              alert('Donor registered successfully...');
            window.location.href = 'login.php';  
          </script>";
    }
    else{
        echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
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
    <title>Login Page</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/css//bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="index.php">Blood Donation Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin/login.php">Admin</a>
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
        <div class="row" style="margin-top: 5%;">
            <div class="col-md-4 mx-auto" id="login-container">
                <center><h4>Register Page</h4></center>
                <form action="" method="POST">
                <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                    </div><br>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email ID" required>
                    </div><br>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="number" class="form-control" name="mobile" placeholder="Mobile No." required>
                    </div><br>
                    <div class="form-group">
                        <label for="name">Blood Group:</label>
                        <select name="bgroup" class="form-control" required>
                            <option value="">-Select-</option>
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
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div><br>
                    <input type="submit" class="btn btn-danger" value="Register" name="register">
                    <strong>Already registered? </strong><a href="login.php">Login here</a>
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