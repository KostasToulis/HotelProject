<?php

include_once 'includes/dbh.php';
$conn -> set_charset("utf8");

$first_name = $_POST['name'];
$last_name = $_POST['lastname'];
$user_pass = $_POST['userpass'];
$user_mail = $_POST['userid'];

$check_user = $_COOKIE['user_id'];

if (isset($_POST['user_tel'])){
    $phone = $_POST['user_tel'];
}else{
    $phone = null;
}
if (isset($_POST['idnumber'])){
    $ID_num = $_POST['idnumber'];
}else{
    $ID_num = null;
}


$sql = "UPDATE user SET FName = '$first_name', LName = '$last_name', email = '$user_mail', 
        passcode = '$user_pass', A_T = '$ID_num', Phone = '$phone'  WHERE id = '$check_user';";
$result = mysqli_query($conn,$sql);
echo "Τα στοιχεία σας ενημερώθηκαν";
header("refresh:2 url=Register_Page.php");

?>