<?php

include_once 'includes/dbh.php';
$conn -> set_charset("utf8");
//error_reporting(0); 

$card_num = $_POST['cardNum'];
$CVV = $_POST['cardCVV'];
$country = $_POST['ownerCountry'];
$city = $_POST['ownerCity'];
$street = $_POST['ownerStreet'];
$ZIP = $_POST['ownerPostCode'];
$holder = $_POST['cardOwner'];
$expiration = $_POST['cardDate'];

$check_user = $_COOKIE['user_id'];

$sql = "SELECT * FROM billing_info WHERE id_user = '$check_user';";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows(mysqli_query($conn,$sql));

if ($count == 1){
    $sql = "UPDATE billing_info SET Card_no = '$card_num', id_user = '$check_user', Street_name = '$street', 
        City = '$city', Postal_code = '$ZIP', CVV = '$CVV', Holder_name = '$holder', Exp_date = '$expiration', Country = '$country' WHERE id_user = '$check_user';";
    $result = mysqli_query($conn,$sql);
    echo "Τα στοιχεία σας ενημερώθηκαν";
    header("refresh:2 url=index.php");
} else {
    $sql = "INSERT INTO billing_info (Card_no, id_user, Street_name, City, Postal_code, CVV, Holder_name, Exp_date, Country) 
        VALUES ('$card_num', '$check_user', '$street', '$city', '$ZIP', '$CVV', '$holder', '$expiration', '$country') ;";
    $result = mysqli_query($conn,$sql);
    echo "Τα στοιχεία σας καταχωρήθηκαν";
    header("refresh:2 url=index.php");
}
?>