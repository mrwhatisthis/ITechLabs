<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2</title>
    <script src="localStorage.js"></script>
</head>

<body>
    <form method="get" action="form1.php">
        <p><strong> Вывести расписание лабораторных работ </strong><select name="group" id="group" onchange="form1()">
        </p>
        <?php
        include "conn.php";
        $group = $collection->distinct("group");
        foreach ($group as $document) {
            echo "<option>";
            echo ($document);
            echo "</option>";
        }
        ?>
        </select>
        <button>ok</button>
    </form>

    <form method="get" action="form2.php">
        <p><strong>Вывести расписание занятий преподавателя
                <select name="teacher" id="teacher" onchange="form2()">
                    <?php
                    include 'connection.php';

                    $group = $collection->distinct("teacher");

                    foreach ($group as $document) {
                        echo "<option>";
                        echo ($document);
                        echo "</option>";
                    }
                    echo '</select>';
                    ?>

                    дисциплина<select name="disciple" id=disciple onchange="form2()">
                        <?php
                        include 'connection.php';
                        $group = $collection->distinct("disciple");
                        foreach ($group as $document) {
                            echo "<option>";
                            print_r($document);
                            echo "</option>";
                        }
                        echo '</select>';
                        ?>
                        <button>ok</button></strong>
    </form>



    <form method="get" action="form3.php">
        <p><strong>Вывести расписание для аудитории</strong> <select name="auditorium" id="auditorium" onchange="form3()">
        </p>
        <?php
        $auditorium = $collection->distinct("auditorium");

        foreach ($auditorium as $document) {
            echo "<option>";
            echo ($document);
            echo "</option>";
        }
        echo '</select>';

        ?>
        </select>
        <button>ok</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>Group</th>
                <th>Day</th>
                <th>Number</th>
                <th>Auditorium</th>
                <th>Disciple</th>
                <th>Type</th>
                <th>Teacher</th>
            </tr>
        </thead>
        <tbody id="res">

        </tbody>
    </table>

</body>

</html>
</body>

</html>