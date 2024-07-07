<?php 
	include('conecta.php');
		$tb = $_GET['tb'];
		$cd = $_GET['cd'];

	try {
		$deletar = $conn->prepare("DELETE FROM $tb WHERE cd='$cd'");
		$deletar ->execute();
		header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
?>