<?php
include_once 'includes/dbh.php';
$conn -> set_charset("utf8");

$id = $_POST['res_id'];
$ChIn = $_POST['checkin'];
$ChOut = $_POST['checkout'];
$RNo = $_POST['roomNo'];
$PMeth = $_POST['paymentMethod'];
$price = $_POST['price'];
$resState = $_POST['resState'];

if (isset($_POST['delete'])){
    $sql = "DELETE FROM reservation WHERE id_res='$id';";
}else{
    $sql = "UPDATE reservation SET Checkin = '$ChIn', Checkout = '$ChOut', RoomNo = '$RNo', 
        Payment_Method = '$PMeth', Price = '$price', Payment_Status = '$resState' WHERE id_res='$id';";
}

$result = mysqli_query($conn,$sql);
echo "Data updated! The page will refresh shortly...";
header("refresh:2; url = reservation_history.php");
?>