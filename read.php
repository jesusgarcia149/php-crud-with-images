<?php 
	include('connection.php');
?>
<table>
	<tr>
		<td>id</td>
		<td>title</td>
		<td>description</td>
		<td>image</td>
		<td>date</td>
		<td>actions</td>
		<img src="" width="">
	</tr>
	<?php 
		$readQuery = "SELECT * FROM tarjetas";
		$readRess = mysqli_query($conn,$readQuery);
		while ($readRow = mysqli_fetch_array($readRess)) {
			echo "<tr>
					<td>".$readRow[0]."</td>
					<td>".$readRow[1]."</td>
					<td>".$readRow[2]."</td>
					<td><img src=".$readRow[3]." width='64'></td>
					<td>".$readRow[4]."</td>
					<td><a href='update.php?id=$readRow[0]&title=$readRow[1]&description=$readRow[2]&image=$readRow[3]'>edit</a></td>
					<td><a href='delete.php?id=$readRow[0]'>delete</a></td>
				  </tr>"
			;
		}
	?>
</table>