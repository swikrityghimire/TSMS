<?php
    include('config.php');?>

<?php

if (isset($_GET['id'])) {
	$delete_id=$_GET['id'];
	$delete_trainer="DELETE FROM Trainer where Tr_ID=$delete_id";
	$run_delete=mysqli_query($conn,$delete_trainer,);
	if ($run_delete) {
		echo "<script>alert('1 trainer Has Been Deleted')</script>";
	} else {
		echo "<script>alert('Error: Product not found')</script>";
	}
}
?>