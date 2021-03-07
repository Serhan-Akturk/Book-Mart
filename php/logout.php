<?php
    include "../php/logIn.php";
    session_start();
        // Unset all of the session variables.
        echo '<script>alert("Loggin out");</script>';
        unset($_POST['userID']);
        header("Location: ../html/index.html");
        exit();
        // Include URL for Login page to login again.
        // if(isset($_POST['userID'])){
        //     header("Location: ../html/index.html");
        //     exit;
        // }
    session_destroy();

?>