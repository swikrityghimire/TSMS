<?php

@include 'config.php';
@include 'navigation.php';
$query = "SELECT * FROM Class";
$result = mysqli_query($conn, $query);
session_start();

if(!isset($_SESSION['class'])){
   header('location:management_page.php');
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Class Management</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="button-containerr">
        <button><a href="classinsert.php">Add Class</a></button>
    </div>
    <h1>Class Details</h1>
    <table>
        <tr class="table">
            <th>S. No.</th>
            <th>Class Name</th>
            <th>Actions</th>
            
        </tr>
        <?php
        $count = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $delete_id = $row['C_ID'];
        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['Class_Name']; ?></td>
            <td>
                <div class="deletebutton">
                    <button><a href="classdelete.php?id=<?php echo $delete_id; ?>">Delete</a></button> &nbsp; &nbsp;
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