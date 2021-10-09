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
        $query = "SELECT * FROM student";
        $result = mysqli_query($conn, $query) or die("Invalid query");
        $num = mysqli_num_rows($result);
        for($i=0; $i<=$num; $i++)
        {
            $row = mysqli_fetch_row($result);
            if($row[0]==$_SESSION["newUserName"] )
            {
                if($row[3]!="")
                {
                    echo $row[3];
                }
                else
                {
                   // echo "you don't have masseges";
                }
            }
            
        }
        

        mysqli_close($conn);
        ?>

    </div>
    <form action="Student.php" method="POST" style="margin:auto;text-align:center;">
            <input type="submit" value="return to menu" style="background-color:aliceblue;
            width:300px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </form>
</body>
</html>