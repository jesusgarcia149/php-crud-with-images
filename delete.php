<?php

	include('connection.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$deleteQuery = "DELETE FROM tarjetas WHERE id = $id";
		mysqli_query($conn,$deleteQuery);
		header('Location: index.php');
	}

?>