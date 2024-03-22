<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    $query = "delete from requests where id = $_GET[pid]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
            alert('Request Deleted successfully...');
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
else{
    header('Location:login.php');
}
?>