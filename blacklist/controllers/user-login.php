<?php
    if(isset($_POST['submitBtn']))
    {
        $uname = $_POST['username'];
        $pass = $_POST['password'];
    
        if($pass == 'qwerty' && $uname == 'user')
        {   
            //check usertype
            $_SESSION['username'] = $uname;
            
            header("location:./Admin/index.php");

        }
        else
        {
            $_SESSION['errorMessage'] = 'Wrong Credentials';
        }
    }

    ?>