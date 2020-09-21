<?php
    session_start();

    if(isset($_SESSION['username']))
    {
     header('location:./Admin/index.php');
    }
    
    include('includes/dbcon.php');
    error_reporting(0);
    include('controllers/user-login.php');
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="assets/img/login.ico">
    <title>َLogin</title>
    <link rel="stylesheet" href="assets/css/login.css">
  </head>
  <body>
    
    <form class="box" method="post" id="container">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submitBtn">
        <br>
        <br>
        
        <?php
            if($_SESSION['errorMessage'] != ""){
        ?>

        <div id="loginError">
            <strong>Error: </strong> <?php echo $_SESSION['errorMessage']; ?>
        </div>

        <?php } ?>
    </form>    

</body>
</html>
