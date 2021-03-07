<?php 
    include "../includes/dbconnect.inc.php";

    session_start();

    $bookName = $_POST['search'];
    $category = $_POST['catg'];

    // THIS IS ASSUMONG THE TABLE ALREADY EXIST IN DB

    $query1= "SELECT * FROM BooksTable WHERE Bookname LIKE '%$bookName%'";
    //prepare the query
    $stmt = $conn->prepare($query1);

    // parameters
    // $stmt->bind_param("s",$bookName);   //s-string
    $stmt->execute();

    // saving the result in result datafiled
    $results = $stmt->get_result();

    if($results->num_rows === 0) {
        echo "<div id='foundBooks'>BOOK NOT FOUND IN DATABSE</div>";
    }
    else {
        while($row = $results->fetch_assoc()){
        
            echo "<div id='foundBooks'>
            <p> " .$row["Bookname"]."<i> Written by </i><b>".$row["Author"]."</b>, ".$row["Edition"]. " Edition, <a target=_blank href=".$row["PurchaseLink"].">Buy</a> </p>
            </div>";

        
        }

    }
   
    session_destroy();
?>