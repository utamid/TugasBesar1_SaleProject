<html>
	<head>
		<title>Confirmation Purchase - Sale Project</title>
		<link rel="stylesheet" type="text/css" href="confirmpurchase.css"> 
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
		<script src = confirmPurchase.js>
		</script>
	</head>
	<body>
		<?php
		$id_user = $_GET['id_user'];
		$id_product = $_GET['id_product'];
		
		$servername = "localhost";
		$username = "wbd";
		$password = "6696";
		$dbname = "sale_project";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT id_user, username FROM user WHERE id_user = '$id_user'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$usn = $row['username'];

		$sql1 = "SELECT name, price FROM product WHERE id_product = '$id_product'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$name = $row1['name'];
		$price = $row1['price'];
		$printprice = number_format($price, 0, ',', '.');

		$sql2 = "SELECT full_name, full_address, postal_code, phone_number FROM user WHERE id_user = '$id_user'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$consignee = $row2['full_name'];
		$full_address = $row2['full_address'];
		$postal_code = $row2['postal_code'];
		$phone_number = $row2['phone_number'];

		mysqli_close($conn);
		?>
		<?php
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
			
		$servername = "localhost";
		$username = "wbd";
		$password = "6696";
		$dbname = "sale_project";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if ($_SERVER["REQUEST_METHOD"]  == "POST") {
			$quantity = test_input($_POST["quantity"]);
			$total_price = $quantity * $price;
			$consignee = test_input($_POST["consignee"]);
			$full_address = test_input($_POST["full_address"]);
			$postal_code = test_input($_POST["postal_code"]);		
			$phone_number = test_input($_POST["phone_number"]);
			$credit_card_number = test_input($_POST["credit_card_number"]);
			$verification_value = test_input($_POST["verification_value"]);
					
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$sql = "INSERT INTO purchase(id_product, id_buyer, product_name, price, quantity, total_price, consignee, full_address, postal_code, phone_number, credit_card_number, card_verification_value, date_purchased, time_purchased) 
			VALUES ('$id_product', '$id_user', '$name', '$price', '$quantity', '$total_price', '$consignee', '$full_address', '$postal_code', '$phone_number', '$credit_card_number', '$verification_value', CURDATE(), CURTIME())";
			if (mysqli_query($conn, $sql)) {
				header("Location: purchases.php?id_user=$id_user");
								die();
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
		?>
		
		<h1>
			<span class="sale">Sale</span><span class="project">Project</span>
		</h1>
		<div class="hi">
			<?php
				echo "<p>Hi, $usn!</p>";
			?>
			<p class="logout"> <a href="login.php"> logout </a> </p>
		</div>
		<?php 
			echo "
				<div class=\"menu\"><ul>
					<li><a href=\"catalog.php?id_user=$id_user\">Catalog</a></li>
					<li><a href=\"product.php?id_user=$id_user\">Your Product</a></li>
					<li><a href=\"addProduct.php?id_user=$id_user\">Add Product</a></li>
					<li><a href=\"sales.php?id_user=$id_user\">Sales</a></li>
					<li><a href=\"purchases.php?id_user=$id_user\">Purchases</a></li>
				</ul></div>
			";
		?>
		<div class="box">
			<h2> Please confirm your purchase</h2>
			<hr>
		</div>

		<div class="fill-form">
			<form method = "post" name = "confirmPurchaseForm" onsubmit="return validateForm()">
				<div class="item-desc">
					<?php
						echo "
							<table>
								<tr>
									<td> Product </td>
									<td> : $name </td>
								</tr>
								<tr>
									<td> Price </td>
									<td> : IDR <input readonly type=\"text\" name=\"price\" class = \"read_only\" value=\"$printprice\"></td>
								</tr>
								<tr class=\"q\">
									<td> Quantity </td>
									<td> : <input type=\"text\" name =\"quantity\" class=\"quantity\" value = \"1\" onkeypress=\"return validateNumber()\" onkeydown=\"return multiplication($price)\" onkeyup=\"return multiplication($price)\"> pcs </td>
								</tr>
								<tr>
									<td> Total Price </td>
									<td> : IDR <input readonly type=\"text\" name=\"total_price\" class = \"read_only\" value=\"$printprice\"> </td>
								</tr>
								<tr>
									<td> Delivery to </td>
									<td> : </td>
								</tr>
							</table>
						";
					?>
				</div>
				<div class="con-form">
					Consignee <br>
					<input type="text" name = "consignee" value = "<?php echo $consignee?>" onkeypress="return validateAlphabet()"> <br><br>
					Full Address<br>
					<textarea name = "full_address"><?php echo $full_address?></textarea> <br><br>
					Postal Code <br>
					<input type="text" name = "postal_code" onkeypress="return validateNumber() && limitText()" onkeyup="return limitText()" value = "<?php echo $postal_code?>"> <br><br>
					Phone Number <br>
					<input type="text" name = "phone_number" onkeypress="return validateNumber()&& limitText()" onkeyup="return limitText()" value = "<?php echo $phone_number?>"> <br><br>
					12 Digits Credit Card Number <br>
					<input type="text" name = "credit_card_number" onkeypress="return validateNumber() && limitText()" onkeyup="return limitText()"> <br><br>
					3 Digits Card Verification Value <br>
					<input type="text" name = "verification_value" onkeypress="return validateNumber() && limitText()" onkeyup="return limitText()"> <br><br><br>
					<button class="cancel"> <a href="catalog.php?id_user=<?php echo $id_user?>"> CANCEL </a> </button>
					<input type="submit" name="confirm" value = "CONFIRM">
				</div>
			</form>
		</div>
	</body>
</html>
