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
    $total_blood = 0;
    while($row = mysqli_fetch_assoc($query_result)){
        $total_blood = number_format($row['stock']);
    }
    $rem_blood = $total_blood - number_format($_GET['nu']);
    if(number_format($_GET['nu'])<=$total_blood){
        $query = "update stocks set stock = $rem_blood where blood_group = '$bgg'";
        $query_result = mysqli_query($connection,$query);

        $query1 = "update requests set status = 1 where id = $_GET[rid]";
        $query_result1 = mysqli_query($connection,$query1);
        if($query_result1){
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
        echo "<script type='text/javascript'>
            alert('Sorry No sufficient blood');
            window.location.href = 'admin_dashboard.php';
        </script>";
    }
}
else{
    header('Location:login.php');
}
?>