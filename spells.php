<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spells</title>
    <link href='style.css' rel='stylesheet' />
</head>
<body>
<?php
        $host = "localhost";
        $username = "jlau";
        $password = "banana";
        $db_name = "website"; //database name

        //connect to mysql server
        $conn = new mysqli($host, $username, $password, $db_name);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select url from pages";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<a href='$row->url'>$row->title</a>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>

    <h1>SPELLS PAGE</h1>
</body>
</html>