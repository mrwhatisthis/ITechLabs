<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1</title>
</head>
<body>
<form method="get" action="form1.php">
    <p><strong> Вывести расписание занятий группы </strong><select name='groups'>
            <option name='selectiongroup'>Группа</option>
    </p>

    <?php
    include "conn.php";
    $sqlSelect = "SELECT * FROM $db.groups";
    foreach ($dbh->query($sqlSelect) as $cell) {
        echo "<option>";
        echo($cell[1]);
        echo "</option>";
    }
    ?>
    </select>
    <button>ok</button>
</form>

<form method="get" action="form2.php">
    <p><strong>Вывести расписание преподавателя</strong> <select name='teachers'>
            <option>Преподаватели</option>
    </p>

    <?php
    $sqlSelect = "SELECT * FROM $db.teacher";

    foreach ($dbh->query($sqlSelect) as $cell) {
        echo "<option>";
        echo($cell[1]);
        echo "</option>";
    } ?>

    </select>
    <button>ok</button>
</form>

<form method="get" action="form3.php">
    <p><strong>Вывести расписание для аудитории</strong> <select name='auditorium'>
            <option>Аудитория</option>
    </p>
    <?php
    $sqlSelect = "SELECT DISTINCT auditorium FROM $db.lesson";
    foreach ($dbh->query($sqlSelect) as $cell) {
        echo "<option>";
        echo($cell[0]);
        echo "</option>";
    }
    ?>
    </select>
    <button>ok</button>
</form>


<p><b>Добавление нового ПЗ</b></p>
<div>
    <form method="get" action="">
        <p>Введите день недели</p>
        <input required name="week_day">
        <p>Введите номер пары</p>
        <input required name="lesson_number" type="number" value="1" min="1" max="6" step="1">
        <p>Введите номер аудитории</p>
        <input required name="auditorium">
        <p>Введите название дисциплины</p>
        <input required name="disciple">
        <p><b> Выберите преподавателя<select name="name">

                    <?php
                     $sqlSelect = "SELECT * FROM $db.teacher";
                    echo "<option>Преподаватель</option>";
                      
                    foreach($dbh->query($sqlSelect) as $cell)
                    {   echo "<option>";
                        print_r($cell[1]);
                        echo "</option>";
                    }
                    
                    echo "</select>" ?>
                     Выберите группу<select name ="title" ><?php $sqlSelect = "SELECT * FROM $db.groups";
                    echo "<option>Группа</option>";
                      
                    foreach($dbh->query($sqlSelect) as $cell)
                    {   echo "<option>";
                        print_r($cell[1]);
                        echo "</option>";
                    }
                    echo "</select></b></p>" ?>
                   <button>Добавить</button>
    </form>
</div>

<?php
include "insertToDB.php";
?>
</body>
</html>