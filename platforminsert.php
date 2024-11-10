<?php
    @include('config.php');
    @include('navigation.php');
    
    if (isset($_POST['submitPlatform'])) {
        $platformname = $_POST['platformname'];
        $description = $_POST['description'];

        $insert_platform = "INSERT INTO Platform (Platform_Name, Description) VALUES ('$platformname', '$description')";

        $run_platform = mysqli_query($conn, $insert_platform);

        if ($run_platform) {
             echo"Platform Added Successfully";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Platform</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <button class="close-btn" onclick="window.location.href='platform.php'">×</button>
        <form method="POST">
            <h1>Add Platform Details</h1>
            <label for="platformname">Platform Name:</label><br>
            <input type="text" id="platformname" name="platformname" required><br>
            <label for="description">Description:</label><br>
            <input type="text" id="description" name="description" required><br>
            <div class="button-container">
                <button type="submit" name="submitPlatform">Save</button>
            </div>
        </form>
    </div>
</body>
</html>