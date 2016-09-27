<html>
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
	<?php
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
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
	?>
	<?php
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

	$sql = "INSERT INTO product (product_id, user_id, name, description, price)
	VALUES ('2', '2', '$name', '$description', '$price')";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
	?>

</body>
</html>
