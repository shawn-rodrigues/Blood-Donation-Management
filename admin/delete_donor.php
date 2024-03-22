<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    $query = "delete from donors where id = $_GET[did]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
            alert('Donor deleted successfully...');
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