<?php

$apiURL = 'http://pi-jlau/API/';

function AddClass()
{
    $className = $dochtml.getElementById("ClassName");
    $hitDice = document.getElementById("HitDice");
    $hitPoints = document.getElementById("HitPoints");
    $hitPointsHigher = document.getElementById("HitPointsHigher");
    $armorProf = document.getElementById("ArmorProf");
    $weaponProf = document.getElementById("WeaponProf");
    $toolProf = document.getElementById("ToolProf");
    $saveThrowProf = document.getElementById("SaveThrowProf");
    $skillProf = document.getElementById("SkillProf");

    $host = "localhost";
    $username = "jlau";
    $password = "banana";
    $db_name = "dnd"; //database name

    //connect to mysql server
    $conn = new mysqli($host, $username, $password, $db_name);
    
    // Check connection
    if ($conn.connect_error) {
        die("Connection failed: " . $conn.connect_error);
    }

    $sql = "INSERT INTO classes (Name, HitDice, HitPointsAtFirst, HitPointsAtHigher, ArmorProf, WeaponProf, ToolProf, SavingThrowProf, SkillsProf) VALUES ("+$className+","+$hitDice+","+$hitPoints+","+$hitPointsHigher+","+$armorProf+","+$weaponProf+","+$toolProf+","+$saveThrowProf+","+$skillProf+")";

    if ($conn.query($sql) === TRUE) {
        console.log("New record created successfully");
    } else {
        console.log("Error: " + $sql + "<br>" + $conn.error);
    }

    $conn.close();
}

function AddSpell()
{
    $className = document.getElementById("ClassName");
    $hitDice = document.getElementById("HitDice");
    $hitPoints = document.getElementById("HitPoints");
    $hitPointsHigher = document.getElementById("HitPointsHigher");
    $armorProf = document.getElementById("ArmorProf");
    $weaponProf = document.getElementById("WeaponProf");
    $toolProf = document.getElementById("ToolProf");
    $saveThrowProf = document.getElementById("SaveThrowProf");
    $skillProf = document.getElementById("SkillProf");

    $host = "localhost";
    $username = "jlau";
    $password = "banana";
    $db_name = "dnd"; //database name

    //connect to mysql server
    $conn = new mysqli($host, $username, $password, $db_name);
    // Check connection
    if ($conn.connect_error) {
        die("Connection failed: " . $conn.connect_error);
    }

    $sql = "INSERT INTO classes (Name, HitDice, HitPointsAtFirst, HitPointsAtHigher, ArmorProf, WeaponProf, ToolProf, SavingThrowProf, SkillsProf) VALUES ($className,$hitDice,$hitPoints,$hitPointsHigher,$armorProf,$weaponProf,$toolProf,$saveThrowProf,$skillProf)";

    if ($conn.query($sql) === TRUE) {
        console.log("New record created successfully");
    } else {
        console.log("Error: " + $sql + "<br>" + $conn.error);
    }

    $conn.close();
}

function AddPage()
{
    $url = "";
    $pageInfo = "";

    $url = document.url + document.getElementById("pageTitle");
    $pageInfo = document.getElementById("pageContent");
    $imageLink = document.getElementById("imageLink");

    $host = "localhost";
    $username = "jlau";
    $password = "banana";
    $db_name = "website";

    //connect to mysql server
    $conn = new mysqli($host, $username, $password, $db_name);
    // Check connection
    if ($conn.connect_error) {
        die("Connection failed: " . $conn.connect_error);
    }

    $sql = "INSERT INTO pages (url, page_info) VALUES ($url,$pageInfo)";

    if ($conn.query($sql) === TRUE) {
        console.log("New record created successfully");
    } else {
        console.log("Error: " + $sql + "<br>" + $conn.error);
    }

    $conn.close();

    document.location.href = '/WebAssignment/index.php';
}

function RemovePage()
{
    $url = "";
    $url = Document.url;

    $host = "localhost";
    $username = "jlau";
    $password = "banana";
    $db_name = "website"; //database name

    //connect to mysql server
    $conn = new mysqli($host, $username, $password, $db_name);
    // Check connection
    if ($conn.connect_error) {
        die("Connection failed: " . $conn.connect_error);
    }

    $sql = "DELETE FROM pages WHERE url = $url";

    if ($conn.query($sql) === TRUE) {
        console.log("New record created successfully");
    } else {
        console.log("Error: " + $sql + "<br>" + $conn.error);
    }

    $conn.close();

    window.location.href = "index.php";
}

?>