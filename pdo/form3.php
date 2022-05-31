<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3</title>
</head>
<body>
<?php
include "conn.php";
if($_REQUEST['auditorium'] != "Аудитория"){
$auditorium = $_REQUEST['auditorium'];
$sqlSelect = $dbh->prepare(
    "SELECT * from $db.lesson 
    where $db.lesson.auditorium = :auditorium");
$sqlSelect->execute(array('auditorium' => $auditorium));
echo "<table border ='1'>";
echo "<tr><th>Auditorium</th><th>Day</th><th>Number</th><th>Disciple</th><th>Type</th></tr>";
while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
    echo "<tr><td>$cell[3]</td><td>$cell[1]</td><td>$cell[2]</td><td>$cell[4]</td><td>$cell[5]</td></tr>";
}
echo "</table>";
}
else 
{
    echo "Нет такой аудитории";
}
?>
</body>
</html>