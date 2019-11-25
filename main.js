let url = 'http://pi-jlau/API/';

function SpellsFunc()
{
    document.getElementById("Spells").innerHTML = "";
    var sl1 = document.getElementById("SpellSchool");
    var sl2 = document.getElementById("SpellLevel");
    var sl3 = document.getElementById("CastingTime");
    
    var spellSchool = sl1.options[sl1.selectedIndex].value;
    var spellLevel = sl2.options[sl2.selectedIndex].value;
    var castingTime = sl3.options[sl3.selectedIndex].value;

    if(spellSchool == "ChooseSchool")
    {
        spellSchool = "school";
    }
    if(spellLevel == "ChooseLevel")
    {
        spellLevel = "level";
    }
    if(castingTime == "ChooseTime")
    {
        castingTime = "castingtime";
    }

    url += '?SpellSchool=' + spellSchool + '&SpellLevel=' + spellLevel + '&CastingTime=' + castingTime;
    console.log(url);
    fetch(url)
        .then(response => response.json())
            .then(data => {
                for($i = 0; $i < data["spells"].length; $i++)
                {
                    document.getElementById("Spells").innerHTML += '<div class="Spell"><h2>' + data["spells"][$i].Name + '</h2>' +
                    '<p>' + "Level: " + data["spells"][$i].Level + '</p>' +
                    '<br/>' +
                    '<p>' + "School: " + data["spells"][$i].School + '</p>' +
                    '<br/>' +
                    '<p>' + "Casting Time: " + data["spells"][$i].Casting_Time + '</p>' +
                    '<br/>' +
                    '<p>' + "Spell Range: " + data["spells"][$i].Spell_Range + '</p>' +
                    '<br/>' +
                    '<p>' + "Components: " + data["spells"][$i].Components + '</p>' +
                    '<br/>' +
                    '<p>' + "Duration: " + data["spells"][$i].Duration + '</p>' +
                    '<br/>' +
                    '<p>' + "Attack/Save: " + data["spells"][$i].Attack_Save + '</p>' +
                    '<br/>' +
                    '<p>' + "Damage/Effect: " + data["spells"][$i].Damage_Effect + '</p>' +
                    '<br/>' +
                    '<p>' + "Description: " + data["spells"][$i].Description + '</p>' +
                    '<br/></div>';
                }
            })
            .catch(e => console.log(e))
    url = 'http://localhost/API/';
    console.log(document.getElementById("Spells"));
}

function ClassesFunc()
{
    document.getElementById("Classes").innerHTML = "";
    var sl1 = document.getElementById("ClassName");
    
    var className = sl1.options[sl1.selectedIndex].value;

    if(className == "Name")
    {
        className = "Name";
    }

    url += '?Name=' + className;
    console.log(url);
    fetch(url)
        .then(response => response.json())
            .then(data => {
                for($i = 0; $i < data["classes"].length; $i++)
                {
                    document.getElementById("Classes").innerHTML += '<div class="Spell"><h2>' + data["classes"][$i].Name + '</h2>' +
                    '<p>' + "Hit Dice: " + data["spells"][$i].Level + '</p>' +
                    '<br/>' +
                    '<p>' + "Hit Points At First: " + data["spells"][$i].School + '</p>' +
                    '<br/>' +
                    '<p>' + "Hit Points At Higher: " + data["spells"][$i].Casting_Time + '</p>' +
                    '<br/>' +
                    '<p>' + "Armor Proficiencies: " + data["spells"][$i].Spell_Range + '</p>' +
                    '<br/>' +
                    '<p>' + "Weapon Proficiencies: " + data["spells"][$i].Components + '</p>' +
                    '<br/>' +
                    '<p>' + "Tool Proficiencies: " + data["spells"][$i].Duration + '</p>' +
                    '<br/>' +
                    '<p>' + "Saving Throw Proficiencies: " + data["spells"][$i].Attack_Save + '</p>' +
                    '<br/>' +
                    '<p>' + "Skills Proficiencies: " + data["spells"][$i].Damage_Effect + '</p>' +
                    '<br/></div>';
                }
            })
            .catch(e => console.log(e))
    url = 'http://localhost/API/';
    console.log(document.getElementById("Classes"));
}

function AddClass()
{
    var className = document.getElementById("ClassName");
    var hitDice = document.getElementById("HitDice");
    var hitPoints = document.getElementById("HitPoints");
    var hitPointsHigher = document.getElementById("HitPointsHigher");
    var armorProf = document.getElementById("ArmorProf");
    var weaponProf = document.getElementById("WeaponProf");
    var toolProf = document.getElementById("ToolProf");
    var saveThrowProf = document.getElementById("SaveThrowProf");
    var skillProf = document.getElementById("SkillProf");

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

    $sql = "INSERT INTO classes (Name, HitDice, HitPointsAtFirst, HitPointsAtHigher, ArmorProf, WeaponProf, ToolProf, SavingThrowProf, SkillsProf) VALUES ("+className+","+hitDice+","+ hitPoints+","+ hitPointsHigher+","+ armorProf+","+ weaponProf+","+ toolProf+","+ saveThrowProf+","+ skillProf+")";

    if ($conn.query($sql) === TRUE) {
        console.log("New record created successfully");
    } else {
        console.log("Error: " + $sql + "<br>" + $conn.error);
    }

    $conn.close();
}

function AddSpell()
{
    var className = document.getElementById("ClassName");
    var hitDice = document.getElementById("HitDice");
    var hitPoints = document.getElementById("HitPoints");
    var hitPointsHigher = document.getElementById("HitPointsHigher");
    var armorProf = document.getElementById("ArmorProf");
    var weaponProf = document.getElementById("WeaponProf");
    var toolProf = document.getElementById("ToolProf");
    var saveThrowProf = document.getElementById("SaveThrowProf");
    var skillProf = document.getElementById("SkillProf");

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

    $sql = "INSERT INTO classes (Name, HitDice, HitPointsAtFirst, HitPointsAtHigher, ArmorProf, WeaponProf, ToolProf, SavingThrowProf, SkillsProf) VALUES ("+className+","+hitDice+","+ hitPoints+","+ hitPointsHigher+","+ armorProf+","+ weaponProf+","+ toolProf+","+ saveThrowProf+","+ skillProf+")";

    if ($conn.query($sql) === TRUE) {
        console.log("New record created successfully");
    } else {
        console.log("Error: " + $sql + "<br>" + $conn.error);
    }

    $conn.close();
}

function AddPage()
{
    var url = "";
    var pageInfo = "";

    url = document.url + document.getElementById("pageTitle");
    pageInfo = document.getElementById("pageContent");
    imageLink = document.getElementById("imageLink");

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

    $sql = "INSERT INTO pages (url, page_info) VALUES ("+url+","+pageInfo+")";

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
    var url = "";
    url = Document.url;

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

    $sql = "DELETE FROM pages WHERE url = "+url;

    if ($conn.query($sql) === TRUE) {
        console.log("New record created successfully");
    } else {
        console.log("Error: " + $sql + "<br>" + $conn.error);
    }

    $conn.close();

    window.location.href = "index.php";
}