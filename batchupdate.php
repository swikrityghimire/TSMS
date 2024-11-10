<?php
@include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bid = $_POST['bid'];
    $batchname = $_POST['batchname'];
    $sql = "UPDATE Batch SET B_Name='$batchname' WHERE B_ID=$bid";
    
    if ($conn->query($sql) == TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>