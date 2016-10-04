<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>Your Product - SaleProject</TITLE>
		<link rel="stylesheet" type="text/css" href="product.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<script src="product.js"></script>
	</HEAD>
	<BODY>
		<?php
			$idus = $_GET['id_user'];

			$servername = "localhost";
			$username = "wbd";
			$password = "6696";
			$dbname = "sale_project";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT id_user, username FROM user WHERE id_user = '$idus'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$name = $row['username'];
			mysqli_close($conn);
		?>
		<h1>
			<span class="sale">Sale</span><span class="project">Project</span>
		</h1>
		<div class="hi">
			<?php
				echo "<p>Hi, $name!</p>";
			?>
			<p class="logout">logout</p>
		</div>
		<?php 
			echo "
				<div class=\"menu\"><ul>
					<li><a href=\"catalog.php?id_user=$idus\">Catalog</a></li>
					<li><a href=\"#\" class=\"active\">Your Product</a></li>
					<li><a href=\"addProduct.php?id_user=$idus\">Add Product</a></li>
					<li><a href=\"sales.php?id_user=$idus\">Sales</a></li>
					<li><a href=\"purchases.php?id_user=$idus\">Purchases</a></li>
				</ul></div>
			";
		?>
		<div class="box">
			<h2>What are you going to sell today?</h2>
			<hr>
		</div>
		<?php
			$servername = "localhost";
			$username = "wbd";
			$password = "6696";
			$dbname = "sale_project";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "SELECT * FROM product WHERE seller_id = $idus";

			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				setlocale(LC_MONETARY, "en_IND");
				$idpro = $row['id_product'];
				$phpdate = strtotime($row['date_added']);
				$date = date("l, d F Y", $phpdate);
				$phptime = strtotime($row['time_added']);
				$time = date("h.i", $phptime);
				$photo = $row['photo'];
				$name = $row['name'];
				$phpprice = $row['price'];
				$price = number_format($phpprice, 0, ',', '.');
				$desc = $row['description'];
				$likes = $row['likes'];
				$purch = $row['purchases'];

				echo "
					<div class=\"item\">
						<p> <b> $date </b> <br>
						at $time</p>
						<hr>
						<div class=\"item-photo\">
							<img class=\"item-img\" src=\"$photo\">
						</div>
						<div class=\"item-desc\">
							<p> <span class=\"name\"> $name </span> <br>
							<span class=\"price\"> IDR $price </span> <br>
							$desc </p>
						</div>
						<div class=\"item-edit\"> 
							<p> $likes likes <br>
							$purch purchases </p>
							<button class=\"edit\"> <a href=\"editProduct.php?id_user=$idus&id_product=$idpro\"> EDIT </a> </button>
							<button class=\"delete\"> DELETE </button>
						</div>
						<hr class=\"line\">
					</div>
				";
			};
			mysqli_close($conn);
		?>
	</BODY>
</HTML>