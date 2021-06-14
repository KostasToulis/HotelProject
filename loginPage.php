<!DOCTYPE html> 
<html> 

  <head>
    <meta charset = "utf-8">
      <title> Login page </title>

      <link rel="stylesheet" href="styleGeneral.css" type="text/css"/>
  </head>


  <body>
  <?php include_once 'Header.php'; ?>

    <div class="containerLogin">
        <h1 class=title1> Σύνδεση χρήστη </h1>

        <form action = "loginpage_script.php" method="post" enctype="utf-8" class="my-form"> 

            <div class = "top">  
            <label for="userid">Εισάγετε το email σας</label> 
            <input type="text" name="userid" id="email"> 
            </div>
            
            <div>
            <label for="userpass">Εισάγετε τον κωδικό σας</label> 
            <input type='password' name = "userpass" id = "password">
            </div>
            
            <div>
                <input class="button1" type="submit" value="Εισαγωγή" name="">
            </div>
        </form> 
    </div> <!--container end-->

    <?php include_once 'Footer.html'; ?>

  </body> 

</html>