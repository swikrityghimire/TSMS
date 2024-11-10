<?php
@include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trid = $_POST['trid'];
    $trainername = $_POST['trname'];
    $traineremail = $POST['tremail'];
    $trainercontact = $_POST['trcontact'];
    $traineraddress = $_POST['traddress'];
    $sql = "UPDATE Trainer SET Tr_Name='$trainername', Tr_Email='$traineremail', Tr_Contact='$trainercontact', Tr_Address='$traineraddress' WHERE Tr_ID=$trid";
    
    if ($conn->query($sql) == TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>