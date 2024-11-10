<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stid = $_POST['stid'];
    $stname = $_POST['studentname'];
    $staddress = $_POST['studentaddress'];
    $dob = $_POST['dateofbirth'];
    $stcontact = $_POST['studentcontact'];
    $stemail = $_POST['studentemail'];


    $sql = "UPDATE Student SET St_Name='$stname', St_Address='$staddress', DOB='$dob', St_Contact='$stcontact', St_Email='$stemail' WHERE St_ID=$stid";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>