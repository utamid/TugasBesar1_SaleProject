<html>
<head>
	<title>Edit Product - SaleProject</title>
	<link rel="stylesheet" type="text/css" href="editProduct.css"> 
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
	<script src=editProduct.js></script>
</head>
<body>
	<?php
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$id_product = $_GET['id_product'];
		$id_user = $_GET['id_user'];
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
		$sql = "SELECT id_product, name, description, price, photo FROM product WHERE id_product = '$id_product'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$name = $row['name'];
		$description = $row['description'];
		$price = $row['price'];
		$photo = $row['photo'];

		$sql1 = "SELECT id_user, username FROM user WHERE id_user = '$id_user'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$usn = $row1['username'];
		mysqli_close($conn);
	?>
		
	<body>
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
			<h2> Please update your product here </h2>
			<hr>
		</div>
		<?php
			$name = $description = $price = "";
			if ($_SERVER["REQUEST_METHOD"]  == "POST") {
				$name = test_input($_POST["name"]);
				$description = test_input($_POST["description"]);
				$price = test_input($_POST["price"]);	
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
				$sql = "UPDATE product SET name = '$name', description = '$description', price = '$price' WHERE id_product = '$id_product'";
				if (mysqli_query($conn, $sql)) {
					header("Location: product.php?id_user=$id_user");
					die();
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
			}
		?>
		<div class="fill-form">
			<form name = "editProductForm" method = "post" onsubmit="return validateForm()" ontype enctype="multipart/form-data">
				Name <br>
				<input type="text" name = "name" value="<?php echo $row['name'];?>"> <br>
				Description (max 200 chars) <br>
				<textarea name = "description" onkeypress = "return limitText()" onkeyup="return limitText()" ><?php echo $row['description'];?></textarea> <br>
				Price (IDR) <br>
				<input type="text" name = "price" onkeypress="return validateNumber()" value="<?php echo $row['price'];?>"> <br>
				Photo <br>
				<div class="photo-box">
					<input type="button" name= "photo" value = "Choose File" onclick="return disableButton()"> <span class = "photo-name"><?php echo $photo?></span><br>
				</div>
					<button class="cancel"> <a href="product.php?id_user=<?php echo $id_user?>"> CANCEL </a> </button>
					<input type="submit" name="add" value = "UPDATE""> 
			</form>
		</div>
	</body>
</html>