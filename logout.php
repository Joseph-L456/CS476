<?php

    session_start();


if ($username != "Welcome"){



    if(isset($_SESSION))
    {
        unset($_SESSION);
    }


    session_destroy();

    
    $pdo = null;

    $username = "Welcome";
}

   header("Location: main.php");
   sleep(1);
   exit();



?>
