<!DOCTYPE html>
    
<html>

<head>

    <meta charset = "utf-8">
    <title>Αρχική Σελίδα</title>
    <link rel="stylesheet" href="styleGeneral.css" type="text/css"/>

</head>
<body>

<?php

// $sql = 'SELECT * FROM USER;';
//     $result = mysqli_query($conn,$sql);
//     $resultCheck = mysqli_num_rows($result);

//     if ($resultCheck >0) {
//        while ($row = mysqli_fetch_assoc($result)){
//            echo $row['FName']."<br>";
//        }
//     }

include_once 'Header.php';
//$cookie_name = 'user_mail';
//echo $_COOKIE[$cookie_name];
?>

    <div class = "grid-container">

        <div class="info">
            <h1>Info</h1>
            <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Proin sit amet tellus ut lacus iaculis fringilla ut vel massa. 
                    Donec quam diam, consequat nec turpis nec, vulputate suscipit erat. 
                    Curabitur fermentum quis est eget semper. Sed sed mollis odio, sit amet gravida magna. 
                    Mauris non accumsan urna. Cras consectetur semper urna aliquam mattis. 
                    Fusce tempus purus ut laoreet placerat. Morbi vel varius lectus. Suspendisse 
                    tincidunt ante id libero commodo, sed malesuada diam aliquet. Fusce non accumsan turpis. 
                    Donec est erat, tincidunt nec risus quis, ullamcorper bibendum libero. 
                    Nulla in imperdiet ligula. Duis ullamcorper tristique leo, sed suscipit lectus euismod a. 
                    Fusce tincidunt luctus malesuada. Nulla venenatis metus accumsan, tempus dui at, semper risus. 
                    Ut semper faucibus rutrum. Nam suscipit elementum arcu, sed molestie est vehicula et. 
                    Aliquam hendrerit nibh diam, scelerisque posuere diam interdum eget.
            </p>
            <hr>
        </div>
        <div class="img">
            <img src="images/hotel-front.jpg" alt = "hotel" class = "fit">
        </div>

        <div class="facilities">
                <h2>Οι εγκαταστάσεις μας</h2>
    
            
                <p>Fusce non accumsan turpis. Donec est erat, tincidunt nec risus quis, 
                ullamcorper bibendum libero. Nulla in imperdiet ligula. Duis ullamcorper tristique leo, 
                sed suscipit lectus euismod a. Fusce tincidunt luctus malesuada. Nulla venenatis metus 
                accumsan, tempus dui at, semper risus. Ut semper faucibus rutrum. Nam suscipit elementum arcu, 
                sed molestie est vehicula et. Aliquam hendrerit nibh diam, scelerisque posuere diam interdum eget.
                
                </p>

                
                <hr>

                <form action="/facilities.php">
                    <button class = "button1">Πιο αναλυτικά >></a>
                </form>
            </div>
    
            <div class = "img3">
                <img src="images/pool.jpg" alt="pool" class="fit">
            </div>
            
        <div class = "events">
            <h2>
                Εκδηλώσεις
            </h2>
            <p>
                    Integer vitae pellentesque mi, dictum vehicula urna. Phasellus 
                    ullamcorper quam vitae enim finibus, et venenatis lorem imperdiet. 
                    Sed imperdiet egestas quam. Nulla blandit ex venenatis tempor feugiat. 
                    Proin eu ante at mauris fringilla aliquet. Fusce eget ultrices elit, 
                    eget auctor diam. Curabitur at placerat ipsum, faucibus consequat dui. 
                    Nullam bibendum felis quis eleifend luctus. Nunc mattis aliquam sapien non tincidunt. 
                    Sed sit amet volutpat turpis. Nullam tincidunt, tellus nec vulputate euismod, 
                    nisl urna egestas arcu, nec vulputate nunc dolor non diam.
            </p>
            <hr>
        </div>
        <div class="img2">
            <img src="images/event-img.jpg" alt="event-img" class="fit">
        </div>

        <div class = "about">
            <h3>About us...</h3>
            <p>Duis vel efficitur nulla, in dictum nunc. Nullam luctus turpis vitae sapien posuere commodo. 
                Proin iaculis elit non libero mollis, id condimentum purus euismod. Nulla fringilla consectetur 
                massa eget ultrices. Mauris ullamcorper sit amet metus at ultricies. Pellentesque habitant 
                morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                
            </p>
            <hr>
        </div>
        <div class = "map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3131.6088565389755!2d21.786859315209753!3d38.28855897966914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzjCsDE3JzE4LjgiTiAyMcKwNDcnMjAuNiJF!5e0!3m2!1sel!2sgr!4v1555497790889!5m2!1sel!2sgr" width="600px" height="250px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        
    </div>

    <?php 
        include_once 'Footer.html';
    ?>
</body>

</html>
