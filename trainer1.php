<?php

@include 'config.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
       $batch = $_POST['batch'];
       $program = $_POST['program'];

       echo $batch;
       echo "<br/>";

       echo $program;
       echo "<br/>";

        $sql = "SELECT B_Name from Batch WHERE B_ID = $batch";
        echo $sql;

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        $batchName = $row['B_Name'];

        echo $batchName;
        echo "<br/>";

        $sql = "SELECT ShortName from Program WHERE P_ID = $program";

        echo $sql;
        echo "<br/>";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $shortName = $row['ShortName'];

        echo $shortName;
        echo "<br/>";

        $className = $shortName . " - " . $batchName;

        echo "$className";


       $sql = "INSERT INTO Class (Class_Name, B_ID, P_ID) VALUES ('$className', '$batch', '$program')";
       
       if ($conn->query($sql) === TRUE) {
           echo $conn->insert_id;
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
       
       header("location:class.php");

       $conn->close();
    }
?>