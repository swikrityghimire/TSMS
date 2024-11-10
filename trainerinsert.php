<?php
    @include('config.php');
    @include('navigation.php');
    
    if (isset($_POST['submitTrainer'])) {
        $trname = $_POST['trainername'];
        $tremail = $_POST['traineremail'];
        $trcontact = $_POST['trainercontact'];
        $traddress = $_POST['traineraddress'];

        $insert_trainer = "INSERT INTO Trainer (Tr_Name, Tr_Email, Tr_Contact, Tr_Address) VALUES ('$trname', '$tremail', '$trcontact', '$traddress')";

        $run_trainer = mysqli_query($conn, $insert_trainer);

        if ($run_trainer) {
             echo"Trainer Added Successfully";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Trainer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <button class="close-btn" onclick="window.location.href='trainer.php'">×</button>
        <form method="POST">
            <h1>Add Trainer Details</h1>
            <label for="trainername">Trainer Name:</label><br>
            <input type="text" id="trainername" name="trainername" required><br>
            <label for="traineremail">Trainer Email:</label><br>
            <input type="email" id="traineremail" name="traineremail" required><br>
            <label for="trainercontact">Trainer Contact:</label><br>
            <input type="text" id="trainercontact" name="trainercontact" required><br>
            <label for="traineraddress">Trainer Address:</label><br>
            <input type="text" id="traineraddress" name="traineraddress" required><br>
            <div class="button-container">
                <button type="submit" name="submitTrainer">Save</button>
            </div>
        </form>
    </div>
</body>
</html>