<a href="index.php">ir a la lista de tarjetas</a>
<?php
	include('connection.php');
	if (isset($_POST['title']) && isset($_POST['description'])) {
		//agarramos los datos del formulario
		$id = $_POST['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$image_name = $_FILES['image']['name'];
		$image_type = $_FILES['image']['type'];
		$image_size = $_FILES['image']['size'];
		$image_temp = $_FILES['image']['tmp_name'];
		$image_location = "images/";
		if (!file_exists($image_location)) {
		    mkdir($image_location, 0777, true);
		}
		//en caso de que el usuario no actualize la imagen
		if ($image_name == '' && $image_type == '' && $image_size == '') {
			$updateQuery = "UPDATE `tarjetas` SET `titulo` = '$title', `descripcion` = '$description' WHERE `tarjetas`.`id` = $id";
			mysqli_query($conn,$updateQuery);
			header('Location: index.php');
		//en caso de que el usuario si actualize la imagen
		}else{
			if (move_uploaded_file($image_temp, $image_location.$image_name)) {
				echo "File Uploaded";
			}
			$image_dir = $image_location . $image_name;
			$updateQuery = "UPDATE `tarjetas` SET `titulo` = '$title', `descripcion` = '$description', `imagen` = '$image_dir' WHERE `tarjetas`.`id` = $id";
			mysqli_query($conn,$updateQuery);
			header('Location: index.php');
		}
	}

?>
<form action="update.php" method="POST" enctype="multipart/form-data">
	<label for="id">id</label>
	<input type="number" name="id" id="id" value="<?php echo $_GET['id']; ?>">
	<label for="title">title</label>
	<input type="text" name="title" id="title" value="<?php echo $_GET['title']; ?>">
	<label for="description">description</label>
	<textarea name="description" id="description"><?php echo $_GET['description']; ?></textarea>
	<label for="image">image</label>
	<img src="<?php echo $_GET['image']; ?>" width="64">
	<input type="file" name="image" id="image">
	<input type="submit" value="update">
</form>
