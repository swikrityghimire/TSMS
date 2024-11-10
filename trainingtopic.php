<?php

@include 'config.php';
@include 'navigation.php';
$query = "SELECT * FROM Training_Topic";
$result = mysqli_query($conn, $query);
session_start();

if(!isset($_SESSION['trainingtopic'])){
   header('location:management_page.php');
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Topic Management</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="button-containerr">
        <button><a href="topicinsert.php"> + Add Training Topic</a></button>
    </div>
    <h1>Training Topic Details</h1>
    <table>
        <tr class="table">
            <th>S. No.</th>
            <th>Training Title </th>
            <th>Training Description</th>
            <th>Actions</th>
            
        </tr>
        <?php
        $count = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $delete_id = $row['TT_ID'];
        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['Training_Title']; ?></td>
            <td><?php echo $row['TT_Description']; ?></td>
            <td>
                <div class="deletebutton">
                    <button><a href="topicdelete.php?id=<?php echo $delete_id; ?>">Delete</a></button> &nbsp; &nbsp;
                <button><a href="topicupdate.php<?php echo $topic_id; ?>">Edit</a></button>
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