<?php
    @include('config.php');
    @include('navigation.php');
    
    if (isset($_POST['submitTraining'])) {
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $semester = $_POST['semester'];

        $insert_training = "INSERT INTO Training (Start_Date, End_Date, Semester, TT_ID, Tr_ID, Class_ID) VALUES ('$startdate', '$enddate', 'semester')";

        $run_training = mysqli_query($conn, $insert_training);

        if ($run_platform) {
             echo"Training Added Successfully";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Training</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container" style="height:550px;">
        <button class="close-btn" onclick="window.location.href='traininglist.php'">×</button>
        <form method="POST">
            <h1>Add Training Details</h1>
            <label for="startdate">Start Date:</label><br>
            <input type="date" id="startdate" name="startdate" required><br>
            <label for="enddate">End Date:</label><br>
            <input type="date" id="enddate" name="enddate" required><br>
            <label for="semester">Semester:</label><br>
            <input type="text" id="semester" name="semester" required><br>
            <label for="trainingtopic">Select Training Topic:</label><br>
            <select name="trainingtopic">
            <?php
                @include 'config.php';
                $sql = "SELECT * FROM Training_Topic";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['TT_ID']; ?>">
                    <?php echo $row['Training_Title']; ?>
                </option>
                <?php
                    }
                }
            ?>
            </select><br>
            <label for="trainer">Select Trainer:</label><br>
            <select name="trainer">
            <?php
                @include 'config.php';
                $sql = "SELECT * FROM Trainer";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['Tr_ID']; ?>">
                    <?php echo $row['Tr_Name']; ?>
                </option>
                <?php
                    }
                }
            ?>
            </select><br>
            <label for="class">Select Class:</label><br>
            <select name="class">
            <?php
                @include 'config.php';
                $sql = "SELECT * FROM Class";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['Class_ID']; ?>">
                    <?php echo $row['Class_Name']; ?>
                </option>
                <?php
                    }
                }
            ?>
            </select><br>
            <div class="button-container">
                <button type="submit" name="submitTraining">Save</button>
            </div>
        </form>
    </div>
</body>
</html>