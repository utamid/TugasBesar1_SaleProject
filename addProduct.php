<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="addProduct.css"> 
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
	<script>
		function validateNumber() {
			var key = (event.which) ? event.which : event.keyCode;
			if (key > 47 && key < 58) {
				return true;
			} else {
				return false;
			}
		}
		function limitText() {
			var x = document.addProductForm.description;
			if (x.value.length > 200) {
				x.value = x.value.substring(0,199);
			}
		}
		function validateFile() 
		{
			var allowedExtension = ['jpeg', 'jpg', 'gif', 'png', 'bmp'];
			var fileExtension = document.addProductForm.photo.value.split('.').pop().toLowerCase();
			var isValidFile = false;
			for(var index = 0; index < 5; index++) {
				if(fileExtension === allowedExtension[index]) {
					isValidFile = true; 
					break;
				}
			}
			if(!isValidFile) {
				alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
			}
			return isValidFile;
		}
		function validateForm() {
			var x = document.addProductForm.name.value;
			var y = document.addProductForm.price.value;
			var z = document.addProductForm.description.value;
			var w = document.addProductForm.photo.value;
			if (x == null || x == "" || y == null || y == "" || z == "" || z == null || w == "" || w == null) {
				alert("Form must be completed");
				return false;
			}
			else if (!validateFile()) {
				alert("File must be Picture");
				return false;
			}
			else {
				return true; 
			}
		}

	</script>
</head>
<body>
	<?php
	$name = $description = $price = "";
	if ($_SERVER["REQUEST_METHOD"]  == "POST") {
		$name = test_input($_POST["name"]);
		$description = test_input($_POST["description"]);
		$price = test_input($_POST["price"]);
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>
	<?php
	if ($_SERVER["REQUEST_METHOD"]  == "POST") {
		//$target_dir = "img";
		//$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		$target_file = basename($_FILES["photo"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
	}
	?>
	<?php
	$id_user = $_GET['id_user'];
	if ($_SERVER["REQUEST_METHOD"]  == "POST") {
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

		$sql = "INSERT INTO product (name, price, description, date_added, time_added, likes, purchases, photo, seller_id)
		VALUES ('$name', '$price', '$description', CURDATE(), CURTIME(), '0', '0', '$target_file', '$id_user')";

		if (mysqli_query($conn, $sql)) {
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
<h2> Please add your product here </h2>
<hr>
<form name = "addProductForm" method = "post" onsubmit="return validateForm()" ontype enctype="multipart/form-data">
	Name <br>
	<input type="text" name = "name"> <br><br>
	Description (max 200 chars)<br>
	<textarea name = "description" onkeydown = "return limitText()"></textarea> <br><br>
	Price (IDR) <br>
	<input type="text" name = "price" onkeypress="return validateNumber()"> <br><br>
	Photo <br>
	<input type="file" name= "photo"> <br><br>
	<input type="reset" name="cancel" value = "CANCEL">
	<input type="submit" name="add" value = "ADD"> 
</form>

</body>
</html>
