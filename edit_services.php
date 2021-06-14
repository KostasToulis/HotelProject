<!DOCTYPE html>

<?php 
    include_once 'includes/dbh.php';
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Επιλεγμένες Υπηρεσίες</title>

        <link rel="stylesheet" href="styleGeneral.css" type="text/css"/>
    </head>

    <body>

        <?php 
            include_once 'Header.php';

            error_reporting(0);
        ?>
        
    <div class ="container">
        <?php if (!empty($_POST)): ?>
        <?php
        $resid =  $_POST['resId'];
        $serid =  $_POST['serId'];

        $resid = $resid;
        $serid = $serid;
    
        $sql = "SELECT id_res FROM reservation";
        $result = mysqli_query($conn,$sql);
        $count = (int)mysqli_num_rows($result);

        if((($serid<7) and ($serid>0)) ){

            $sql = "INSERT INTO chosen_services (Service_no, id_res) VALUES ('$serid', '$resid'); ";
            $result = mysqli_query($conn,$sql);

            $sql = "SELECT Price FROM services WHERE Service_no=$serid";
            $result = mysqli_query($conn,$sql);
            $price = mysqli_fetch_array($result);
            
            $sql = "SELECT Price, Checkin, Checkout FROM reservation WHERE id_res=$resid";
            $result = mysqli_query($conn,$sql);
            $priceStart = mysqli_fetch_array($result);

            $date1 = new Datetime($priceStart[Checkin]);
            $date2 = new Datetime($priceStart[Checkout]);
            $interval = $date1->diff($date2);
            $interval = $interval->format('%a');
            
            $interval = (int)$interval;
            
            $price1 = (int)$priceStart[Price] + ((int)$price[Price] * $interval);

            $sql1 = "UPDATE reservation SET Price = '$price1' WHERE id_res='$resid';";
            $result = mysqli_query($conn,$sql1);

            header("refresh: 1, url=services_list.php");
        }else{
            echo "There was an error in your submissions";
            header("refresh: 1, url=services_list.php");
        }
        ?>


        <?php else: ?>
            <form action='edit_services.php' method='POST'>
            <div>
                <label for="resId">Id Κράτησης</label>  <br>
                <input type='number' name = "resId">
                </div>
            <br>
            <br>
                <label for="serId">Id Υπηρεσίας</label>  <br>
                <input type='number' name = "serId">
                </div>
                
                <input class="button1" type="submit" value="Υποβολή" name="">
            </form>
        

        <?php endif; ?>

    </div>
        <?php include_once 'Footer.html'; ?>
    </body>
</html>