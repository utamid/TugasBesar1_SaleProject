<html>
<head>
	<title>Edit Product</title>
	<link rel="stylesheet" type="text/css" href="addProduct.css"> 
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
	<script>
		function validateForm() {
			var x = document.editProductForm.name.value;
			var y = document.editProductForm.price.value;
			var z = document.editProductForm.description.value;
			if (x == null || x == "" || y == null || y == "" || z == "" || z == null) {
				alert("Form must be completed");
				return false;
			}
			else {
				return true; 
			}
		}
		function validateNumber() {
			var key = (event.which) ? event.which : event.keyCode;
			if (key > 47 && key < 58) {
				return true;
			} else {
				return false;
			}
		}
		function limitText() {
			var x = document.editProductForm.description;
			if (x.value.length = 200) {
				x.value = x.value.substring(0,199);
			}
		}
		function disableButton() {
			document.editProductForm.photo.disabled = true;
		}

	</script>
</head>
<body>
	<?php
	$id_product = $_GET['id_product'];
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "sale_project";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT id_product, name, description, price, photo FROM product WHERE id_product = '$id_product'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$name = $row['name'];
	$description = $row['description'];
	$price = $row['price'];
	$photo = $row['photo'];
	$conn->close();
	?>
	<?php
	$name = $description = $price = "";
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	if ($_SERVER["REQUEST_METHOD"]  == "POST") {
		$name = test_input($_POST["name"]);
		$description = test_input($_POST["description"]);
		$price = test_input($_POST["price"]);	
		$servername = "localhost";
		$username = "root";
		$password = "1234";
		$dbname = "sale_project";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE product SET name = '$name', description = '$description', price = '$price' WHERE id_product = '$id_product'";

		if (mysqli_query($conn, $sql)) {
		
		} 

		mysqli_close($conn);
	}
	?>

		
<body>
<h1>
	<span class="sale">Sale</span><span class="project">Project</span>
</h1>
<p>Hi!</p>
<p class="logout">logout</p>
<ul>
  <li><a href="#home">Catalog</a></li>
  <li><a href="#news">Your Product</a></li>
  <li><a href="#contact">Add Product</a></li>
  <li><a href="#about">Sales</a></li>
  <li><a href="#about">Purchases</a></li>
</ul>
<h2> Please update your product here </h2>
<hr>
<form name = "editProductForm" method = "post" onsubmit="return validateForm()" ontype enctype="multipart/form-data">
	Name <br>
	<input type="text" name = "name" value="<?php echo $row['name'];?>"> <br><br>
	Description (max 200 chars)<br>
	<textarea name = "description" onkeypress = "return limitText()" onkeyup="return limitText()" ><?php echo $row['description'];?></textarea> <br><br>
	Price (IDR) <br>
	<input type="text" name = "price" onkeypress="return validateNumber()" value="<?php echo $row['price'];?>"> <br><br>
	Photo <br>
	&nbsp <input type="button" name= "photo" value = "Choose File" onclick="return disableButton()"> <span class = "photo_name"><?php echo $photo?></span><br><br>
	<input type="reset" name="cancel" value = "CANCEL">
	<input type="submit" name="add" value = "UPDATE""> 
</form>

</body>
</html>
