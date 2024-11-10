<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bid = $_POST['bid'];
    $sql = "DELETE FROM Batch WHERE B_ID=$bid";
    
    if ($conn->query($sql) == TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>