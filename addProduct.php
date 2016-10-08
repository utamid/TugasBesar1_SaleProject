<html>
<head>
	<title>Add Product - SaleProject</title>
	<link rel="stylesheet" type="text/css" href="addProduct.css"> 
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
	<script src="addProduct.js"></script>
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
		$usn = $row['username'];
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
				<li><a href=\"catalog.php?id_user=$idus\">Catalog</a></li>
				<li><a href=\"product.php?id_user=$idus\">Your Product</a></li>
				<li><a href=\"#\" class=\"active\">Add Product</a></li>
				<li><a href=\"sales.php?id_user=$idus\">Sales</a></li>
				<li><a href=\"purchases.php?id_user=$idus\">Purchases</a></li>
			</ul></div>
		";
	?>
	<div class="box">
		<h2> Please add your product here </h2>
		<hr>
	</div>
	<?php
		if ($_SERVER["REQUEST_METHOD"]  == "POST") {
			$target_dir = "img/";
			$target_file = $target_dir . basename($_FILES["photo"]["name"]);
			//$target_file = basename($_FILES["photo"]["name"]);
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
		if ($_SERVER["REQUEST_METHOD"]  == "POST") {
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
			$sql = "INSERT INTO product (name, price, description, date_added, time_added, photo, seller_id, deleted)
			VALUES ('$name', '$price', '$description', CURDATE(), CURTIME(), '$target_file', '$idus', false)";
			if (mysqli_query($conn, $sql)) {
				header("Location: product.php?id_user=$idus");
				die();
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	?>
	<div class="fill-form">
		<form name = "addProductForm" method = "post" onsubmit="return validateForm()" ontype enctype="multipart/form-data">
			Name <br>
			<div id = "errname" class="err-msg"> </div>
			<input type="text" name="name"> <br>
			Description (max 200 chars) <br>
			<div id = "errdesc" class="err-msg"> </div>
			<textarea name="description" onkeypress = "return limitText()" onkeyup="return limitText()"> </textarea> <br>
			Price (IDR) <br>
			<div id = "errprice" class="err-msg"> </div>
			<input type="text" name="price" onkeypress="return validateNumber()"> <br>
			Photo <br>
			<div id = "errphoto" class="err-msg"> </div>
			<input type="file" name="photo"> <br>
			<input type="reset" name="cancel" value="CANCEL" onclick="return clear_err()">
			<input type="submit" name="add" value="ADD"> 
		</form>
	</div>
</body>
</html>
