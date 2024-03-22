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
        <centre><h4>Blood Request Form</h4></centre><br>
        <form action="notification.php" method="POST">
            <div class="form-group">
                <label for="units">No of Units:</label>
                <input type="text" class="form-control" name="units" placeholder="No of units (in ml)">
            </div><br>
            
            <div class="form-group">
                <label for="name">Blood Group:</label>
                <select name="reqbgroup" class="form-control" required>
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
                <label for="">Reason</label>
                <textarea name="reason" cols="45" rows="3" class="form-control" placeholder="Mention the reason"></textarea>
            </div><br>
            <input type="submit" class="btn btn-danger" name="request_blood" value="Request">
        </form>
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
