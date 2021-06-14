<!DOCTYPE html>

<?php 
    include_once 'includes/dbh.php';
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Ιστορικό</title>

        <link rel="stylesheet" href="styleGeneral.css" type="text/css"/>
    </head>

    <body>

        <?php 
            include_once 'Header.php';
            $cookie_name = "user_id";

            $sql = "SELECT * FROM reservation";
            $result = mysqli_query($conn,$sql);
            $res_his = array();
            $res_his = mysqli_query($conn,$sql);
            $cookie_name1 = "user_admin";

            error_reporting(0);
            date_default_timezone_set('Europe/Athens');
            $dt = date('Y-m-d');
            // $dt = $dt->format('Ymd');
        ?>
        
        <div class ="container2">

                <?php 
                    if(!isset($_COOKIE[$cookie_name1])){
                        echo "<p style='text-align:center'>Αν επιθυμείτε οποιαδήποτε αλλαγή στην κράτησή σας παρακαλούμε επικοινωνίστε μαζί μας με έναν από τους τρόπους που θα βρείτε στο κάτω μέρος της σελίδας.</p>";
                    }

                    echo "<h1>Ενεργές Κρατήσεις</h1>";
                    if(isset($_COOKIE[$cookie_name1])){
                        echo "<table border='2' style='border-collapse:collapse;border:2px solid #55555;color:#000000;width:100%'>"
                        ."<tr>
                           <th style='padding: auto; line-height:2em;'>Id Κράτησης</th>
                           <th style='padding: auto;'>Id Χρήστη</th>
                           <th style='padding: auto;'>Check-in</th>
                           <th style='padding: auto;'>Check-out</th>
                           <th style='padding: auto;'>Αριθμός Δωματίου</th>
                           <th style='padding: auto;'>Τρόπος Πληρωμής</th>
                           <th style='padding: auto;'>Τιμή</th>
                           <th style='padding: auto;'>Κατάσταση Κράτησης</th>
                           <th style='padding: auto;'>Επεξεργασία</th>
                           </tr>";

                        foreach($res_his as $reservation){
                            if ($reservation[Checkout] >= $dt){
                                echo "<tr>";
                                echo "<form action='edit_reservation.php' method='POST'>";
                                echo "<input type='hidden' name='res_id' value=$reservation[id_res]>";
                                echo "<td style='padding: auto; text-align:center;' > $reservation[id_res] </td>";
                                echo "<td style='padding: auto; text-align:center;' > $reservation[id_user] </td>";
                                echo "<td style='padding: auto; text-align:center;' ><input type='date' name='checkin' value = '$reservation[Checkin]'></td>";
                                echo "<td style='padding: auto; text-align:center;' ><input type='date' name='checkout' value = '$reservation[Checkout]'></td>";
                                echo "<td style='padding: auto; text-align:center;' ><input type='number' name='roomNo' value = '$reservation[RoomNo]'></td>";
                                echo "<td style='padding: auto; text-align:center;' ><select name='paymentMethod' value = '$reservation[Payment_Method]'>>
                                        <option value='cash'>Μετρητά</option>
                                        <option value='card'>Κάρτα</option>
                                        <option value='bank'>Κατάθεση</option>
                                    </select></td>";
                                echo "<td style='padding: auto; text-align:center;' ><input type='number' name='price' value = '$reservation[Price]'></td>";
                                echo "<td style='padding: auto; text-align:center;' ><select name='resState' value = '$reservation[Payment_Status]'>
                                <option value='pending'>Αναμένει Επιβεβαίωση</option>
                                <option value='confirmed'>Επιβεβαιώθηκε</option>
                                <option value='payed'>Πληρώθηκε</option>
                                <option value='payedDeposit'>Πληρώθηκε Μόνο Προκαταβολή</option>
                                </select></td>";
        
                                echo "<td style='padding: auto; text-align:center; font-size:0.8em;' >Διαγραφή; <input type='checkbox' name='delete'>  \r\n";
                                echo "<input type='submit' value='Αποθήκευση'></td>";
                                
                                echo "</tr>";
                                
                                echo "</form>";
                           }
                        }
                        echo "</table>";

                    }else {
                        echo "<table border='2' style='border-collapse:collapse;border:2px solid #55555;color:#000000;width:100%'>"
                        ."<tr>
                           <th style='padding: auto; line-height:2em;'>Αριθμός Δωματίου</th>
                           <th style='padding: auto;'>Check-in</th>
                           <th style='padding: auto;'>Check-out</th>
                           <th style='padding: auto;'>Τρόπος Πληρωμής</th>
                           <th style='padding: auto;'>Τιμή</th>
                           <th style='padding: auto;'>Κατάσταση Κράτησης</th>
                           </tr>";


                        foreach($res_his as $reservation){
                            if ( ($reservation[Checkout] >= $dt) && ($reservation[id_user] == $_COOKIE[$cookie_name])){
                                echo "<tr>";
                                $skip=0;
                                foreach($reservation as $vv){
                                    $skip++;
                                    if($skip==5 || $skip==1) continue;
                                    echo "<td style='padding: 15px;' > {$vv} </td>";
                                }
                                
                               echo "</tr>";
                            }
                        }
                        echo "</table>";
                    }


            
                echo "<h1>Ιστορικό Κρατήσεων</h1>";


                if(isset($_COOKIE[$cookie_name1])){
                    echo "<table border='2' style='border-collapse:collapse;border:2px solid #55555;color:#000000;width:100%'>"
                    ."<tr>
                       <th style='padding: auto; line-height:2em;'>Id Κράτησης</th>
                       <th style='padding: auto;'>Id Χρήστη</th>
                       <th style='padding: auto;'>Check-in</th>
                       <th style='padding: auto;'>Check-out</th>
                       <th style='padding: auto;'>Αριθμός Δωματίου</th>
                       <th style='padding: auto;'>Τρόπος Πληρωμής</th>
                       <th style='padding: auto;'>Τιμή</th>
                       <th style='padding: auto;'>Κατάσταση Κράτησης</th>
                       <th style='padding: auto;'>Επεξεργασία</th>
                       </tr>";


                    foreach($res_his as $reservation){

                        if ($reservation[Checkout] < $dt){
                            echo "<tr>";
                            echo "<form action='edit_reservation.php' method='POST'>";
                            echo "<input type='hidden' name='res_id' value=$reservation[id_res]>";
                            echo "<td style='padding: auto; text-align:center;' > $reservation[id_res] </td>";
                            echo "<td style='padding: auto; text-align:center;' > $reservation[id_user] </td>";
                            echo "<td style='padding: auto; text-align:center;' ><input type='date' name='checkin' value = '$reservation[Checkin]'></td>";
                            echo "<td style='padding: auto; text-align:center;' ><input type='date' name='checkout' value = '$reservation[Checkout]'></td>";
                            echo "<td style='padding: auto; text-align:center;' ><input type='number' name='roomNo' value = '$reservation[RoomNo]'></td>";
                            echo "<td style='padding: auto; text-align:center;' ><select name='paymentMethod' value = '$reservation[Payment_Method]'>>
                                    <option value='cash'>Μετρητά</option>
                                    <option value='card'>Κάρτα</option>
                                    <option value='bank'>Κατάθεση</option>
                                </select></td>";
                            echo "<td style='padding: auto; text-align:center;' ><input type='number' name='price' value = '$reservation[Price]'></td>";
                            echo "<td style='padding: auto; text-align:center;' ><select name='resState' value = '$reservation[Payment_Status]'>
                            <option value='pending'>Αναμένει Επιβεβαίωση</option>
                            <option value='confirmed'>Επιβεβαιώθηκε</option>
                            <option value='payed'>Πληρώθηκε</option>
                            <option value='payedDeposit'>Πληρώθηκε Μόνο Προκαταβολή</option>
                            </select></td>";
    
                            echo "<td style='padding: auto; text-align:center; font-size:0.8em;' >Διαγραφή; <input type='checkbox' name='delete'>  \r\n";
                            echo "<input type='submit' value='Αποθήκευση'></td>";
                            
                            echo "</tr>";
                            
                            echo "</form>";
                        }
                    }
                    echo "</table>";

                }else {
                    echo "<table border='2' style='border-collapse:collapse;border:2px solid #55555;color:#000000;width:100%'>"
                    ."<tr>
                       <th style='padding: auto; line-height:2em;'>Αριθμός Δωματίου</th>
                       <th style='padding: auto;'>Check-in</th>
                       <th style='padding: auto;'>Check-out</th>
                       <th style='padding: auto;'>Τρόπος Πληρωμής</th>
                       <th style='padding: auto;'>Τιμή</th>
                       <th style='padding: auto;'>Κατάσταση Κράτησης</th>
                       </tr>";


                    foreach($res_his as $reservation){
                        if (($reservation[Checkout] < $dt) && ($reservation[id_user] == $_COOKIE[$cookie_name])){
                            echo "<tr>";
                            $skip=0;
                            foreach($reservation as $vv){
                                $skip++;
                                if($skip==5 || $skip==1) continue;
                                echo "<td style='padding: 15px;' > {$vv} </td>";
                            }
                            
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                }

            ?>
        </div>

        <?php include_once 'Footer.html'; ?>
    </body>
</html>