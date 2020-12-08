<?php 

	include_once 'include/class.user.php';
	$user = new User();
	$id = $_REQUEST['id'];
	$delete = $user->delete($id);

	if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'data_mobil.php';</script>";
	}

 ?>