<?php
    include "../includes/dbconnect.inc.php";

    session_start();
        if(!isset($_POST['sub'])){
            header ("Location: ../html/contact.html");
        }
        try{
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $msg = $_POST['msg'];

            // xml prevention
            $fullname = htmlspecialchars($fullname);
            $email = htmlspecialchars($email);
            $msg = htmlspecialchars($msg);

            // mail to admin account
            $msg = wordwrap($msg, 80);
            $to = 'aoyetibo@gmail.com';
            $subject = 'Mail Us';
            $headers = array('From' => $email, 'Reply-To' => $email,'X-Mailer' => 'PHP/'.phpversion());

            
            if(mail($to,$subject,$msg,$headers)){
                echo "<h4>Email Sent</h4>";
                echo "<a href ='../html/contact.html'>Back</a>";
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        

    session_destroy();

    

?>