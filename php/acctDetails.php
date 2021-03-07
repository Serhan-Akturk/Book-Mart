<?php  
     include "../includes/dbconnect.inc.php";
     
     /**
      * This is to update the phone number and email of the user 
      */

     session_start();

          if(!isset($_POST['up'])){
               header("Location: ../html/dashboard.html");
          }
         

          try{
               // getting input from users
               $user = $_POST['acctUser'];
               $newEmail = $_POST['newEmail'];
               $newPhone = $_POST['newPhoneWhodis'];

                // XML PREVENTION
               $user = htmlspecialchars($user);

               $que = "SELECT * FROM userAccounts WHERE username = ?";
               $stmt = $conn->prepare($que);
               // parameters
               $stmt->bind_param("s",$user);   //s-string
               $stmt->execute();

               // saving the result in result datafiled
               $results =$stmt->get_result();


               if($results->num_rows === 0){
                    echo "Error Retrireving details";
               }
               else{
               
                    while($row = $results->fetch_assoc()){
                         try{
                              $updateQuery = "UPDATE userAccounts SET email = ? ,phoneNumber = ? WHERE username= '$user'";
                              $upStmt = $conn->prepare($updateQuery);
                              $upStmt->bind_param("ss",$newEmail,$newPhone);
                              $upStmt->execute();
     
                              if(!$conn){
                                   echo " Sorry It didn't work";
                              }
                              else{
                                   echo "<h4>ACCOUNT UPDATED</h4>";
                                   echo "<a href='../html/dashboard.html#'> <-Back</a>";
                              }
                         }catch(Exception $e){
                              echo $e->getMessage();
                         }
                        
                    }
               }

          }catch(Exception $e){
               echo $e->getMessage();
          }
         
     session_destroy();


?>