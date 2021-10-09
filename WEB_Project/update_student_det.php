<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php
        session_start();
        /*
        echo "your Username : " .$_SESSION["newUserName"]. "<br>";
        echo "your Password : ".$_SESSION["newUserPass"]."<br>";
        */
    ?>

    <br>
    <h1 id="upper">WELCOME <?php echo " ".$_COOKIE["mycookie"];?> </h1>
    <div id="update_div">
        <h3>your Username <?php echo ": " . $_SESSION["newUserName"]?> </h3>
        <h3>your Password <?php echo ": " . $_SESSION["newUserPass"]?> </h3>
        <form method="POST" action="Student.php" id="update_student_form">
            <label style="color: white">New Username</label>
            <input type="text" id="newUserName" name="newUserName" placeholder="enter new username" > <br><br>

            <label style="color: white">New Password</label>
            <input type="password" id="newUserPass" name="newUserPass" placeholder="enter new password" > <br><br>

            <input type="submit" value="Submit" name="submit" >

        </form>

        <?php
        /*
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
            */
        ?>

    </div>


</body>

</html>