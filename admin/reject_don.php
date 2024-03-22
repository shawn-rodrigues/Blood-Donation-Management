<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    $query = "update donation set status = 2 where id = $_GET[did]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
            alert('Request approved successfully...');
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
else{
    header('Location:login.php');
}
?>