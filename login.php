<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='style.css' rel='stylesheet' />
</head>
<body>
<div>Username:</div>
<input id='username' type="text">
<div>Password:</div>
<input id='password' type="password">
<button onclick="    
if (document.getElementById('username').value == 'admin' && document.getElementById('password').value == 'password') {
        console.log('succesful');
        <?php $_SESSION['admin'] = 'true'; ?>
        document.location.href = '/WebAssignment/edit.php';
    } else {
        console.log('fail');
        <?php $_SESSION['admin'] = 'false'; ?>
    }
    ">Submit</button>
</body>
</html>