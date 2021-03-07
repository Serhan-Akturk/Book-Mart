<?php 

        // this is to update the table in the databse incase a user forgets his/her password

    include "../includes/dbconnect.inc.php";
    session_start();
        if(!isset($_POST['chg-pass'])){
            header("Location:../html/lg.html#fg-pass");
        }

        /**
         * Try and catch blocks to get proper and more precise errors
         */
        try{
             // getting user inputs
            $email = $_POST['fg-email'];
            $newPassword = $_POST['newPass'];

            // xxl/xml prevention
            $email = htmlspecialchars($email);
            //hassing the new password
            $newHassedPassword = password_hash($newPassword,PASSWORD_DEFAULT);  

            //quering the database, first check if the email/iser actually exist before performing anything
            $queryReq = "SELECT userPassword FROM userAccounts WHERE email = ?";
            $stmtReq = $conn ->prepare($queryReq);
            $stmtReq->bind_param("s",$email);
            $stmtReq->execute();

            $results = $stmtReq->get_result();

            if($results->num_rows === 0) {header("Location:../html/lg.html#fg-pass"); echo "<script>alert('User Does not exist/ Incorrect Email');</script>";}
            else{
                try{
                    $updatePasswordQuery = "UPDATE userAccounts SET userPassword = ? WHERE email = '$email'";
                    $stmPass =  $conn->prepare($updatePasswordQuery);
                    $stmPass->bind_param("s",$newHassedPassword);
                    $stmPass->execute();

                    if(!$conn){
                        echo "<h5>Sorry Unable to Reset Password</h5>";
                        echo "<a href='../html/lg.html#fg-pass'>Try Again</a>";
                   }
                   else{
                        echo "<h5>Password Reset Sucessfull</h5>";
                        echo "<a href='../html/lg.html'> Login</a>";
                   }
                }catch(Exception $e){
                    echo $e->getMessage();
                }
            
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
       

    session_destroy();
?>