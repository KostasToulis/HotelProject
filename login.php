<?php 

include_once 'includes/dbh.php';

$user_mail = filter_var($_POST['userid'],FILTER_VALIDATE_EMAIL);
$user_pass = $_POST['userpass'];

$sql = "SELECT * FROM user WHERE email = '$user_mail' and passcode = '$user_pass'";
$result = mysqli_query($conn,$sql);
//$resultCheck = mysqli_num_rows($result);
echo $_COOKIE[$cookie_name];
$count = mysqli_num_rows($result);
      
// If result matched $myusername and $mypassword, table row must be 1 row

if($count == 1) {
   //session_register("usermail");
   $_SESSION['login_user'] = $user_mail;
   //echo $_SESSION['login_user'];
   $cookie_name = "logged_in";
   $cookie_value = true;
   setcookie($cookie_name, $cookie_value, time() + (86400), "/");
   $cookie_name = "user_id";
   while($row = $result->fetch_assoc()) {
      $cookie_value = $row['user_id'];
      setcookie($cookie_name, $cookie_value, time() + (86400), "/");
      echo $_COOKIE[$cookie_name];
   }
   
   header("location: loginPage.php");
   //echo "Logged in";
}else {
   //$error = "Your Login Name or Password is invalid";
   //echo $error;
   $cookie_name = "logged_in";
   $cookie_value = false;
   setcookie($cookie_name, $cookie_value, time() + (86400), "/");
   //echo "Cookie set to ".$_COOKIE[$cookie_name];
   header("location: loginPage.php");
}


?>
