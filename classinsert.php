<?php
    @include('config.php');
    @include('navigation.php');
    
    if (isset($_POST['submitClass'])) {
        $batch = $_POST['batch'];
        $program = $_POST['program'];

        echo $batch;
        echo "<br/>";
        echo $program;
        echo "<br/>";

        // Get Batch Name
        $sql = "SELECT B_Name FROM Batch WHERE B_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $batch);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $batchName = $row['B_Name'];
        
        echo $batchName;
        echo "<br/>";

        // Get Program Short Name
        $sql = "SELECT ShortName FROM Program WHERE P_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $program);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $shortName = $row['ShortName'];
        
        echo $shortName;
        echo "<br/>";

        // Generate Class Name
        $className = $shortName . " - " . $batchName;
        echo "$className";

        // Insert into Class
        $insert_class = "INSERT INTO Class (Class_Name, B_ID, P_ID) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_class);
        $stmt->bind_param("sii", $className, $batch, $program);
        $run_class = $stmt->execute();

        if ($run_class) {
            echo "Class Added Successfully";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Class</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container" style="height:350px;">
        <button class="close-btn" onclick="window.location.href='program.php'">×</button>
        <form method="POST">
            <h1>Add Class Details</h1>
            <label for="batch">Select Batch:</label><br>
            <select name="batch">
            <?php
                @include 'config.php';
                $sql = "SELECT * FROM Batch";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['B_ID']; ?>">
                    <?php echo $row['B_Name']; ?>
                </option>
                <?php
                    }
                }
            ?>
            </select>
            <br><br>
            <label for="program">Select Program:</label><br>
            <select name="program">
            <?php
                $sql = "SELECT P_ID, ShortName FROM Program";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['P_ID']; ?>">
                    <?php echo $row['ShortName']; ?>
                </option>
                <?php
                    }
                }
            ?>
            </select>
            <br>
            <div class="button-container">
                <button type="submit" name="submitClass">Save</button>
            </div>
        </form>
    </div>
</body>
</html>