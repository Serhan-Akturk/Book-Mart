     
<?php 
    include "../includes/dbconnect.inc.php";
    session_start();   
         
     try{
        //////////////////////////////////////////////////////////
        ////////////LOGIN SECTION ////////////////////////
        if(empty($_POST['login']) || $_POST['login']== ''){
            header('Location: ../html/lg.html');
            die();
        }

        // getting data from form
        $username = $_POST['userID'];
        $userPassword = $_POST['userPW'];


        // For to get the hassed password first b4 verification
        $passquery = "SELECT userpassword FROM userAccounts WHERE username = ?";
        $stmtprp = $conn->prepare($passquery);
        $stmtprp->bind_param("s",$username);
        $stmtprp->execute();
        $res = $stmtprp->get_result();
        if($res->num_rows === 0){
            echo "No hassed password in database";
        }
        else{
            while( $row = $res->fetch_assoc()){
                $hassedPassword = $row['userpassword'];
                // echo $hassedPassword;
            }
        }

        // store data locally - Setting up local cookies
        setcookie($username,$userPassword, time()+60*60,"/","",0,0);


        // make sure no special characters cause an error and hasses the password
        $username = htmlspecialchars($username);

        // query to search table in databse for existing account
        $query = "SELECT * FROM userAccounts WHERE username = ?";
        // prepare the query
        $stmt = $conn->prepare($query);
        // parameters
        $stmt->bind_param("s",$username);   //s-string
        $stmt->execute();

        // saving the result in result datafiled
        $results =$stmt->get_result();

        if($results->num_rows === 0 || !password_verify($userPassword,$hassedPassword)) { 
            echo "<script>alert('Account not Found');</script>";
            header('Location:../html/lg.html');

        }
        elseif(password_verify($userPassword,$hassedPassword)) {
            header('Location:../html/dashboard.html');
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }
        
    session_destroy();
?>
