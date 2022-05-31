<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');
include "conn.php";
$auditorium = $_REQUEST['auditorium'];
$sqlSelect = $dbh->prepare(
    "SELECT * from $db.lesson 
    where $db.lesson.auditorium = :auditorium");
$sqlSelect->execute(array('auditorium' => $auditorium));
$cell=$sqlSelect->fetchAll(PDO::FETCH_OBJ);
echo json_encode($cell);
?>