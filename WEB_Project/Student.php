<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php
        session_start();

    ?>


    <?php
        /* update student details */

        if(isset($_POST["newUserName"]) && isset($_POST["newUserPass"]))
        {
            $old_username = $_COOKIE["mycookie"];
            $old_pass = $_COOKIE["mycookie2"];
            $username = $_POST["newUserName"];
            $pass = $_POST["newUserPass"];

            if(isset($_SESSION["newUserName"]))
            {
                $_SESSION["newUserName"] = $username;
            }
            if(isset($_SESSION["newUserPass"]))
            {
                $_SESSION["newUserPass"] = $pass;
            }

            $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
            mysqli_select_db($conn, 'library') or die (' test will not open');
            $query = "SELECT * FROM student";
            $result = mysqli_query($conn, $query) or die("Invalid query");
            $num = mysqli_num_rows($result);
        
            for($i=1; $i<=$num; $i++)
            {
                $row = mysqli_fetch_row($result);
                if($row[0]==$old_username && $row[2]==$old_pass)
                {
                    $query = "UPDATE student SET username='$username' WHERE username='$old_username' ";
                    $result = mysqli_query($conn, $query) or die("Invalid query");
                    $query2 = "UPDATE student SET pass='$pass' WHERE pass='$old_pass' ";
                    $result2 = mysqli_query($conn, $query2) or die("Invalid query");
                }
            }

            mysqli_close($conn);

        }
    ?>

    <?php
        /* borrow a book */

        if(isset($_POST["b_isbn"]))
        {
            $isbn = $_POST["b_isbn"];
            setcookie("borrow",$isbn, time() +3600);
            if (isset($_COOKIE["borrow"]))
            {
           
                $book_name ;
                $author_name ;
                $pub_year ;
                $username = $_SESSION["newUserName"];
                $email ;

                $conn = mysqli_connect('localhost','root','') or die ('No connection');
                mysqli_select_db($conn, 'library') or die (' test will not open');
                $query = "SELECT * FROM book";
                $result = mysqli_query($conn, $query) or die("Invalid query outer");
                $num = mysqli_num_rows($result);
        
                for($i=1; $i<=$num; $i++)
                {
                    $row = mysqli_fetch_row($result);
                    if($row[0]==$isbn)
                    {
                        $book_name = $row[1];
                        $author_name = $row[2];
                        $pub_year = $row[3];

                        $query1 = "SELECT * FROM student";
                        $result1 = mysqli_query($conn, $query1) or die("Invalid query");
                        $num1 = mysqli_num_rows($result1);
            
                        for($i=1; $i<=$num1; $i++)
                        {
                            $row = mysqli_fetch_row($result1);
                            if($row[0]==$username)
                            {
                                $email = $row[1];
                            }
                        }

                        $query2 = "INSERT into borrow_book (b_ISBN,b_book_name,b_author_name,b_pub_year,borrower_un,borrower_email ) VALUES('$isbn','$book_name','$author_name','$pub_year','$username','$email')";
                        $result2 = mysqli_query($conn, $query2) or die("Invalid query");

                        $query3 = "DELETE FROM book WHERE ISBN='$isbn' ";
                        $result3 = mysqli_query($conn, $query3) or die("Invalid query");
                    } 
                }

                mysqli_close($conn);
            }
        }

    ?>


    <?php
        /* return a book */

        if(isset($_POST["r_isbn"]))
        {
            $r_isbn = $_POST["r_isbn"];

            $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
            mysqli_select_db($conn, 'library') or die (' test will not open');
            $query = "SELECT * FROM borrow_book";
            $result = mysqli_query($conn, $query) or die("Invalid query outer");
            $num = mysqli_num_rows($result);
    
            for($i=1; $i<=$num; $i++)
            {
                $row = mysqli_fetch_row($result);
                if($row[0]==$_POST["r_isbn"])
                {
                    $book_name = $row[1];
                    $author_name = $row[2];
                    $pub_year = $row[3];

                    $query2 = "DELETE FROM borrow_book WHERE b_ISBN='$r_isbn'";
                    $result2 = mysqli_query($conn, $query2) or die("Invalid query 2");

                    $query1 = "INSERT into book (ISBN,book_name,author_name,publication_year) VALUES('$r_isbn','$book_name','$author_name','$pub_year')";
                    $result1 = mysqli_query($conn, $query1) or die("Invalid query 1");

                } 
            }

            mysqli_close($conn);
        }

    ?>

    <br>
    <h1 id="upper">WELCOME <?php echo " ".$_SESSION["newUserName"];?> </h1>
    <div id="student_div">
        <ol>
            <li><a href="update_student_det.php" >update details</a></li>
            <li><a href="browse_book_student.php" >Browsing books</a></li>
            <li><a href="borrow_book.php" >borrowing a book</a></li>
            <li><a href="return_book.php" >returning a book</a></li>
            <li><a href="view_messages.php" >view the messages</a></li>
            <li><a href="University_Library.html" >logout</a></li>
        </ol>
    </div>


</body>

</html>