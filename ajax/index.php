<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab3</title>
    <script>
var ajax = new XMLHttpRequest();

function button_1() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("result").innerHTML = ajax.response;
            }
        }
    }
    var group = document.getElementById("groups").value;
    ajax.open("get", "form1.php?groups=" + group);
    ajax.send();
}

function button_2() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {

                console.dir(ajax);
                let rows = ajax.responseXML.firstChild.children;
                let result = "<table border ='1'>";
                result += "<tr><th>Teacher</th><th>Day</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th></tr>";
                for (var i = 0; i < rows.length; i++) {
                    result += "<tr>";
                    result += "<td>" + rows[i].children[0].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[1].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[2].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[3].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[4].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[5].firstChild.nodeValue + "</td>";
                    result += "</tr>";
                }
                document.getElementById("result").innerHTML = result;
            }
        }
    }
    var teacher = document.getElementById("teachers").value;
    ajax.open("get", "form2.php?teachers=" + teacher);
    ajax.send();
}

function loadData() {
    let rows = JSON.parse(ajax.responseText);
    console.dir(rows);
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            console.dir(ajax);
            
            let result = "<table border ='1'>";
                result += "<tr><th>Auditorium</th><th>Day</th><th>Number</th><th>Disciple</th><th>Type</th></tr>";
            for (var i = 0; i < rows.length; i++) {
                result += "<tr>";
                result += "<td>" + rows[i].auditorium + "</td>";
                result += "<td>" + rows[i].week_day + "</td>";
                result += "<td>" + rows[i].lesson_number + "</td>";
                result += "<td>" + rows[i].disciple + "</td>";
                result += "<td>" + rows[i].type + "</td>";
                result += "</tr>";
            }
            document.getElementById("result").innerHTML = result;
        }
    }
}

function button_3() {
    ajax.onreadystatechange = loadData;
    var auditorium = document.getElementById("auditorium").value;
    ajax.open("get", "form3.php?auditorium=" + auditorium);
    ajax.send();
}
    </script>
</head>
<body>
    <p><strong> Вывести расписание занятий группы </strong><select name='groups' id="groups">
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
    <button onclick="button_1()">ok</button>

    <p><strong>Вывести расписание преподавателя</strong> <select name="teachers" id="teachers">
    </p>

    <?php
    $sqlSelect = "SELECT * FROM $db.teacher";

    foreach ($dbh->query($sqlSelect) as $cell) {
        echo "<option>";
        echo($cell[1]);
        echo "</option>";
    } ?>

    </select>
    <button onclick="button_2()">ok</button>



    <p><strong>Вывести расписание для аудитории</strong> <select name="auditorium" id="auditorium">
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
    <button onclick="button_3()">ok</button>
    <div id="result"></div>
</body>
</html>