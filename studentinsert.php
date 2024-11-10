<?php

@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stname = $_POST['studentname'];
    $staddress = $_POST['studentaddress'];
    $dob = $_POST['dateofbirth'];
    $stcontact = $_POST['studentcontact'];
    $stemail = $_POST['studentemail'];

    $sql = "INSERT INTO Student(St_Name, St_Address, DOB, St_Contact, St_Email, St_Password) VALUES ('$stname', '$staddress', '$dob', '$stcontact', '$stemail')";

    if ($conn->query($sql) === TRUE) {
        echo $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
