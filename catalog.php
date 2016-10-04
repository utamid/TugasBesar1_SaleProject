<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>Catalogue - SaleProject</TITLE>
		<link rel="stylesheet" type="text/css" href="catalog.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<script src="catalog.js"></script>
	</HEAD>
	<BODY>
		<?php
			function monthname($data) {
				switch (n) {
					case 1: "January"; break;
					case 2: "February"; break;
					case 3: "March"; break;
					case 4: "April"; break;
					case 5: "May"; break;
				}
			}
			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

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
					<li><a href=\"#\" class=\"active\">Catalog</a></li>
					<li><a href=\"product.php?id_user=$idus\">Your Product</a></li>
					<li><a href=\"addProduct.php?id_user=$idus\">Add Product</a></li>
					<li><a href=\"sales.php?id_user=$idus\">Sales</a></li>
					<li><a href=\"purchases.php?id_user=$idus\">Purchases</a></li>
				</ul></div>
			";
		?>
		<div class="box">
			<h2>What are you going to buy today?</h2>
			<hr>
		</div>
		<div class="search-form">
			<form name="searchCatalogForm" method = "post">
				<div>
					<input type="search" name="search" placeholder="Search catalog ...">
					<input type="submit" name="go" value="GO">
				</div>
				<div class="by">
					by
				</div>
				<div class="radio-button">
					<input type="radio" name="search_button" value="product"> product <br>
					<input type="radio" name="search_button" value="store"> store <br>
				</div>
			</form>
		</div>
		<?php
			if ($_SERVER["REQUEST_METHOD"]  == "POST") {
				$search = $search_by = "";
				$search = test_input($_POST["search"]);
				$search_by = $_POST["search_button"];

				$servername = "localhost";
				$username = "wbd";
				$password = "6696";
				$dbname = "sale_project";

				$conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				if ($search_by == "product") {
					$sql = "SELECT id_product, name, price, description, date_added, time_added, likes, purchases, seller_id, photo, username FROM product, user WHERE id_user = seller_id AND name like '%$search%'";
				} else {
					$sql = "SELECT id_product, name, price, description, date_added, time_added, likes, purchases, seller_id, photo, username FROM product, user WHERE id_user = seller_id AND username like '%$search%'";
				}

				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					setlocale(LC_MONETARY, "en_IND");
					$idpro = $row['id_product'];
					$usn = $row['username'];
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
							<p class=\"usn\"> <b> $usn </b> <br>
							added this on $date, at $time</p>
							<hr>
							<div class=\"item-photo\">
								<img class=\"item-img\" src=\"$photo\">
							</div>
							<div class=\"item-desc\">
								<p> <span class=\"name\"> $name </span> <br>
								<span class=\"price\"> IDR $price </span> <br>
								$desc </p>
							</div>
							<div class=\"item-like\"> 
								<p> $likes likes <br>
								$purch purchases </p>
								<button class=\"likes\"> LIKE </button>
								<button class=\"buy\"> <a href=\"confirm.php?id_user=$idus&id_product=$idpro\"> BUY </a> </p>
							</div>
							<hr class=\"line\">
						</div>

					";
				};
				mysqli_close($conn);
			}
		?>
	</BODY>
</HTML>