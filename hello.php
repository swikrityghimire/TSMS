<select>
<?php

include('config.php');
                $sql = "SELECT * from Batch";
                $result = $conn->query($sql);
                if($result->num_rows > 0)
                {

                    while($row = $result->fetch_assoc())
                    {
            ?>
                <option value="<?php echo $row['B_ID']; ?>">
                    <?php echo $row['B_Name']; ?>
                </option>
                <?php
                    }
                }
?>
</select>