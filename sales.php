<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>Sales - SaleProject</TITLE>
		<link rel="stylesheet" type="text/css" href="sales.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
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
			<p class="logout"> <a href="login.php"> logout </a> </p>
		</div>
		<?php 
			echo "
				<div class=\"menu\"><ul>
					<li><a href=\"catalog.php?id_user=$idus\">Catalog</a></li>
					<li><a href=\"product.php?id_user=$idus\">Your Product</a></li>
					<li><a href=\"addProduct.php?id_user=$idus\">Add Product</a></li>
					<li><a href=\"#\" class=\"active\">Sales</a></li>
					<li><a href=\"purchases.php?id_user=$idus\">Purchases</a></li>
				</ul></div>
			";
		?>
		<div class="box">
			<h2>Here are your sales</h2>
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

			$sql = "SELECT date_purchased, time_purchased, photo, product_name, purchase.price, quantity, total_price, username, consignee, purchase.full_address as f_add, purchase.postal_code as p_code, purchase.phone_number as p_num FROM purchase, product, user WHERE seller_id = $idus AND id_buyer = id_user AND purchase.id_product = product.id_product ORDER BY date_purchased DESC, time_purchased DESC";

			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$phpdate = strtotime($row['date_purchased']);
				$date = date("l, d F Y", $phpdate);
				$phptime = strtotime($row['time_purchased']);
				$time = date("h.i", $phptime);
				$photo = $row['photo'];
				$prodname = $row['product_name'];
				$phpprice = $row['price'];
				$price = number_format($phpprice, 0, ',', '.');
				$quantity = $row['quantity'];
				$phptotal = $row['total_price'];
				$total = number_format($phptotal, 0, ',', '.');
				$username = $row['username'];
				$consignee = $row['consignee'];
				$add = $row['f_add'];
				$postal_code = $row['p_code'];
				$phone_number = $row['p_num'];

				echo "
					<div class=\"item\">
						<p> <b> $date </b> <br>
						at $time</p>
						<hr>
						<div class=\"item-photo\">
							<img class=\"item-img\" src=\"$photo\">
						</div>
						<div class=\"item-desc\">
							<p> <span class=\"name\"> $prodname </span> <br>
							<span class=\"price\"> IDR $total <br>
							$quantity pcs <br>
							@$price <br>
							</span>
							<p> bought by <b> $username </b> </p>
						</div>
						<div class=\"item-deliv\"> 
							<p> Delivery to <b> $consignee </b> <br>
							$add <br>
							$postal_code <br>
							$phone_number <br> </p>
						</div>
					</div>
				";
			};
			mysqli_close($conn);
		?>
	</BODY>
</HTML>