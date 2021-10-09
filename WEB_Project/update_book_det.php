<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php
        session_start();


    ?>

    <br>
    <h1 id="upper">WELCOME <?php echo " ".$_SESSION["newUserName"];?> </h1>

<div id="update_book_div">

    <?php
        
        $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
        mysqli_select_db($conn, 'library') or die (' test will not open');
        $query = "SELECT * FROM book";
        $result = mysqli_query($conn, $query) or die("Invalid query");
        $num = mysqli_num_rows($result);

        for($i=1; $i<=$num; $i++)
        {
            $row = mysqli_fetch_row($result);
            if(isset($row[0]) && isset($row[1]) && isset($row[2]) && isset($row[3]))
            {
                echo $i.".<br>";
                echo "ISBN : ".$row[0] ."<br>";
                echo "Book Name : ".$row[1] ."<br>";
                echo "Author Name : ".$row[2] ."<br>";
                echo "Publication Year : ".$row[3] ."<br><br><br>";
            } 
        }

        mysqli_close($conn);

    ?>

    <form action="Admin.php" method="POST" style="margin:auto;text-align:center;">

        <p style="font-size:25px;" id="add_p">
            <label>Old ISBN</label>
            <input type="text" id="isbn" name="old_isbn" placeholder="Enter old ISBN to update book" required style="width:350px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </p>

        <p style="font-size:25px;" id="add_p">
            <label>New ISBN</label>
            <input type="text" id="isbn" name="new_isbn" placeholder="Enter New ISBN" required style="width:300px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </p>

        <p style="font-size:25px;" id="add_p">
            <label>New Book Name</label>
            <input type="text" id="book_name" name="new_book_name" placeholder="Enter New Book Name" required style="width:300px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </p>

        <p style="font-size:25px;" id="add_p">
            <label>New Author Name</label>
            <input type="text" id="author_name" name="new_author_name" placeholder="Enter New Author Name" required style="width:300px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </p>

        <p style="font-size:25px;" id="add_p">
            <label>New Publication year </label>
            <input type="text" id="pub_year" name="new_pub_year" placeholder="Enter New Publication Year" required style="width:320px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </p><br><br>

  
        <input type="submit" value="Submit" style="background-color:aliceblue;
        width:300px;
        height:40px;
        border: 1px solid black;
        font-size:25px;">

    </form>

</div>



</body>

</html>