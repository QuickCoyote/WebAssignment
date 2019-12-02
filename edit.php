<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href='style.css' rel='stylesheet' />
</head>
<body>
<div>Page Title:</div>
<input id='pageTitle' type="text">
<div>Page Content:</div>
<input id='pageContent' type="text">
<div>Image Link:</div>
<input id='pageImage' type="text">
<br/>
<br/>

<script type="text/javascript" src="urlFetch.js"></script>

<?php 
        include "functions.php";

        $dochtml = new domDocument();
        $dochtml->loadHTML($myPageURL);
    
        if(isset($_POST['AddPage']))
        {
            AddPage();
        }
?>

<button onclick="document.location.href = '/WebAssignment/edit.php';">Add Page</button>

</body>
</html>