<?php
    @include('config.php');
    @include('navigation.php');
    
    if (isset($_POST['submitProgram'])) {
        $title = $_POST['title'];
        $shortname = $_POST['shortname'];
        $credithour = $_POST['credihour'];

        $insert_program = "INSERT INTO Program (Title, ShortName, Credit_hr) VALUES ('$title', '$shortname', '$credithour')";

        $run_program = mysqli_query($conn, $insert_program);

        if ($run_program) {
             echo"Program Added Successfully";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Program</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <button class="close-btn" onclick="window.location.href='program.php'">×</button>
        <form method="POST">
            <h1>Add Program Details</h1>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            <label for="shortname">ShortName:</label><br>
            <input type="text" id="shortname" name="shortname" required><br>
            <label for="credithour">Credit Hour:</label><br>
            <input type="text" id="credithour" name="credithour" required><br>
            <div class="button-container">
                <button type="submit" name="submitProgram">Save</button>
            </div>
        </form>
    </div>
</body>
</html>