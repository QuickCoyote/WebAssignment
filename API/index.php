<?php
header("Access-Control-Allow-Origin: *");

//include database connection
include 'dbconfig.php';

$selectedClass = filter_input(INPUT_GET, "Name", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

if($selectedClass == "")
{
    $selectedClass = "name";
}

if($selectedClass != "name")
{
    $selectedClass = '"'.$selectedClass.'"';
}

$classQuery = "SELECT * from classes WHERE name = $selectedClass";

// This is all the spell gathering stuff
$selectedSchool = filter_input(INPUT_GET, "SpellSchool", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$selectedLevel = filter_input(INPUT_GET, "SpellLevel", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$selectedTime = filter_input(INPUT_GET, "CastingTime", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

if($selectedSchool == "")
{
    $selectedSchool = "school";
}

if($selectedLevel == "")
{
    $selectedLevel = "level";
}

if($selectedTime == "")
{
    $selectedTime = "castingtime";
}

if($selectedSchool != "school")
{
    $selectedSchool = '"'.$selectedSchool.'"';
}
if($selectedLevel != "level")
{
    $selectedLevel = '"'.$selectedLevel.'"';
}
if($selectedTime != "castingtime")
{
    $selectedTime = '"'.$selectedTime.'"';
}

//query all records from the database
$spellQuery = "SELECT * from spells WHERE school = $selectedSchool AND level = $selectedLevel AND castingtime = $selectedTime";

//execute the query
$result = $mysqli->query($spellQuery) or die($mysqli->error);

//get number of rows returned
$num_results = $result->num_rows;

$myJson = '{';
$myJson .= '"spells":[';

if( $num_results > 0)
{ 
    //it means there's already at least one database record
    //loop to show each records
    while($row = $result->fetch_assoc())
    {
        //this will make $row['firstname'] to just $firstname only
        extract($row);
        
        $myJson .= '{"Name"'.":".'"'.$name.'"'.",";
        $myJson .= '"Level"'.":".'"'.$level.'"'.",";
        $myJson .= '"School"'.":".'"'.$school.'"'.",";
        $myJson .= '"Casting_Time"'.":".'"'.$castingtime.'"'.",";
        $myJson .= '"Spell_Range"'.":".'"'.$spellrange.'"'.",";
        $myJson .= '"Components"'.":".'"'.$components.'"'.",";
        $myJson .= '"Duration"'.":".'"'.$duration.'"'.",";
        $myJson .= '"Attack_Save"'.":".'"'.$attacksave.'"'.",";
        $myJson .= '"Damage_Effect"'.":".'"'.$damageeffect.'"'.",";
        $myJson .= '"Description"'.":".'"'.$description.'"'."},";
    }
    $myJson = substr($myJson, 0, -1);
}
else
{
    //if database table is empty        
}

$myJson .= '],';

// Now Execute Classes Query

$result = $mysqli->query($classQuery) or die($mysqli->error);

//get number of rows returned
$num_results = $result->num_rows;

$myJson .= '"classes":[';

if( $num_results > 0)
{ 
    //it means there's already at least one database record
    //loop to show each records
    while($row = $result->fetch_assoc())
    {
        //this will make $row['firstname'] to just $firstname only
        extract($row);
        
        $myJson .= '{"Name"'.":".'"'.$Name.'"'.",";
        $myJson .= '"HitDice"'.":".'"'.$HitDice.'"'.",";
        $myJson .= '"HitPointsAtFirst"'.":".'"'.$HitPointsAtFirst.'"'.",";
        $myJson .= '"HitPointsAtHigher"'.":".'"'.$HitPointsAtHigher.'"'.",";
        $myJson .= '"ArmorProf"'.":".'"'.$ArmorProf.'"'.",";
        $myJson .= '"WeaponProf"'.":".'"'.$WeaponProf.'"'.",";
        $myJson .= '"ToolProf"'.":".'"'.$ToolProf.'"'.",";
        $myJson .= '"SavingThrowProf"'.":".'"'.$SavingThrowProf.'"'.",";
        $myJson .= '"SkillsProf"'.":".'"'.$SkillsProf.'"'."},";
    }
    $myJson = substr($myJson, 0, -1);
}
else
{
    //if database table is empty
}

$myJson .= ']';

$myJson .='}';
//disconnect from database
$result->free();
$mysqli->close();

echo $myJson;
?>