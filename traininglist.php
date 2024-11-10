<?php

@include 'config.php';
@include 'navigation.php';
$query = "SELECT * FROM Training";
$result = mysqli_query($conn, $query);
session_start();

if(!isset($_SESSION['training'])){
   header('location:management_page.php');
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Training Management</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="button-containerr">
        <button><a href="inserttraining.php">Add Training</a></button>
    </div>
    <h1>Training Details</h1>
    <table>
        <tr class="table">
            <th>S. No.</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Semester</th>
            <th>Actions</th>
            
        </tr>
        <?php
        $count = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $delete_id = $row['T_ID'];
        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['Start_Date']; ?></td>
            <td><?php echo $row['End_Date']; ?></td>
            <td><?php echo $row['Semester']; ?></td>
            <td>
                <div class="deletebutton">
                    <button><a href="trainingdelete.php?id=<?php echo $delete_id; ?>">Delete</a></button> &nbsp; &nbsp;
                <button><a href="trainingupdate.php<?php echo $training_id; ?>">Edit</a></button>
                </div>
            </td>
        </tr>
        <?php
            $count++;
        }
        ?>
    </table>
</body>
</html>