<?php 
session_start();
if(isset($_SESSION['email'])){
?>
<html>
    <head>
        <style>
            .donate-form{
                box-shadow: 3px 3px 3px gray;
                border-left: 1px solid gray;
                border-top: 1px solid gray;
                border-radius: 7px;
                padding: 7px;
            }
        </style>
    </head>
<body>
    <div class="row" style="margin-top: 4%;">
        <div class="col-md-3 m-auto donate-form">
        <center><h4>Blood Donation Form</h4></center><br>
        <form action="" method="post">
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
                <label for="units">No of Units:</label>
                <input type="text" class="form-control" name="units" placeholder="No of units (in ml)">
            </div><br>
            <div class="form-group">
                <label for="">Disease (if any)</label>
                <textarea name="disease" cols="45" rows="3" class="form-control" placeholder="Mention disecse if any (Optional)"></textarea>
            </div><br>
            <input type="submit" class="btn btn-danger" name="donate_submit" value="Submit">
        </form>
        </div>
        <div class="col-md-6 m-auto">
            <img src="../images/image2.jpg" class="img-fluid" style="border-radius:3%;">
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