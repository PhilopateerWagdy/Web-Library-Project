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
                             echo "username : ".$row[4] ."<br>";
                             echo "email : ".$row[5] ."<br>";
                        } 
                     }

        mysqli_close($conn);
        ?>

        <form action ="message.php" method="POST" style="margin:auto;text-align:center;">

        <p style="font-size:25px;" id="add_p">
            <label>email</label>
            <input type="text" id="isbn" name="emailMessage" placeholder="Enter the email" required style="width:350px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">

        </p>
        <p style="font-size:25px;">
        <label>message</label>
        <textarea  name="message" rows="4" cols="50" placeholder="Enter the message"></textarea>
        </p>

        <input type="submit" value="send" style="background-color:aliceblue;
        width:300px;
        height:40px;
        border: 1px solid black;
        font-size:25px;">

        </form>
    </div>
    </body>
    </html>