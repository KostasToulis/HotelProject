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
            $cookie_name = "user_id";

            $sql = "SELECT reservation.id_user, reservation.id_res, chosen_services.Service_no, services.servName  FROM chosen_services INNER JOIN services ON chosen_services.Service_no = services.Service_no INNER JOIN reservation ON chosen_services.id_res = reservation.id_res ORDER BY reservation.id_res";
            $result = mysqli_query($conn,$sql);
            $ser = array();
            $ser = mysqli_query($conn,$sql);
            $cookie_name1 = "user_admin";

            error_reporting(0);
        ?>
        
        <div class ="container2">

                <?php 
                    echo "<h1>Επιλεγμένες Υπηρεσίες</h1>";
                    if(isset($_COOKIE[$cookie_name1])){
                        echo "<table border='2' style='border-collapse:collapse;border:2px solid #55555;color:#000000;width:100%'>"
                        ."<tr>
                           <th style='padding: auto; line-height:2em;'>Id Χρήστη</th>
                           <th style='padding: auto;'>Id Κράτησης</th>
                           <th style='padding: auto;'>Id Υπηρεσίας</th>
                           <th style='padding: auto;'>Επιλεγμένη Υπηρεσία</th>
                           <th style='padding: auto;'></th>
                           </tr>";
                
                        foreach($ser as $service){
                            echo "<tr>";

                            foreach($service as $vv){
                                echo "<td style='padding: 15px;' > {$vv} </td>";
                            }
                            
                            echo "<form action='delete_services.php' method='POST'>";
                            echo "<input type='hidden' name='res_id' value=$service[id_res]>";
                            echo "<input type='hidden' name='ser_id' value=$service[Service_no]>";
                            echo "<td style='padding: auto; text-align:center; font-size:0.8em;' ><input type='submit' value='Διαγραφή'></td>";
                            echo "</tr>";
                            echo "</form>";
                        }

                        echo "</table>";
                        
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='edit_services.php' style='color:black' class='button1'>Προσθήκη!</a> ";

                

                    }else {
                        echo "<table border='2' style='border-collapse:collapse;border:2px solid #55555;color:#000000;width:100%'>"
                        ."<tr>
                           <th style='padding: auto; line-height:2em;'>Id Κράτησης</th>
                           <th style='padding: auto;'>Id Υπηρεσίας</th>
                           <th style='padding: auto;'>Επιλεγμένη Υπηρεσία</th>
                           </tr>";
                
                        foreach($ser as $service){
                            if($service[id_user] == $_COOKIE[$cookie_name]){
                                echo "<tr>";
                                $skip=0;
                                foreach($service as $vv){
                                    $skip++;
                                    if($skip==1) continue;
                                    echo "<td style='padding: 15px;' > {$vv} </td>";
                                }
                        }
                        }

                        echo "</table>";
   
                    }

            ?>
        </div>

        <?php include_once 'Footer.html'; ?>
    </body>
</html>