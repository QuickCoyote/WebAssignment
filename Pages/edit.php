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
</head>
<body>
<div>Spell Title:</div>
<input id='titleSpell' type="text">
<div>Spell Content:</div>
<input id='contentSpell' type="password">
<button onclick="AddSpell()">Add Spell</button>

<div>Class Title:</div>
<input id='titleClass' type="text">
<div>Class Content:</div>
<input id='contentClass' type="password">
<button onclick="AddClass()">Add Class</button>
<script src="main.js"></script>
</body>
</html>