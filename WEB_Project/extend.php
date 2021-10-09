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
             $query1 = "SELECT * FROM borrow_book";
             $result1 = mysqli_query($conn, $query1) or die("Invalid query");
             $num1 = mysqli_num_rows($result1);
        
                    for($i=1; $i<=$num1; $i++)
                    {
                        $row = mysqli_fetch_row($result1);
                        
                        {
                             echo $i.".<br>";
                             echo "ISBN : ".$row[0]."<br>";
                             echo "book name : ".$row[1]."<br>";
                             echo "author name : ".$row[2]."<br>";
                             echo "publication year : ".$row[3]."<br>";
                             echo "borrower name : ".$row[4] ."<br>";
                             echo "email : ".$row[5] ."<br>";
                        } 
                     }

        mysqli_close($conn);
        ?>

        <form action ="extend2.php" method="POST" style="margin:auto;text-align:center;">

            <p style="font-size:25px;" id="add_p">
                <label>ISBN</label>
                <input type="text" id="isbn" name="ISBN" placeholder="Enter the ISBN number" required style="width:350px;
                height:40px;
                border: 1px solid black;
                font-size:25px;">

            </p>
            

            <input type="submit" value="submit" style="background-color:aliceblue;
            width:300px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">

        </form>
    </div>
    </body>
    </html>