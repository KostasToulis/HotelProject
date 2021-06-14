<!DOCTYPE html>

<html>

<head>

    <meta charset = "utf-8">
    <title> Στοιχεία χρήστη</title>
    <link rel="stylesheet" href="styleGeneral.css" type="text/css"/>

</head>

<body>
<?php include_once 'Header.php'; 
include_once 'includes/dbh.php';
$conn -> set_charset("utf8");


if (isset($_COOKIE['user_id'])) {
    $check_user = $_COOKIE['user_id'];
    $sql = "SELECT * FROM user WHERE id = '$check_user';";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
}else $count=0;

?>

<div class="container">
<h1 class="title1">Στοιχεία Χρήστη</h1>
<hr>

    <form method="POST" enctype="utf-8" class = "my-form" <?php if($count!=0) echo "action='user_update_script.php'"; else echo "action='register_script.php'";?>>
        <span class ="col2">
            <div>        
                <label for = "name"> Όνομα*:</label>
                <input type = "text" name = "name" id = "first_name" required  <?php if($count!=0) echo "value='$row[FName]'";?>>
            </div>
            <div>
                <label for = "userpass"> Κωδικός*:</label>
                <input type = "password" name = "userpass" id = "password" class="right" required <?php if($count!=0) echo "value='$row[passcode]'";?>>    
            </div>
            <div>
                <label for = "userid"> Email*:</label>
                <input type = "email" name = "userid" id = "email" required <?php if($count!=0) echo "value='$row[email]'";?>>
            </div>
            <div>    
                <label for = "user_tel"> Τηλέφωνο:</label>
                <input type ="tel" name = "user_tel" id = "telephone" <?php if($count!=0) echo "value='$row[Phone]'";?>>
            </div>  
        </span>
        <span class="col2">
            <div>       
                <label for = "lastname"> Επίθετο*:</label>
                <input type = "text" name = "lastname" id = "last_name" required <?php if($count!=0) echo "value='$row[LName]'";?>>
            </div>
            <div>
                <label for = "passagain"> Επανάληψη κωδικού*:</label>
                <input type = "password" name = "passagain" id = "password_again"  class=right required>
            </div>
            <div>
                <label for = "idnumber"> Αριθμός Ταυτότητας:</label>
                <input type = "text" name = "idnumber" id = "ID"  class=right <?php if($count!=0) echo "value='$row[A_T]'";?>>
            </div>
        </span>
        <div class= "it">
            <i>Τα πεδία με * είναι απαραίτητα</i>
        </div>
        <div style ='align:center'>
                <input type = "submit" class = "button1" value="Υποβολή">
        </div>
    </form>
</div> <!--container end-->
<?php include_once 'Footer.html'; ?>
</body>

</html>

<script>
    document.addEventListener("submit", preventLoad);
    // document.addEventListener("oninput", preventLoad);

    function preventLoad(e){
        if(!checkData(document.getElementById('my-form'))) e.preventDefault();
        if(!checkPass(document.getElementById('my-form'))) e.preventDefault();
    }

    function checkData(form){
        var inputs = document.getElementsByTagName('input');

        for (var i = 0; i < inputs.length; i++) {
            if(inputs[i].hasAttribute("required")){
                if(inputs[i].value == ""){
                    return false;
                }
            }
            if (!inputs[i].checkValidity()){
                return false;
            }
        }
        return true;
    }

    function checkPass(form){
        var pass = document.getElementById('password');
        var pass2 = document.getElementById('password_again');
        if (pass.value != pass2.value) {
            pass.setCustomValidity('Password Must be Matching!');
            pass2.setCustomValidity('Password Must be Matching!');
            return false;
        } else {
            pass.setCustomValidity("");
            pass2.setCustomValidity("");
            return true;
        }
    }

</script>