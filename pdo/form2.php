<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2</title>
</head>
<body>
<?php
include "conn.php";
if($_REQUEST['teachers'] != "Преподаватели"){
$teachers = $_REQUEST['teachers'];
$sqlSelect = $dbh->prepare("SELECT * from $db.teacher inner join $db.lesson_teacher on $db.teacher.ID_teacher = $db.lesson_teacher.FID_teacher inner join $db.lesson on $db.lesson_teacher.FID_Lesson1=$db.lesson.ID_Lesson where $db.teacher.name = :teachers");
$sqlSelect->execute(array('teachers' => $teachers));
echo "<table border ='1'>";
echo "<tr><th>Teacher</th><th>Day</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th></tr>";
while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
  echo "<tr><td>$cell[1]</td><td>$cell[5]</td><td>$cell[6]</td><td>$cell[7]</td><td>$cell[8]</td><td>$cell[9]</td></tr>";
}
echo "</table>";
}
else 
{
    echo "Нет такого преподавателя";
}
?>
</body>
</html>