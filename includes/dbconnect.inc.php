<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try{
        $conn = new mysqli("localhost","oyetibo","anuoluwa6928","oyetibo_");
        $conn->set_charset("utf8mb4");


        //if we wanted to create databse if we had none
        // $DBcreate = "CREATE DATABASE groupFinalDB";
        // $conn->query($DBcreate);

        // $sql = "CREATE TABLE IF NOT EXISTS userAccounts (
        // 	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        // 	fullname VARCHAR(30) NOT NULL,
        //  phoneNumber VARCHAR(30) NOT NULL,
        // 	email VARCHAR(30) NOT NULL,
        // 	username VARCHAR(40),
        // 	userpassword VARCHAR(70),
        // 	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        // )";

        // // query to create table in DB
        // mysqli_query($conn, $sql);

    }catch(Exception $e){
        //logging error onto a file in the server
        error_log($e->getMessage());
        // die(mysqli_connect_error());
        exit('Error connecting to database'); //easy msg for client
    }

?> 