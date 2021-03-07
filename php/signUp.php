
<?php 
    include "../includes/dbconnect.inc.php";

    session_start();

     //////////////////////////////////////////////
    ////////// Sign Up SECTION/////////////////////

    if(!isset($_POST['signUp'])){
        header('Location: ../html/lg.html');
    }
    
        $firstname = $_POST['FN'];
        $phoneNo = $_POST['phoneNo'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $userPW = $_POST['userPassword'];
        $confirmPW = $_POST['confirmPassword'];
    
        //xml$xxl prevention
        $firstname = htmlspecialchars($firstname);

        $phoneNo = htmlspecialchars($phoneNo);
        $email = htmlspecialchars($email);
        $username = htmlspecialchars($username);
    
        // hassing password
        $hassedPassword = password_hash($userPW,PASSWORD_DEFAULT);
        
        if($userPW !== $confirmPW){
            echo "<script>alert('Passwords did not match');</script>";
        }
    
        // query to search table in databse for existing account
        $query1 = "SELECT * FROM userAccounts WHERE email = ? AND username = ? ";
        // prepare the query
        $stmt = $conn->prepare($query1);
        // parameters
        $stmt->bind_param("ss",$email,$username);   //s-string
        $stmt->execute();
    
        // saving the result in result datafiled
        $results =$stmt->get_result();
    
        if($results->num_rows === 0) {
            $data = "INSERT INTO userAccounts (fullname,phoneNumber,email,username,userpassword) VALUES ('$firstname','$phoneNo','$email','$username','$hassedPassword')";
    
            if(mysqli_query($conn, $data)){
                header('Location:../html/dashboard.html');
            }
            else{
                // echo mysqli_error($conn);
                exit("USERNAME IS TAKEN");
                echo "<script>alert('Username is Taken');</script>";
            }    
        }

    
        
    session_destroy();
?>