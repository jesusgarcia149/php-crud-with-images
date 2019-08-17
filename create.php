<a href="index.php">ir a la lista de tarjetas</a>
<?php
	include('connection.php');
	if (isset($_POST['title']) && isset($_POST['description'])) {
		$title = $_POST['title'];
		$description = $_POST['description'];
		$image_name = $_FILES['image']['name'];
		$image_type = $_FILES['image']['type'];
		$image_size = $_FILES['image']['size'];
		$image_temp = $_FILES['image']['tmp_name'];
		$image_location = "images/";
		if (!file_exists($image_location)) {
		    mkdir($image_location, 755, true);
		}
		if (move_uploaded_file($image_temp, $image_location.$image_name)) {
			echo "File Uploaded";
		}else{
			echo "error to uploaded file";
		}
		$image_dir = $image_location . $image_name;
		$createQuery = "INSERT INTO tarjetas(titulo,descripcion,imagen) VALUES ('$title','$description','$image_dir')";
		mysqli_query($conn,$createQuery);
		header('Location: index.php');
	}
?>
<form action="create.php" method="POST" enctype="multipart/form-data">
	<label for="title">title</label>
	<input type="text" name="title" id="title">
	<label for="description">description</label>
	<textarea name="description" id="description"></textarea>
	<label for="image">image</label>
	<input type="file" name="image" id="image">
	<input type="submit" value="create">
</form>