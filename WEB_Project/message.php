<?php
        session_start();
        

        $email = $_POST["emailMessage"];
        $message =$_POST["message"];
        echo $message;

        $conn = mysqli_connect('localhost','root','philo') or die ('No connection');
        mysqli_select_db($conn, 'library') or die (' test will not open');
        $query = "SELECT * FROM student";
        $result = mysqli_query($conn, $query) or die("Invalid query");
        $num = mysqli_num_rows($result);

        for($i=0; $i<=$num; $i++)
        {
            $row = mysqli_fetch_row($result);
            if($row[1]==$email)
            {echo $message;

                $query = "UPDATE student SET message='$message' WHERE email='$email' ";
                    $result = mysqli_query($conn, $query) or die("Invalid query");
                header("location: Admin.php");
            }
        }
        

        mysqli_close($conn);
?>