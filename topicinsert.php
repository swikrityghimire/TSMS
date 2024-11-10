<?php
    @include('config.php');
    @include('navigation.php');
    
    if (isset($_POST['submitTopic'])) {
        $platformname = $_POST['platformname'];
        $trainingtitle = $_POST['trainingtitle'];
        $titledescription = $_POST['titledescriptiom'];

        $sql = "SELECT Platform_Name FROM Platform WHERE Platform_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $platform);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $platformname = $row['platformname'];

        $insert_topic = "INSERT INTO Training_Topic (Platform_ID, Training_Title, TT_Description) VALUES ('$platformid', 'trainingtitle', '$titledescription')";
        $stmt = $conn->prepare($insert_topic);
        $stmt->bind_param("sii", $platformname, $trainingtitle, $titledescription);
        $run_topic = $stmt->execute();

        $run_topic = mysqli_query($conn, $insert_topic);

        if ($run_topic) {
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
    <title>Add  Training Topic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <button class="close-btn" onclick="window.location.href='trainingtopic.php'">×</button>
        <form method="POST">
            <h1>Add Training Topic Details</h1>
            <label for="platform">Select Platform:</label><br>
            <select name="platform">
            <?php
                $sql = "SELECT Platform_ID, Platform_Name FROM Platform";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['Platform_ID']; ?>">
                    <?php echo $row['Platform_Name']; ?>
                </option>
                <?php
                    }
                }
            ?>
            </select>
            <br>
            <label for="trainingtitle">Training Title:</label><br>
            <input type="text" id="trainingtitle" name="trainingtitle" required><br>
            <label for="titledescription">Title Description:</label><br>
            <input type="text" id="titledescription" name="titledescription" required><br>
            <div class="button-container">
                <button type="submit" name="submitTopic">Save</button>
            </div>
        </form>
    </div>
</body>
</html>