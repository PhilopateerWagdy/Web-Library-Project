<html>

<body>

<?php
    $username = $_POST["newUserName"];
    $pass = $_POST["newUserPass"];
    $role = $_POST["role"];
    setcookie("mycookie",$username,time()+3600*24);
    setcookie("mycookie2",$pass,time()+3600*24);
    setcookie("mycookie4",$role,time()+3600*24);

    if(isset($_COOKIE["mycookie"]) && isset($_COOKIE["mycookie2"]) && isset($_COOKIE["mycookie4"]))
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
        if(!isset($_SESSION["role"]) || isset($_SESSION["role"]))
        {
            $_SESSION["role"] = $role;
        }
    }
?>

<?php

    $role;

    if($_POST["role"]=='admin')
    {
        $username = $_POST["newUserName"];
        $pass = $_POST["newUserPass"];

        $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
        mysqli_select_db($conn, 'library') or die (' test will not open');
        $query = "SELECT username FROM admin WHERE username='$username' AND pass='$pass'";
        $result = mysqli_query($conn, $query) or die("Invalid query outer");
        $num = mysqli_num_rows($result);

        if($num==1)
        {
            header("location: Admin.php");
            return false;
        }

        header("location: validation2.php");

        mysqli_close($conn);
    }

?>


<?php

    if($_POST["role"]=='student')
    {
        $username = $_POST["newUserName"];
        $pass = $_POST["newUserPass"];
        
        $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
        mysqli_select_db($conn, 'library') or die (' test will not open');
        $query = "SELECT username FROM student WHERE username='$username' AND pass='$pass'";
        $result = mysqli_query($conn, $query) or die("Invalid query outer");
        $num = mysqli_num_rows($result);

        if($num==1)
        {
            header("location: Student.php");
            return false;
        }

        header("location: validation2.php");

        mysqli_close($conn);
    }

?>

</body>

</html>