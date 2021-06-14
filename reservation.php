<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Κράτηση</title>

        <link rel="stylesheet" href="styleGeneral.css" type="text/css"/>
        <?php 
            if(!isset($_COOKIE['user_id'])){
                
                header("Location: loginPage.php");
            }
        ?>
    </head>

    <body>
    <?php include_once 'Header.php'; ?>

        <div class="container">
            <h1 class="title1">Κράτηση Δωματίου</h1>

            <form action="reservation_script.php" method="post" enctype="utf-8" class="my-form">
                <div>
                    <label for="checkinDate">Ημερομηνία Check-In</label> 
                    <input type='date' name = "checkinDate">
                </div>


                <div>
                    <label for="checkoutDate">Ημερομηνία Check-Out</label> 
                    <input type='date' name = "checkoutDate">
                </div>            
            
                <div>
                    <label for="numberofadults">Ενήλικες</label> 
                    <input type='number' name = "numberofadults">
                </div> 
                
                <div>
                    <label for="numberofkids">Παιδιά</label> 
                    <input type='number' name = "numberofkids">
                </div>             

                <table align = "center">
                    <tr>
                        <th style="text-align:left">Μονόκλινα</th>
                        <th style="text-align:left">Δίκλινα</th>
                    </tr>
                    <tr>
                        <td>
                            <input type = 'number' name = 'single'>
                        </td>
                        <td>
                            <input type = 'number' name = 'double'>
                        </td>
                    </tr>    
                    

                    
                    <tr>
                        <th style="text-align:left">Τρίκλινα</th>
                        <th style="text-align:left">Τετράκλινα</th>
                    </tr>
                    <tr>
                        <td>
                            <input type = 'number' name = 'triple'>
                        </td>
                        <td>
                            <input type = 'number' name = 'four'>
                        </td>
                    </tr>    
                    

                </table>

                <div style="text-align:left;">
                    <p>
                        Οι βασικές υπηρεσίες δωματίου παρέχονται με την κράτησή σας. Μπορείτε να επιλέξετε επιπλέον υπηρεσίες 
                        για έξτρα χρέωση.
                    </p>
                    <input type="checkbox" name="breakfast" value = "4">Πρωινό 4&#x20AC/άτομο<br>
                    <input type="checkbox" name="lunch" value = "8">Μεσημεριανό 8&#x20AC/άτομο<br>
                    <input type="checkbox" name="dinner" value = "10">Βραδινό 10&#x20AC/άτομο<br>
                    <input type="checkbox" name="gym" value = "10">Γυμναστήριο 10&#x20AC/άτομο<br>
                    <input type="checkbox" name="spa" value = "20">Σπα/Σάουνα/Μασσάζ 20&#x20AC/άτομο<br>
                    <input type="checkbox" name="pool" value = "5">Πισίνα 5&#x20AC/άτομο<br>
                </div>
                <input class="button1" type="submit" value="Έλεγχος Διαθεσιμότητας" name="">

            </form>
        

        </div>
        <?php include_once 'Footer.html'; ?>

    </body>

    <style>

        table {
            border-spacing: 40px 5px;
        }

    </style>
</html>