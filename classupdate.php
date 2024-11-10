<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['cid'];
    $classname = $_POST['classname'];
    $program = $_POST['program'];
    $batch = $_POST['batch'];

    $sql = "UPDATE Class SET Class_Name='$classname', Program_ID='$program', Batch_ID='$batch' WHERE Class_ID='$cid'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
