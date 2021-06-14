<?php

include_once 'includes/dbh.php';
$conn -> set_charset("utf8");

$first_name = $_POST['name'];
$last_name = $_POST['lastname'];
$user_pass = $_POST['userpass'];
$user_mail = $_POST['userid'];

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

//Check if any unique attributes already exist in database

$sql = "SELECT * FROM user WHERE email = '$user_mail';";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if ($count==0){
    //Insert data into database
    $sql = "INSERT INTO user (FName, LNAme, email, passcode, A_T, Phone) 
        VALUES ('$first_name', '$last_name', '$user_mail', '$user_pass', '$ID_num', '$phone');";  
        echo "User registered. You will be redirected to the main page shortly...";
        header("refresh:2; url = index.php");
    $result = mysqli_query($conn,$sql);
}else{
    echo "Some of your data are already being used";
    header("refresh:2; url = Register_Page.php");
}


?>