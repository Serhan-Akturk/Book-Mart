<?php 
    require "../includes/dbconnect.inc.php";
    session_start();

    try{
        // //////   TO CREATE A BOOK TABLE////////
        $sql = "CREATE TABLE IF NOT EXISTS BooksTable (
        	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        	Bookname VARCHAR(70) NOT NULL,
        	Author VARCHAR (70) NOT NULL,
            Category VARCHAR(30) NOT NULL,
            PublishingYear VARCHAR(20) NOT NULL,
            ISBN VARCHAR(20) NOT NULL,
        	Price VARCHAR(30) NOT NULL,
        	Edition VARCHAR(20)NOT NULL,
            PurchaseLink VARCHAR(8000)NOT NULL,
        	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        // // creating the tablez
        mysqli_query($conn, $sql);

        $data = "INSERT INTO BooksTable (Bookname,Author,Category,PublishingYear,ISBN,Price,Edition,PurchaseLink) VALUES 
            -- ('To Kill a Mockingbird','Harper Lee','Fiction','1960','0','8.99','1st','https://www.barnesandnoble.com/w/to-kill-a-mockingbird-harper-lee/1100151011?ean=9780446310789'), 
            -- ('Things Fall Apart', 'Chinua Achebe','Fiction','1958','0','11.99','2nd','https://www.barnesandnoble.com/w/things-fall-apart-chinua-achebe/1116754130?ean=9780385474542'),
            -- ('Moby-Dick','Herman Melville','Fiction','1851','0','11.95','1st','https://www.barnesandnoble.com/w/moby-dick-melville-herman/1110282307?ean=9781593080181'),
            -- ('The Hobbit','J.R.R Tolkien','Fiction','1937','0','51.99','Series 1','https://www.barnesandnoble.com/w/the-hobbit-and-the-lord-of-the-rings-j-r-r-tolkien/1000478022?ean=9780547928180'),
            -- ('Hamlet','William Shakespeare','Fiction','1603', '0','15.75','1st','https://www.barnesandnoble.com/w/hamlet-william-shakespeare/1130198883?ean=9780393929584'),
            -- ('Schindler`s List', 'Thomas Keneally','Non-Fiction','1982','0','15.50','1st','https://www.barnesandnoble.com/w/schindlers-list-thomas-keneally/1102298238?ean=9780671880316'),
            -- ('A Brief History of Time', 'Stephen Hawkins','Non-Fiction','1988','0','35.99','1st','https://www.barnesandnoble.com/w/the-illustrated-a-brief-history-of-time-stephen-hawking/1121946701?ean=9780553103748'),
            -- ('The Hate U Give','Angie Thomas','Fiction','2017','0','16.99','1st','https://www.barnesandnoble.com/w/the-hate-u-give-a-c-thomas/1124651146?ean=9780062498533'),
            -- ADDING TEXTBOOKS TO THE TABLE
            -- computer Science Section
            ('Refactoring:Improving the Design of Existing Code','Martin Fowler','Computer-Sceience','2018','9780134757599','53.99','2nd','https://www.barnesandnoble.com/w/refactoring-martin-fowler/1132517760?ean=9780134757599'),
            ('Data Structures and Algorithims in Java','Robert Lafore','Computer-Science','2002','9780672324536','58.49','2nd','https://www.barnesandnoble.com/w/data-structures-and-algorithms-in-java-robert-lafore/1100840388?ean=9780672324536'),
            ('Hands-On Data Structures and Algorithims With Python','Dr. Basant Agarwal & Benjamin Baka','Computer-Science','null','0','39.99','2nd','https://www.barnesandnoble.com/w/hands-on-data-structures-and-algorithms-with-python-second-edition-basant-agarwal/1129779566?ean=9781788995573'),
            ('Data Structures and Algorithims Analysis in C++','Clifford A. Shaffer','Computer-Science','2014','0','35.95','3rd','https://www.barnesandnoble.com/w/data-structures-and-algorithm-analysis-in-c-third-edition-clifford-a-shaffer/1105065841?ean=9780486485829'),
            ('Data Structures and Algorithims with Javascript','Michael McMillan','Computer-Science','2014','0','39.99','1st','https://www.barnesandnoble.com/w/data-structures-and-algorithms-with-javascript-michael-mcmillan/1116977811?ean=9781449364939'),
            ('Starting Out with Java','Tony Gaddis','Computer-Science','2018','9780134787961','165.84','4th','https://www.barnesandnoble.com/w/starting-out-with-java-tony-gaddis/1129759927?ean=9780134787961'),
            ('Fundamentals of Python: Data Structures','Kenneth Lambert','Computer-Science','2018','9780357122754','180.65','2nd','https://www.barnesandnoble.com/w/fundamentals-of-python-kenneth-lambert/1132533938?ean=9780357122754'),
            ('Intro to Python','Paul J. Deitel and Harvey Deitel','Computer-Science','2019','9780135404676','77.98','0','https://www.barnesandnoble.com/w/intro-to-python-for-computer-science-and-data-science-paul-j-deitel/1132519782?ean=9780135404676'),
            ('An Introduction to HTML and JavaScript','David R. Brooks','Computer-Science','2007','9781846286568','56.03','1st','https://www.barnesandnoble.com/w/books/1109857213?ean=9781846286568'),

            -- Biology Section
            ('Barrons AP Biology','Deborah T. Goldberg M.S','Biology','2018','0','16.99','0','https://www.barnesandnoble.com/w/barrons-ap-biology-deborah-t-goldberg/1101968094?ean=9781438008684'),
            ('CliffNotes AP Biology','Phillip E. Pack','Biology','2016','0','17.99','5th','https://www.barnesandnoble.com/w/cliffsnotes-ap-biology-5th-edition-phillip-e-pack/1123108948?ean=9780544784680'),
            ('Nursing School Entrance Exam prep 2019-2020','Kaplin Nursing','Biology','2018','9781506234540','23.39','4th','https://www.barnesandnoble.com/w/nursing-school-entrance-exams-prep-2019-2020-kaplan-nursing/1133094857?ean=9781506234540'),
            ('NCLEX-RN Prep Plus 2019','Kaplin Nursing','Biology','2019','9781506245355','49.49','3rd','https://www.barnesandnoble.com/w/nclex-rn-prep-plus-2019-kaplan-nursing/1133095325?ean=9781506245355'),

            -- History section
            ('The History of the Ancient World:Fall of Rome','James McPherson','History','2007','9780393930597','31.500','0','https://www.barnesandnoble.com/w/history-of-the-ancient-world-susan-wise-bauer/1102000405?ean=9780393059748'),
            ('A Students Guide to U.S History','WWillfred M. Mcclay','History','2000','0','8.00','New','https://www.barnesandnoble.com/w/a-students-guide-to-us-history-wilfred-m-mcclay/1118598952?ean=9781882926459'),
            ('AP U.S History,2020','John J. Newman','History','2019','0','23.70','New','https://www.barnesandnoble.com/w/advanced-placement-u-s-history-2020-edition-john-j-newman/1132064968?ean=9781531129125'),

            -- Art section
            ('The Dore illustrations for Dantes Divine Comedy','Gustave Dore','Art','1975','0','16.95','0','https://www.barnesandnoble.com/w/the-dor-illustrations-for-dantes-divine-comedy-gustave-dore/1130991231?ean=9780486232317'),
           
            -- Literature section
            ('Little Women','Louisa May Alcott','Literature','2004','0','8.95','0th','https://www.barnesandnoble.com/w/little-women-louisa-may-alcott/1116668150?ean=9781593081089'),
            ('Pride and Prejudice','Jane Austen','Literature','2004','0','6.95','0th','https://www.barnesandnoble.com/w/pride-and-prejudice-jane-austen/1116668146?ean=9781593082017'),
            ('Sense and Sensibility','Jane Austen','Literature','2004','0','5.95','0th','https://www.barnesandnoble.com/w/sense-and-sensibility-jane-austen/1116668147?ean=9781593081256'),
            ('War and Peace','Leo Tolstoy','Literature','2006','0','13.95','0th','https://www.barnesandnoble.com/w/war-and-peace-barnes-noble-classics-series-leo-tolstoy/1106017536?ean=9781593080730'),
            ('Frankenstein','Mary Shelley','Literature','2005','0','7.95','0th','unavalilable')

        ";

        if(mysqli_query($conn, $data)){
            // header('Location:../html/dashboard.html');
            echo "Successuly created table and added data";

        }

    }catch(Exception $e){
        echo $e->getMessage();
    }
   
    session_destroy();
?>