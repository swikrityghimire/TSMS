<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pid = $_POST['programid'];
    $sql = "DELETE FROM Program WHERE P_ID=$id";
    
    if ($conn->query($sql) == TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>