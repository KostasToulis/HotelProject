<?php
    include_once 'includes/dbh.php';

    $selected_res = $_POST['res_id'];
    $selected_ser = $_POST['ser_id'];
    error_reporting(0); 

    $sql = "DELETE FROM chosen_services WHERE (Service_no=$selected_ser) AND (id_res=$selected_res);";
    $result = mysqli_query($conn,$sql);

    $sql = "SELECT Price FROM services WHERE (Service_no=$selected_ser)";
    $result = mysqli_query($conn,$sql);
    $price = mysqli_fetch_array($result);
    
    $sql = "SELECT Price, Checkin, Checkout FROM reservation WHERE (id_res=$selected_res)";
    $result = mysqli_query($conn,$sql);
    $priceStart = mysqli_fetch_array($result);

    $date1 = new Datetime($priceStart[Checkin]);
    $date2 = new Datetime($priceStart[Checkout]);
    $interval = $date1->diff($date2);
    $interval = $interval->format('%a');
    
    $interval = (int)$interval;
    
    $price1 = (int)$priceStart[Price] - ((int)$price[Price] * $interval);

    $sql1 = "UPDATE reservation SET Price = '$price1' WHERE id_res='$selected_res';";
    $result = mysqli_query($conn,$sql1);
    header("location:services_list.php");
?>