<?php
	include 'database.php.';
	$database = new Database();
	$id = $_REQUEST['id'];
	$delete = $database->delete($id);
	
	if($delete){
		echo "<script>alert('Uspešno ste obrisali knjigu!');</script>";
						echo "<script>window.location.href = 'knjizara.php';</script>";
	}
?>