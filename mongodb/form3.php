<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3</title>
</head>
<body>
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
    <tbody>

        <?php
        if (isset($_GET['auditorium'])) {
            include 'conn.php';
            $auditorium = $_GET['auditorium'];
            $cursor = $collection->find(
                [
                    'auditorium' => $auditorium,
                ]);
            $result = "";
            foreach ($cursor as $document) {
            
            $group = $document['group'];
            $date = $document['date'];
            $time = $document['time'];
            $teacher = $document['teacher'];
            $disciple = $document['disciple'];
            $type = $document['type'];
            if (is_object($group)) {
                $group = (array)$group;
                $group = (implode(', ', $group));
            }
            if (is_object($teacher)) {
                $teacher = (array)$teacher;
                $teacher = (implode(', ', $teacher));
            }
            $result = $result . "<tr><td>$group</td><td>$date</td><td>$time</td><td>$auditorium</td><td>$disciple</td><td>$type</td><td>$teacher</td></tr>"; 
        }  
    }
    echo $result;  
    ?>
    </tbody>
</table>
<?php
echo "<script> localStorage.setItem('$auditorium', '$result');</script>";
?>
</body>
</html>