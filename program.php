<?php

@include 'config.php';
@include 'navigation.php';
$query = "SELECT * FROM Program";
$result = mysqli_query($conn, $query);
session_start();

if(!isset($_SESSION['program'])){
   header('location:management_page.php');
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Program Management</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="button-containerr">
        <button><a href="programinsert.php">Add Program</a></button>
    </div>
    <h1>Program Details</h1>
    <table>
        <tr class="table">
            <th>S. No.</th>
            <th>Title</th>
            <th>Short Name</th>
            <th>Credit Hour</th>
            <th>Actions</th>
            
        </tr>
        <?php
        $count = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $delete_id = $row['P_ID'];
        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo $row['ShortName']; ?></td>
            <td><?php echo $row['Credit_hr']; ?></td>
            <td>
                <div class="deletebutton">
                    <button><a href="programdelete.php?id=<?php echo $delete_id; ?>">Delete</a></button> &nbsp; &nbsp;
                <button><a href="programupdate.php<?php echo $program_id; ?>">Edit</a></button>
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