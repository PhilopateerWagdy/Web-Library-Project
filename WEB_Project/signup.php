<html>

<body>

<?php
    $username = $_POST["newUserName"];
    $pass = $_POST["newUserPass"];
    $email = $_POST["newUserEmail"];
    $role = $_POST["role"];
    setcookie("mycookie",$username,time()+3600*24);
    setcookie("mycookie2",$pass,time()+3600*24);
    setcookie("mycookie3",$email,time()+3600*24);
    setcookie("mycookie4",$role,time()+3600*24);

    if(isset($_COOKIE["mycookie"]) && isset($_COOKIE["mycookie2"]) && isset($_COOKIE["mycookie3"]) && isset($_COOKIE["mycookie4"]))
    {
        session_start();
        if(!isset($_SESSION["newUserName"]) || isset($_SESSION["newUserName"]))
        {
            $_SESSION["newUserName"] = $username;
        }
        if(!isset($_SESSION["newUserPass"]) || isset($_SESSION["newUserPass"]))
        {
            $_SESSION["newUserPass"] = $pass;
        }
        if(!isset($_SESSION["newUserEmail"]) || isset($_SESSION["newUserEmail"]))
        {
            $_SESSION["newUserEmail"] = $email;
        }
        if(!isset($_SESSION["role"]) || isset($_SESSION["role"]))
        {
            $_SESSION["role"] = $email;
        }
    }
?>


<?php

    if($_POST["role"]=='admin')
    {
        $username = $_POST["newUserName"];
        $email = $_POST["newUserEmail"]; 
        $pass = $_POST["newUserPass"];

        $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
        mysqli_select_db($conn, 'library') or die (' test will not open');
        $query = "SELECT username FROM admin WHERE username='$username' ";
        $result = mysqli_query($conn, $query) or die("Invalid query outer");
        $num = mysqli_num_rows($result);
        $query1 = "SELECT email FROM admin WHERE email='$email' ";
        $result1 = mysqli_query($conn, $query1) or die("Invalid query outer");
        $num1 = mysqli_num_rows($result1);

        if($num>0 || $num1>0)
        {
            header("location: validation.php");
            return false;
        }

        $query1 = "INSERT into admin (username,email,pass) VALUES('$username','$email','$pass')";
        $result1 = mysqli_query($conn, $query1) or die("Invalid query");

        mysqli_close($conn);

        header("location: Admin.php");
    }
    else
    {
        $username = $_POST["newUserName"];
        $email = $_POST["newUserEmail"]; 
        $pass = $_POST["newUserPass"];
        
        $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
        mysqli_select_db($conn, 'library') or die (' test will not open');
        $query = "SELECT username FROM student WHERE username='$username' ";
        $result = mysqli_query($conn, $query) or die("Invalid query outer");
        $num = mysqli_num_rows($result);
        $query1 = "SELECT email FROM student WHERE email='$email' ";
        $result1 = mysqli_query($conn, $query1) or die("Invalid query outer");
        $num1 = mysqli_num_rows($result1);

        if($num>0 || $num1>0)
        {
            header("location: validation.php");
            return false;
        }

        $query = "INSERT into student (username,email,pass) VALUES('$username','$email','$pass')";
        $result = mysqli_query($conn, $query) or die("Invalid query");

        mysqli_close($conn);

        header("location: Student.php");
    }
?>

</body>

</html>