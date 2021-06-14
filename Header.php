<!DOCTYPE html>

<!-- <html lang="en" xmlns="http://www.w3.org/1999/xhtml"> -->
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style-headfoot.css" type="text/css"/>
    <title>Header </title>
</head>
<body class="headfoot">
    <header class="headfoot">
        <a href="index.php" class="return"><img src="images/logoNew.png" alt="Home" style="width:140px; margin:15px"></a>
        
        <ul class = "headstyle">
            <li class="res">
                <!-- <a href="reservation.php">Κράτηση</a> -->
            </li>
            <li>
                <a href="facilities.php">Εγκαταστάσεις</a>
            </li>
            <li>
                <a href="events.php">Εκδηλώσεις</a>
            </li>
            <li>
                <a href="rooms.php">Δωμάτια</a>
            </li>
            
            <li class = "dropdown">
                <div style = "color: white; margin-left: 10px;" id = "user">Χρήστης &#8595</div>
                <div class = "dropdown-content">     
                </div>

            </li>        
        </ul>
    
    </header>


      
</body>
<script>
function headLoggedin(){
    var location1 = document.getElementsByClassName("res");
    var a = document.createElement("a");
    a.href = "reservation.php";
    a.textContent = "Κράτηση";
    location1[0].appendChild(a);

    var location = document.getElementsByClassName("dropdown-content");
    var a = document.createElement("a");
    a.href = "logOut.php";
    a.textContent = "Αποσύνδεση";
    location[0].appendChild(a);

    var a = document.createElement("a");
    a.href = "Register_Page.php";
    a.textContent = "Στοιχεία Χρήστη";
    location[0].appendChild(a);

    var a = document.createElement("a");
    a.href = "reservation_history.php";
    a.textContent = "Κρατήσεις";
    location[0].appendChild(a);

    var a = document.createElement("a");
    a.href = "services_list.php";
    a.textContent = "Υπηρεσίες";
    location[0].appendChild(a);

    var a = document.createElement("a");
    a.href = "billingInfo.php";
    a.textContent = "Στοιχεία Πληρωμής";
    location[0].appendChild(a);
}

function headNOTLoggedin(){
    var location1 = document.getElementsByClassName("res");
    var a = document.createElement("a");
    a.href = "reservation.php";
    a.textContent = "Κράτηση";
    location1[0].appendChild(a);
    
    var location = document.getElementsByClassName("dropdown-content");
    var a = document.createElement("a");
    a.href = "loginPage.php";
    a.textContent = "Σύνδεση";
    location[0].appendChild(a);

    var a = document.createElement("a");
    a.href = "Register_Page.php";
    a.textContent = "Εγγραφή";
    location[0].appendChild(a);
}

function headAdmin(){
    var location = document.getElementsByClassName("dropdown-content");
    var a = document.createElement("a");
    a.href = "logOut.php";
    a.textContent = "Αποσύνδεση";
    location[0].appendChild(a);

    var a = document.createElement("a");
    a.href = "reservation_history.php";
    a.textContent = "Κρατήσεις";
    location[0].appendChild(a);

    var a = document.createElement("a");
    a.href = "services_list.php";
    a.textContent = "Υπηρεσίες";
    location[0].appendChild(a);

    var a = document.createElement("a");
    a.href = "users.php";
    a.textContent = "Χρήστες";
    location[0].appendChild(a);
}
</script>

<?php
    $cookie_name = "logged_in_project";
    $cookie_name1 = "user_admin";
    if(isset($_COOKIE[$cookie_name1])){
        echo "<script> headAdmin(); </script>";
    }
    elseif(isset($_COOKIE[$cookie_name])){
        echo "<script> headLoggedin(); </script>";
    }else{
        echo "<script> headNOTLoggedin(); </script>";
    }
?>

</html>