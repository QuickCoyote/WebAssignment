<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Page</title>
    <link href='style.css' rel='stylesheet' />
</head>
<body>
    <?php

        function console_log($output, $with_script_tags = true) 
        {
            $js_code = 'console.log('.json_encode($output, JSON_HEX_TAG).');';

            if ($with_script_tags) 
            {
                $js_code = '<script>'.$js_code.'</script>';
            }

            echo $js_code;
        }

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

        $sql = "SELECT * FROM `pages`";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                extract($row);
                console_log($url);
                echo "<a href='$url'>$title</a><br/>";
            }
        } else {
            echo "0 results";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $validURL = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            while($row = $result->fetch_assoc()) 
            {
                extract($row);
                if($url == $validURL)
                {
                    echo $page_info;
                }
            }
        } else {
            echo "0 results";
        }


        $conn->close();
    ?>
</body>
</html>