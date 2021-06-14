<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Στοιχεία Πληρωμής</title>

        <link rel="stylesheet" href="styleGeneral.css" type="text/css"/>
    </head>

    <body>
    <?php include_once 'Header.php'; 
    include_once 'includes/dbh.php';
    $conn -> set_charset("utf8");
    $check_user = $_COOKIE['user_id'];
    $sql = "SELECT * FROM billing_info WHERE id_user = '$check_user';";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows(mysqli_query($conn,$sql));
    
    ?>

 

        <div class="container">
        <h1 class="title1">Στοιχεία Πληρωμής</h1>
        
            <form action="billing_info_script.php" method="post" enctype="utf-8" class="my-form"> 
            
                <span class="col2">

                    
                    <h2>Διεύθυνση κατόχου</h2>  

                    
                    <div>
                    <label for="ownerCountry">Χώρα</label> 
                    <input type='text' name = "ownerCountry" id = "country" <?php if($count==1) echo "value = '$row[Country]'"?>>
                    </div>

                    <div>
                    <label for="ownerCity">Πόλη</label> 
                    <input type='text' name = "ownerCity" id = "city" <?php if($count==1) echo "value = '$row[City]'"?>>
                    </div>
                    
                    <div>
                    <label for="ownerStreet">Οδός</label> 
                    <input type='text' name = "ownerStreet" id = "street" <?php if($count==1) echo "value = '$row[Street_name]'"?>>
                    </div>

                    <div>
                    <label for="ownerPostCode">Τ.Κ.</label> 
                    <input type='text' name = "ownerPostCode" id = "postalCode" <?php if($count==1) echo "value = '$row[Postal_code]'"?>>
                    </div>

                </span>

                <span class="col2">
                    <h2>Στοιχεία Κάρτας</h2>  
                
                    <div>
                    <label for="cardNum">Κωδικός Πιστωτικής/ Χρεωστικής Κάρτας</label> 
                    <input type='number' name = "cardNum" id = "cardNumber" <?php if($count==1) echo "value = '$row[Card_no]'"?>>
                    </div>

                    <div>
                    <label for="cardCVV">Κωδικός CVV</label> 
                    <input type='number' name = "cardCVV" id = "CVV" <?php if($count==1) echo "value = '$row[CVV]'"?>>
                    </div>

                    <div>
                    <label for="cardDate">Ημερομηνία Λήξης</label> 
                    <input type='date' name = "cardDate" id = "cardDate" <?php if($count==1) echo "value = '$row[Exp_date]'"?>>
                    </div>
                    
                    <div>
                    <label for="cardOwner">Όνομα Κατόχου</label> 
                    <input type='text' name = "cardOwner" id = "ownerName" <?php if($count==1) echo "value = '$row[Holder_name]'"?>>
                    </div>

                </span>
                
                <input class="button1" type="submit" value="Υποβολή" name="">
            </form> 

        </div>
        <?php include_once 'Footer.html'; ?>
    </body>

</html>