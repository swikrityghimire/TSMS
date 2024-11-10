<?php

@include 'config.php';
@include 'navigation.php';

session_start();

if(!isset($_SESSION['training'])){
   header('location:management_page.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training List</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>

<h2>List of Trainings</h2>
<table>
    <thead>
        <tr>
            <th>Training ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Semester</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["tid"]. "</td><td>" . $row["startdate"]. "</td><td>" . $row["enddate"]. "</td><td>" . $row["semester"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No trainings found</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>