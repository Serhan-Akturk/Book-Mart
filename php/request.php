<?php 
    include "../includes/dbconnect.inc.php";

    session_start();

        if(!isset($_POST['sub-req'])){
            header("Location: ../html/dashboard.html");
        }


        $Booktitle = $_POST['reqBook'];
        $category = $_POST['category'];

        // 
        $Booktitle = htmlspecialchars($Booktitle);

        try{
            $sql = "CREATE TABLE IF NOT EXISTS bookRequests (
                ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Booktitle VARCHAR(40) NOT NULL,
                Category VARCHAR(30) NOT NULL,
                request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        
            );";
            
            // QUERY TO CREATE TABLE
            mysqli_query($conn, $sql);

            // INSERTION QUERY INTO BOOK REQUEST TABLE
            try{
                $insData = "INSERT INTO bookRequests (Booktitle,Category) VALUES ('$Booktitle','$category')";
               
                echo '<table cellpadding=3 cellspacing=5 border=2 style=border-collapse: collapse>
                <tr>
                    <th>BookTitle</th>
                    <th>Category</th>
                    <th>Request-date</th>
                </tr>';
                if(mysqli_query($conn, $insData)){
                    // header('Location:../html/dashboard.html');
                    echo "<h4>YOUR REQUEST HAS BEEN PLACED</h4>";
                    echo "<a href='../html/dashboard.html'> <- BACK</a>";

                    echo "<br>";
                    echo "<h5>LIST OF BOOKS REQUESTED</h5>";
                   
                    $callTable = "SELECT * FROM bookRequests";
                    $stmt = $conn->prepare($callTable);
                    // parameters
                    // $stmt->bind_param("ss",$email,$username);   //s-string
                    $stmt->execute();

                  // saving the result in result datafiled
                    $results =$stmt->get_result();

                    if($results->num_rows === 0) {
                        echo "<div id='foundBooks'>No current Request</div>";
                    }
                    else {
                        while($row = $results->fetch_assoc()){
                            echo '<tr>
                                <td>'.$row['Booktitle'].'</td>
                                <td>'.$row['Category'].'</td>
                                <td>'.$row['request_date'].'</td>
                            </tr>';
                        }
                
                    }
                }
                else{
                    echo mysqli_error($conn);
                    exit("ERROR PLACING ORDER!!");
                    echo "<script>alert('ERROR PLACING ORDER!!');</script>";
                }  

                echo '</table>';
            }catch(Exception $e){
                echo $e->getMessage();
            }

        

        }catch(Exeception $e){
            echo $e->getMessage();
        }


    session_destroy();
?>