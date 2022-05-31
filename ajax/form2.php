<?php
header('Content-Type: text/xml');
header('Cache-Control: no-cache, must-revalidate');
include "conn.php";
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "<root>";
$teachers = $_REQUEST['teachers'];
$sqlSelect = $dbh->prepare(
  "SELECT * from $db.teacher 
  inner join $db.lesson_teacher 
  on $db.teacher.ID_teacher = $db.lesson_teacher.FID_teacher 
  inner join $db.lesson 
  on $db.lesson_teacher.FID_Lesson1=$db.lesson.ID_Lesson 
  where $db.teacher.name = :teachers");
$sqlSelect->execute(array('teachers' => $teachers));
while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
  $teacher = $cell[1];
  $date = $cell[5];
  $time = $cell[6];
  $uditorium = $cell[7];
  $disciple = $cell[8];
  $type = $cell[9];
  echo "<row><teacher>$teacher</teacher><date>$date</date><time>$time</time><auditorium>$uditorium</auditorium><disciple>$disciple</disciple><type>$type</type></row>";
}
echo "</root>";

?>