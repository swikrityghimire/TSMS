<?php

@include 'config.php';
@include 'navigation.php';
$query = "SELECT * FROM Trainer";
$result = mysqli_query($conn, $query);
session_start();

if(!isset($_SESSION['trainer'])){
   header('location:management_page.php');
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trainer Management</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="button-containerr">
        <button><a href="trainerinsert.php">Add Trainer</a></button>
    </div>
    <h1>Trainer Details</h1>
    <table>
        <tr class="table">
            <th>S. No.</th>
            <th>Trainer Name</th>
            <th>Trainer Email</th>
            <th>Trainer Contact</th>
            <th>Trainer Address</th>
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
            <td><?php echo $row['Tr_Name']; ?></td>
            <td><?php echo $row['Tr_Email']; ?></td>
            <td><?php echo $row['Tr_Contact']; ?></td>
            <td><?php echo $row['Tr_Address']; ?></td>
            <td>
                <div class="deletebutton">
                    <button><a href="trainerdelete.php?id=<?php echo $delete_id; ?>">Delete</a></button> &nbsp; &nbsp;
                <button><a href="trainerupdate.php<?php echo $trainer_id; ?>">Edit</a></button>
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