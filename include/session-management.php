<?php


$time_duration = 30000;

if(isset($_SESSION['last_activity'])){
    // calculate the session lifetime 
    $elapsed_time = time() - $_SESSION['last_activity'];

    if( $elapsed_time > $time_duration ){
        session_unset();
        session_destroy();
        "<script>
        alert ('Session Destroyed');
        </script>";
        
        // header('Location: ../login.php');
        exit();
    }

}

$_SESSION['last_activity'] = time();
