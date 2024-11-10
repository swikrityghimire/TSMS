<?php
@include 'config.php';
@include 'navigation.php';

session_start();

if(!isset($_SESSION['student'])){
   header('location:management_page.php');
}
?>
    <meta charset="UTF-8">
    <title>Student Record</title>
    <link rel="stylesheet" href="stylee.css">
<div class="col-md-3">
   <?php include('./sidebar.php')?>
</div>   


<div id="overlay" onclick="closeForm()"></div>
<div id="popupForm" style="display:none; width:500px; height:700px">
    <button class="close-btn" onclick="closeForm()">×</button>
    <form method="post" id="studentForm">
        <h1>Add Student Details</h1>
        <input type="hidden" id="studentId" name="studentId">
        <label for="studentname">Student Name:</label>
        <input type="text" id="studentname" name="studentname" required><br>
        <label for="studentaddress">Student Address:</label>
        <input type="text" id="studentaddress" name="studentaddress" required><br>
        <label for="dateofbirth">Date of Birth:</label>
        <input type="date" id="dateofbirth" name="dateofbirth" required><br>
        <label for="studentcontact">Student Contact:</label>
        <input type="text" id="studentcontact" name="studentcontact" required><br>
        <label for="studentemail">Student Email:</label>
        <input type="email" id="studentemail" name="studentemail" required><br>
        <button type="submit" name="submitStudent">Save</button>
    </form>
</div>

<script>
    function openForm(stid = '', stname = '', staddress = '', dob = '', stcontact = '', stemail = '') {
    document.getElementById("studentId").value =stid;
    document.getElementById("studentname").value = stname;
    document.getElementById("studentaddress").value = staddress;
    document.getElementById("dateofbirth").value = dob;
    document.getElementById("studentcontact").value = stcontact;
    document.getElementById("studentemail").value = stemail;
    
    document.getElementById("popupForm").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}
</script>



<div class="col-md-9">
    <div class="icon-container">
        <button onclick="openForm()">+ Add Student</button>
    </div>
    </div>
    <div class="table-container">
        <table id="studentTable">
            <tr>
                <th>S. No.</th>
                <th>Student Name</th>
                <th>Student Address</th>
                <th>Date of Birth</th>
                <th>Student Contact</th>
                <th>Student Email</th>
                <th>Actions</th>
            </tr>
            <?php
                $sql = "SELECT * FROM Students ORDER BY St_Name";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr id='student-" . $row["St_ID"] . "'>
                                <td>" . $i++ . "</td>
                                <td>" . $row["St_Name"]. "</td>
                                <td>" . $row["St_Address"]. "</td>
                                <td>" . $row["DOB"]. "</td>
                                <td>" . $row["St_Contact"]. "</td>
                                <td>" . $row["St_Email"]. "</td>
                                <td class='actions'>
                                    <button onclick='editStudent(" . $row["St_ID"] . ")'>Edit</button>
                                    <button onclick='deleteStudent(" . $row["St_ID"] . ")'>Delete</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>0 results</td></tr>";
                }
                $conn->close();
            ?>
        </table>
    </div>

    <?php //here; ?>
</div>

<script>
    

    function closeForm() {
        document.getElementById("popupForm").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }

    function editStudent(stid) {
        let row = document.getElementById('student-' + stid);
        let stname = row.cells[1].innerText;
        let staddress = row.cells[2].innerText;
        let dob = row.cells[3].innerText;
        let stcontact = row.cells[4].innerText;
        let stemail = row.cells[5].innerText;
        openForm(stid, stname, staddress, dob, stcontact, stemail, stpassword);
    }

    function deleteStudent(stid) {
        if (confirm('Are you sure you want to delete this student?')) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "studentdelete.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('student-' + stid).remove();
                }
            };
            xhr.send("stid=" + stid);
        }
    }

    document.getElementById("studentForm").addEventListener("submit", function(event) {
        event.preventDefault();
        let stid = document.getElementById("studentId").value;
        let stname = document.getElementById("studentname").value;
        let staddress = document.getElementById("studentaddress").value;
        let dob = document.getElementById("dateofbirth").value;
        let stcontact = document.getElementById("studentcontact").value;
        let stemail = document.getElementById("studentemail").value;
        let stpassword = document.getElementById("studentpassword").value;
        let xhr = new XMLHttpRequest();
        xhr.open("POST", stid ? "studentupdate.php" : "studentinsert.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (stid) {
                    let row = document.getElementById('student-' + stid);
                    row.cells[1].innerText = stname;
                    row.cells[2].innerText = staddress;
                    row.cells[3].innerText = dob;
                    row.cells[4].innerText = stcontact;
                    row.cells[5].innerText = stemail;
                    row.cells[6].innerText = stpassword;
                } else {
                    let newId = xhr.responseText;
                    let row = document.createElement('tr');
                    row.id = 'student-' + newId;
                    row.innerHTML =  <td>${newId}</td>
                                     <td>${stname}</td>
                                     <td>${staddress}</td>
                                     <td>${dob}</td>
                                     <td>${stcontact}</td>
                                     <td>${stemail}</td>
                                     <td>${stpassword}</td>
                                     <td class='actions'>
                                       <button onclick='editStudent(${newId})'>Edit</button>
                                       <button onclick='deleteStudent(${newId})'>Delete</button>
                                     </td>;
                    document.getElementById("studentTable").appendChild(row);
                }
                closeForm();
            }
        };
        xhr.send("stid=" + stid + "&studentname=" + stname + "&studentaddress=" + staddress + "&dateofbirth=" + dob + "&studentcontact=" + studentcontact + "&studentemail=" + studentemail + );
    });
</script>
<?php include('./footer.php')?>


</body>
</html>
