<?php
@include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $shortname = $_POST['shortname'];
    $credithour = $_POST['credithour'];
    $sql = "UPDATE Program SET Title='$title', ShortName='$shortname', Credit_hr='$credithour' WHERE P_ID=$pid";
    
    if ($conn->query($sql) == TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>