<!DOCTYPE html>

<?php 
    include_once 'includes/dbh.php';
    $conn -> set_charset("utf8");
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
        ?>
        
        <div class ="container">
            <h1>Λίστα Χρηστών</h1>
            <p class="echo"> 
                <?php 
                    $cookie_name = "user_id";
                    
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn,$sql);
                    $res_his = array();
                    $res_his = mysqli_query($conn,$sql);
                    //while ($row_res = mysqli_query($conn,$sql))
                    //    $res_his[] = $row_res;
                    error_reporting(0); 

                    
                    echo "<table border='2' style='border-collapse:collapse;border:2px solid #55555;color:#000000;width:100%'>"
                         ."<tr>
                            <th style='padding: 30px;'>Id Χρήστη</th>
                            <th style='padding: 30px;'>Όνομα</th>
                            <th style='padding: 30px;'>Επώνυμο</th>
                            <th style='padding: 30px;'>Email</th>
                            <th style='padding: 30px;'>Αριθμός Ταυτότητας</th>
                            <th style='padding: 30px;'>Τηλέφωνο</th>
                            </tr>";
                    
                    // echo "<table><tr><th>Id Χρήστη</th><th>Όνομα</th><th>Επώνυμο</th><th>Email</th><th>Κωδικός</th><th>Αριθμός Ταυτότητας</th><th>Τηλέφωνο</th></tr>";
                    foreach($res_his as $v){
                        echo "<tr>";
                        $skip=0;
                        foreach($v as $vv){
                            $skip++;
                            if($skip==5) continue;
                            echo "<td style='padding: 15px;' > {$vv} </td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";

                ?>
            </p>
        </div>

    </body>



</html>