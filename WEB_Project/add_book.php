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

<div id="add_div">
    <form action="Admin.php" method="POST" style="margin:auto;text-align:center;">

        <p style="font-size:25px;" id="add_p">
            <label> ISBN</label>
            <input type="text" id="isbn" name="isbn" required style="width:300px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </p>

        <p style="font-size:25px;" id="add_p">
            <label> Book Name</label>
            <input type="text" id="book_name" name="book_name" required style="width:300px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </p>

        <p style="font-size:25px;" id="add_p">
            <label> Author Name</label>
            <input type="text" id="author_name" name="author_name" required style="width:300px;
            height:40px;
            border: 1px solid black;
            font-size:25px;">
        </p>

        <p style="font-size:25px;" id="add_p">
            <label> Publication year </label>
            <input type="text" id="pub_year" name="pub_year" required style="width:300px;
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