<?php

@include 'config.php';
@include 'navigation.php';
$query = "SELECT * FROM Platform";
$result = mysqli_query($conn, $query);
session_start();

if(!isset($_SESSION['platform'])){
   header('location:management_page.php');
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Platform Management</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="button-containerr">
        <button><a href="platforminsert.php">Add Platform</a></button>
    </div>
    <h1>Platform Details</h1>
    <table>
        <tr class="table">
            <th>S. No.</th>
            <th>Platform Name</th>
            <th>Description</th>
            <th>Actions</th>
            
        </tr>
        <?php
        $count = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $delete_id = $row['Tr_ID'];
        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['Platform_Name']; ?></td>
            <td><?php echo $row['Description']; ?></td>
            <td>
                <div class="deletebutton">
                    <button><a href="platformdelete.php?id=<?php echo $delete_id; ?>">Delete</a></button> &nbsp; &nbsp;
                <button><a href="platformupdate.php<?php echo $platform_id; ?>">Edit</a></button>
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