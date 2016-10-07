<html>
	<body>
		<?php
			$servername = "localhost";
			$username = "wbd";
			$password = "6696";
			$dbname = "sale_project";
			
			$idpro = $_GET['id_prod'];
			$idus= $_GET['id_user'];
			$liked = $_GET['liked'];
			$purch = $_GET['purch'];

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			if ($liked == 0) {
				$sql = "INSERT INTO likes(id_user, id_product) VALUES ('$idus', '$idpro')";
			} else {
				$sql = "DELETE FROM likes WHERE id_user = '$idus' AND id_product = '$idpro'";
			}
			if (mysqli_query($conn, $sql)) {
				$sql1 = "SELECT count(id_product) FROM likes WHERE id_product = $idpro";
				$likes = mysqli_fetch_assoc(mysqli_query($conn, $sql1))['count(id_product)'];
				if ($liked == 0) {
					$name = "LIKED";
					$class = "liked";
					$new = 1;
				} else {
					$name = "LIKE";
					$class = "likes";
					$new = 0;
				}
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			echo "
				<p> $likes likes <br>
				$purch purchases </p>
				<button name=\"likes\" class=\"$class\" onclick=\"return alterLikes($idus, $idpro, $new, $purch)\"> $name </button>
				<button class=\"buy\"> <a href=\"confirmPurchase.php?id_user=$idus&id_product=$idpro\"> BUY </a> </button>
			";
			mysqli_close($conn);
		?>
	</body>
</html>
