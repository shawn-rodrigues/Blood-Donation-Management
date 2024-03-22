<?php 
    session_start();
    if(isset($_SESSION['email'])){
    include('../includes/connection.php');
    if($_GET['bg'] == 'AP'){
        $bgg = 'A+';
    }elseif($_GET['bg'] == 'BP'){
        $bgg = 'B+';
    }elseif($_GET['bg'] == 'ABP'){
        $bgg = 'AB+';
    }elseif($_GET['bg'] == 'OP'){
        $bgg = 'O+';
    }else{
        $bgg = $_GET['bg'];
    }
    $query = "select stock from stocks where blood_group = '$bgg'";
    $query_result = mysqli_query($connection,$query);
    $total_avail = 0;
    while($row = mysqli_fetch_assoc($query_result)){
        $total_avail = number_format($row['stock']);
    }

    $total_donation = number_format($_GET['nu']) + $total_avail;
    $query = "update stocks set stock = $total_donation where blood_group = '$bgg'";
    $query_result = mysqli_query($connection,$query);

    $query = "update donation set status = 1 where id = $_GET[did]";
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
