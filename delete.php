<html>
	<body>
		<?php
			$servername = "localhost";
			$username = "wbd";
			$password = "6696";
			$dbname = "sale_project";
			$id_product = $_GET['id_product'];
			$id_user= $_GET['id_user'];
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "UPDATE product SET deleted = true WHERE id_product = '$id_product'";

			if (mysqli_query($conn, $sql)) {
				header("Location: product.php?id_user=$id_user");
				die();
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		?>
	</body>
</html>
