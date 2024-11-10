<?php
    @include('config.php');
    @include('navigation.php');
    
    if (isset($_POST['submitBatch'])) {
        $bname = $_POST['batchname'];

        $insert_batch = "INSERT INTO Batch (B_Name) VALUES ('$bname')";

        $run_batch = mysqli_query($conn, $insert_batch);

        if ($run_batch) {
             echo"Batch Added Successfully";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Batch</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container"  style="height:300px;">
        <button class="close-btn" onclick="window.location.href='batch.php'">×</button>
        <form method="POST">
            <h1>Add Batch Details</h1>
            <label for="batchname">Batch Name:</label><br>
            <input type="text" id="batchname" name="batchname" required><br>
            <div class="button-container">
                <button type="submit" name="submitBatch">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
?>