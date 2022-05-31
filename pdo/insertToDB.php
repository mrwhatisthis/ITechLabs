<?php
include "conn.php";
if( isset($_REQUEST['week_day']) 
&& isset($_REQUEST['lesson_number']) 
&& isset($_REQUEST['auditorium']) 
&& isset($_REQUEST['disciple']) 
&& isset($_REQUEST['name']) 
&& isset($_REQUEST['title'])){

$week_day = $_REQUEST['week_day'];
$lesson_number=$_REQUEST['lesson_number'];
$auditorium=$_REQUEST['auditorium'];
$disciple=$_REQUEST['disciple'];
$type = 'Practical';
$name=$_REQUEST['name'];
$title=$_REQUEST['title'];
try {
    $dbh->exec("set names utf8");
    $alter = "ALTER TABLE $db.lesson CHANGE lesson.ID_Lesson lesson.ID_Lesson INT(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1";
    $st= $dbh->prepare($alter);
    $st->execute();
    $sql = "INSERT INTO iteh2lb1var2.lesson (week_day, lesson_number, auditorium, disciple, type) values ( ?, ?, ?, ?, ?)";
    $stmt= $dbh->prepare($sql);
    $stmt->execute([$week_day, $lesson_number, $auditorium, $disciple, $type]);
    $sql = $dbh->prepare("SELECT * from $db.teacher where $db.teacher.name = :name");
    $sql->execute(array('name' => $name));
    $sql=$sql->fetch(PDO::FETCH_BOTH);
    $teacher_id = $sql[0];
    $sql = $dbh->prepare("SELECT max(ID_Lesson) from $db.lesson");
    $sql->execute(array());
    $sql=$sql->fetch(PDO::FETCH_BOTH);
    $lesson_id = $sql[0];
    $sql = "INSERT INTO $db.lesson_teacher (FID_Teacher, FID_Lesson1) values ( ?, ?)";
    $st = $dbh->prepare($sql);
    $st->execute([$teacher_id, $lesson_id]);
    $sql = $dbh->prepare("SELECT * from $db.groups where $db.groups.title = :title");
    $sql->execute(array('title' => $title));
    $sql=$sql->fetch(PDO::FETCH_BOTH);
    $group_id = $sql[0];
    $sql = $dbh->prepare("SELECT max(ID_Lesson) from $db.lesson");
    $sql->execute(array());
    $sql=$sql->fetch(PDO::FETCH_BOTH);
    $lesson_id = $sql[0];
    $sql = "INSERT INTO $db.lesson_groups (FID_Lesson2, FID_Groups) values ( ?, ?)";
    $st = $dbh->prepare($sql);
    $st->execute([$lesson_id, $group_id]);
} catch (PDOException $e) {
    print "Ошибка!: " . $e->getMessage() . "<br/>";
}
}
?>