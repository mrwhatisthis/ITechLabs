<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1</title>
</head>
<body>
<?php
include "conn.php";
if($_REQUEST['groups'] != "Группа"){
$groups = $_REQUEST['groups'];
$sqlSelect = $dbh->prepare(
    "SELECT * from $db.groups 
    inner join $db.lesson_groups 
    on $db.groups.ID_Groups = $db.lesson_groups.FID_Groups 
    inner join $db.lesson 
    on $db.lesson_groups.FID_Lesson2=$db.lesson.ID_Lesson 
    where $db.groups.title = :groups");
$sqlSelect->execute(array('groups' => $groups));
echo "<table border ='1'>";
echo "<tr><th>Group</th><th>Day</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th></tr>";
while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
    echo "<tr><td>$cell[1]</td><td>$cell[5]</td><td>$cell[6]</td><td>$cell[7]</td><td>$cell[8]</td><td>$cell[9]</td></tr>";
}
echo "</table>";
}
else 
echo "Нет такой группы";
?>
</body>
</html>