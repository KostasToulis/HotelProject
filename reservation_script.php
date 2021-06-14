<?php

    include_once 'includes/dbh.php';

    error_reporting(0); 
    //Check if user has logged in
    $cookie_name = "user_id";
    if (!isset($_COOKIE['user_id'])){
        header("Location: loginPage.php");
    }


    $user_num = $_COOKIE['user_id'];
    $checkin = $_POST['checkinDate'];
    $checkout = $_POST['checkoutDate'];
    $adults = $_POST['numberofadults'];
    if (($adults < 0) or (!isset($adults))){
        $adults = 0;
    }
    $kids = $_POST['numberofkids'];
    if (($kids < 0)or (!isset($kids))){
        $kids = 0;
    }
    $single = $_POST['single'];
    if (($single < 0) or (!isset($single))){
        $single = 0;
    }
    $double = $_POST['double'];
    if (($double < 0) or (!isset($double))){
        $double = 0;
    }
    $triple = $_POST['triple'];
    if (($triple < 0) or (!isset($triple))){
        $triple = 0;
    }
    $four = $_POST['four'];
    if (($four < 0) or (!isset($four))) {
        $four = 0;
    }
    

    $visitors = $adults + $kids;
    if ($visitors <= 0) {
        header('reservation.php');
    }

    if ($checkin >= $checkout) {
        header('reservation.php');
    }
    
    //$breakfast = $_POST['breakfast'];
    if (!isset($_POST['breakfast'])){
        $breakfast = 0;
    } else {
        $breakfast = 4;
    }
    //$lunch = $_POST['lunch'];
    if (!isset($_POST['lunch'])){
        $lunch = 0;
    } else {
        $lunch = 8;
    }
    //$dinner = $_POST['dinner'];
    if (!isset($_POST['dinner'])){
        $dinner = 0;
    } else {
        $dinner = 10;
    }
    //$gym = $_POST['gym'];
    if (!isset($_POST['gym'])){
        $gym = 0;
    } else {
        $gym = 10;
    }
    //$spa = $_POST['spa'];
    if (!isset($_POST['spa'])){
        $spa = 0;
    } else {
        $spa = 20;
    }
    //$pool = $_POST['pool'];
    if (!isset($_POST['pool'])){
        $pool = 0;
    } else {
        $pool = 5;
    }

    
    $sql1 = "SELECT
            room.RoomNo,
            room.Room_Type
        FROM
            room
        LEFT JOIN reservation ON room.RoomNo = reservation.RoomNo
        WHERE
            (
                room.RoomNo NOT IN(
                SELECT
                    reservation.RoomNo
                FROM
                    reservation
                WHERE
                    (
                        '$checkout' >= Checkin AND '$checkout' <= Checkout
                    ) OR(
                        '$checkin' >= Checkin AND '$checkin' <= Checkout
                    )
            )
            );";

    $result = mysqli_query($conn,$sql1);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    $date1 = new Datetime($checkin);
    $date2 = new Datetime($checkout);
    $interval = $date1->diff($date2);
    
    $interval = $interval->format('%a');
    //$days = (int)$interval;
    $interval = (int)$interval;
    $services = ($breakfast+$lunch+$dinner+$gym+$spa+$pool)*$interval;
    if (!isset($services)){
        $services = 0;
    }
    $room_price = $interval*($single*40 + $double*70 + $triple*90 + $four*100);
    $total_price = $room_price + $sevices;
    $num_rooms = $single+$double+$triple+$four;

    $arr1 = array();
    $arr2 = array();
    $arr3 = array();
    $arr4 = array();

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)){

            if ($row['Room_Type']==1 and $single>0){
                array_push($arr1, $row['RoomNo']);
            } elseif ($row['Room_Type']==2 and $double>0){
                array_push($arr2, $row['RoomNo']);
            } elseif ($row['Room_Type']==3 and $triple>0){
                array_push($arr3, $row['RoomNo']);
            } elseif ($row['Room_Type']==4 and $four>0){
                array_push($arr4, $row['RoomNo']);

            }
        }
    } else {
        echo "Δεν υπάρχουν αρκετά δωμάτια διαθέσιμα. \r\n";
        header("refresh:2; url=index.php");
    }
    $payment = "Cash";
    $status = "Pending";
    $service_num = [];
    if ($breakfast>0){
        $breakfast = 1;
        array_push($service_num,$breakfast);
    }
    if ($lunch>0){
        $lunch = 2;
        array_push($service_num,$lunch);
    }
    if ($dinner>0){
        $dinner = 3;
        array_push($service_num,$dinner);
    }
    if ($gym>0){
        $gym= 4;
        array_push($service_num,$gym);
    }
    if ($spa>0){
        $spa = 5;
        array_push($service_num,$spa);
    }
    if ($pool>0){
        $pool = 6;
        array_push($service_num,$pool);
    }

    if (sizeof($arr1)<$single or sizeof($arr2)<$double or sizeof($arr3)<$triple or sizeof($arr4)<$four){
        echo "Δεν υπάρχουν αρκετά δωμάτια διαθέσιμα. \r\n";
        header("refresh:2; url=reservation.php"); 
    } else {
        while ($num_rooms > 0){
            if ($single > 0){
                $room1 = end($arr1);
                array_pop($arr1);
                $price1 = $interval*40+$services;
                $sql2 = "INSERT INTO reservation (RoomNo, Checkin, Checkout, id_user, Payment_Method, Price, Payment_Status) 
                    VALUES ('$room1', '$checkin', '$checkout', '$user_num', '$payment', '$price1', '$status');";
                $result2 = mysqli_query($conn,$sql2);
                $sql = "SELECT id_res FROM reservation ORDER BY id_res DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                    foreach ($service_num as $i){
                        $c = $row['id_res'];
                        $sql = "INSERT INTO chosen_services (Service_no, id_res) VALUES ('$i', '$c');";
                        $result = mysqli_query($conn,$sql);
                    }
                }
                $single = $single - 1;
            }
            if ($double > 0){
                $room2 = end($arr2);
                array_pop($arr2);
                $price2 = $interval*70+$services*2;
                $sql3 = "INSERT INTO reservation (RoomNo, Checkin, Checkout, id_user, Payment_Method, Price, Payment_Status) 
                    VALUES ('$room2', '$checkin', '$checkout', '$user_num', '$payment', '$price2', '$status');";
                $result3 = mysqli_query($conn,$sql3);
                $sql = "SELECT id_res FROM reservation ORDER BY id_res DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                    foreach ($service_num as $i){
                        $c = $row['id_res'];
                        $sql = "INSERT INTO chosen_services (Service_no, id_res) VALUES ('$i', '$c');";
                        $result = mysqli_query($conn,$sql);
                    }
                }
                
                $double = $double - 1;
            }
            if ($triple > 0){
                $room3 = end($arr3);
                array_pop($arr3);
                $price3 = $interval*90+$services*3;
                $sql4 = "INSERT INTO reservation (RoomNo, Checkin, Checkout, id_user, Payment_Method, Price, Payment_Status) 
                    VALUES ('$room3', '$checkin', '$checkout', '$user_num', '$payment', '$price3', '$status');";
                $result4 = mysqli_query($conn,$sql4);
                $sql = "SELECT id_res FROM reservation ORDER BY id_res DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                    foreach ($service_num as $i){
                        $c = $row['id_res'];
                        $sql = "INSERT INTO chosen_services (Service_no, id_res) VALUES ('$i', '$c');";
                        $result = mysqli_query($conn,$sql);
                    }
                }
                $triple = $triple - 1;
            }
            if ($four > 0){
                $room4 = end($arr4);
                array_pop($arr4);
                $price4 = $interval*100+$services*4;
                $sql5 = "INSERT INTO reservation (RoomNo, Checkin, Checkout, id_user, Payment_Method, Price, Payment_Status) 
                    VALUES ('$room4', '$checkin', '$checkout', '$user_num', '$payment', '$price4', '$status');";
                $result5 = mysqli_query($conn,$sql5);
                $sql = "SELECT id_res FROM reservation ORDER BY id_res DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                    foreach ($service_num as $i){
                        $c = $row['id_res'];
                        $sql = "INSERT INTO chosen_services (Service_no, id_res) VALUES ('$i', '$c');";                                 
                        $result = mysqli_query($conn,$sql);
                    }
                }
                $four = $four - 1;
            }
            $num_rooms = $single+$double+$triple+$four;
        }
    }
    echo "Επιτυχής Κράτηση";


    $check_user = $_COOKIE['user_id'];
    $sql = "SELECT * FROM billing_info WHERE id_user = '$check_user';";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result); 
    if ($count == 1) {
        header("refresh:1; url=index.php");
    } else {
        header("refresh:1; url=billingInfo.php");
    }
    


?>