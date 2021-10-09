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
        This username are not signed in or there is an error in password <br>
        please enter a new username and password. 
    </div>
    <form action="University_Library.html" method="POST" style="margin:auto;text-align:center;">
            <input type="submit" value="return to menu" style="background-color:aliceblue;
            width:300px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </form>
</body>
</html>