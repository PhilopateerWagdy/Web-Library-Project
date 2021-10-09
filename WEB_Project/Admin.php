<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php
        session_start();

    ?>
    

    
    <?php
        /* update admin details */

        if(isset($_POST["newUserName"]) && isset($_POST["newUserPass"]))
        {
            $old_username = $_COOKIE["mycookie"];
            $old_pass = $_COOKIE["mycookie2"];
            $username = $_POST["newUserName"];
            $pass = $_POST["newUserPass"];

            if(isset($_SESSION["newUserName"]) || !isset($_SESSION["newUserName"]))
            {
                $_SESSION["newUserName"] = $username;
            }
            if(isset($_SESSION["newUserPass"]) || !isset($_SESSION["newUserPass"]))
            {
                $_SESSION["newUserPass"] = $pass;
            }

            $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
            mysqli_select_db($conn, 'library') or die (' test will not open');
            $query = "SELECT * FROM admin";
            $res = mysqli_query($conn, $query) or die("Invalid query");
            $num = mysqli_num_rows($res);
        
            for($i=1; $i<=$num; $i++)
            {
                $row = mysqli_fetch_row($res);
                if($row[0]==$old_username && $row[2]==$old_pass)
                {
                    $query = "UPDATE admin SET username='$username' WHERE username='$old_username' ";
                    $result = mysqli_query($conn, $query) or die("Invalid query");
                    $query2 = "UPDATE admin SET pass='$pass' WHERE pass='$old_pass' ";
                    $result2 = mysqli_query($conn, $query2) or die("Invalid query");
                }
            }

            mysqli_close($conn);

        }
    ?>


    <?php
        /* add book */

        if(isset($_POST["isbn"]) && isset($_POST["book_name"]) && isset($_POST["author_name"]) && isset($_POST["pub_year"]))
        {
            $isbn = $_POST["isbn"];
            $book_name = $_POST["book_name"];
            $author_name = $_POST["author_name"];
            $pub_year = $_POST["pub_year"];

            setcookie("my_isbn_cookie",$isbn,time()+3600*24);
            setcookie("my_book_cookie",$book_name,time()+3600*24);
            setcookie("my_author_cookie",$author_name,time()+3600*24);
            setcookie("my_year_cookie",$pub_year,time()+3600*24);

            if(isset($_COOKIE["my_isbn_cookie"]) && isset($_COOKIE["my_book_cookie"]) && isset($_COOKIE["my_author_cookie"]) && isset($_COOKIE["my_year_cookie"]))
            {
                session_start();
                if(!isset($_SESSION["isbn"]) || isset($_SESSION["isbn"]))
                {
                    $_SESSION["isbn"] = $isbn;
                }
                if(!isset($_SESSION["book_name"]) || isset($_SESSION["book_name"]))
                {
                    $_SESSION["book_name"] = $book_name;
                }
                if(!isset($_SESSION["author_name"]) || isset($_SESSION["author_name"]))
                {
                    $_SESSION["author_name"] = $author_name;
                }
                if(!isset($_SESSION["pub_year"]) || isset($_SESSION["pub_year"]))
                {
                    $_SESSION["pub_year"] = $pub_year;
                }
            }

        
            $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
            mysqli_select_db($conn, 'library') or die (' test will not open');
            $query = "INSERT into book (ISBN,book_name,author_name,publication_year) VALUES('$isbn','$book_name','$author_name','$pub_year')";
            $result = mysqli_query($conn, $query) or die("Invalid query");

            mysqli_close($conn);
        }

    ?>


    <?php
        /* update book details */ 

        if(isset($_POST["old_isbn"]) && isset($_POST["new_isbn"]) && isset($_POST["new_book_name"]) && isset($_POST["new_author_name"]) && isset($_POST["new_pub_year"]))
        {
            $old_isbn = $_POST["old_isbn"];
            $old_book_name ;
            $old_author_name ;
            $old_pub_year ;

            $new_isbn = $_POST["new_isbn"];
            $new_book_name = $_POST["new_book_name"];
            $new_author_name = $_POST["new_author_name"];
            $new_pub_year = $_POST["new_pub_year"];

            $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
            mysqli_select_db($conn, 'library') or die (' test will not open');
            $query = "SELECT * FROM book";
            $result = mysqli_query($conn, $query) or die("Invalid query outer");
            $num = mysqli_num_rows($result);
    
            for($i=1; $i<=$num; $i++)
            {
                $row = mysqli_fetch_row($result);
                if($row[0]==$old_isbn)
                {
                    $old_book_name = $row[1];
                    $old_author_name = $row[2];
                    $old_pub_year = $row[3];

                    if($row[0]==$old_isbn && $row[1]==$old_book_name && $row[2]==$old_author_name && $row[3]==$old_pub_year)
                    {
                        $query1 = "UPDATE book SET ISBN='$new_isbn' WHERE ISBN='$old_isbn' ";
                        $result1 = mysqli_query($conn, $query1) or die("Invalid query 1");
                        $query2 = "UPDATE book SET book_name='$new_book_name' WHERE book_name='$old_book_name' ";
                        $result2 = mysqli_query($conn, $query2) or die("Invalid query 2");
                        $query3 = "UPDATE book SET author_name='$new_author_name' WHERE author_name='$old_author_name' ";
                        $result3 = mysqli_query($conn, $query3) or die("Invalid query 3");
                        $query4 = "UPDATE book SET publication_year='$new_pub_year' WHERE publication_year='$old_pub_year' ";
                        $result4 = mysqli_query($conn, $query4) or die("Invalid query 4");
                   } 
                } 
            }

            mysqli_close($conn);

        }
    ?>


    <br>
    <h1 id="upper">WELCOME <?php echo " ".$_SESSION["newUserName"];?> </h1>
    <div id="admin_div">
        <ol>
            <li><a href="update_admin_det.php" >update details</a></li>
            <li><a href="add_book.php" >add a book</a></li>
            <li><a href="update_book_det.php" >update book details</a></li>
            <li><a href="browse_book_admin.php" >Browsing books</a></li>
            <li><a href="send_message.php" >sending emails to late brrowers</a></li>
            <li><a href="extend.php" >extinding borrowing period</a></li>
            <li><a href="University_Library.html" >logout</a></li>
        </ol>
    </div>


</body>

</html>