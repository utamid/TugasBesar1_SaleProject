<html>
<head>
	<title>Confirmation Purchase</title>
	<link rel="stylesheet" type="text/css" href="confirmpurchase.css"> 
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
	<script>
		function validateForm() {
			var x = document.confirmPurchaseForm.quantity.value;
			var y = document.confirmPurchaseForm.consignee.value;
			var z = document.confirmPurchaseForm.full_address.value;
			var w = document.confirmPurchaseForm.postal_code.value;
			var v = document.confirmPurchaseForm.phone_number.value;
			var u = document.confirmPurchaseForm.credit_card_number.value;
			var t = document.confirmPurchaseForm.verification_value.value;
			if (x == null || x == "" || y == null || y == "" || z == "" || z == null || w == "" || w == null || t == "" || t == null || u == "" || u == null || v == "" || v == null) {
				alert("Form must be completed");
				return false;
			} else if (u.length != 12) {
				alert("Credit Card Number must be 12 Digits");
				return false;
			} else if (t.length != 3) {
				alert("Card Verification Value must be 3 Digits");
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
			var v = document.confirmPurchaseForm.credit_card_number;
			var w = document.confirmPurchaseForm.verification_value;
			var x = document.confirmPurchaseForm.postal_code;
			var y = document.confirmPurchaseForm.phone_number;
			if (v.value.length >= 12) {
				v.value = v.value.substring(0,12);
			}
			if (w.value.length >= 3) {
				w.value = w.value.substring(0,3);
			}
			if (x.value.length >= 5) {
				x.value = x.value.substring(0,5);
			}
			if (y.value.length >= 15) {
				y.value = y.value.substring(0,15);
			}
		}
		function multiplication() {
			var x = document.confirmPurchaseForm.quantity;
			var y = document.confirmPurchaseForm.price
			document.confirmPurchaseForm.total_price.value = x.value * y.value;
			
		}


	</script>
</head>
<body>
	<?php
	$id_user = $_GET['id_user'];
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
	$sql1 = "SELECT name, price FROM product WHERE id_product = '$id_product'";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();
	$name = $row1['name'];
	$price = $row1['price'];
	$total_price = 10000;
	$sql2 = "SELECT full_name, full_address, postal_code, phone_number FROM user WHERE id_user = '$id_user'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	$consignee = $row2['full_name'];
	$full_address = $row2['full_address'];
	$postal_code = $row2['postal_code'];
	$phone_number = $row2['phone_number'];
	$conn->close();
	?>
	<?php
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
		
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

	if ($_SERVER["REQUEST_METHOD"]  == "POST") {
		$quantity = test_input($_POST["quantity"]);
		$total_price = test_input($_POST["total_price"]);
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
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
	?>
	
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
<h2> Please confirm your purchase</h2>
<hr>
<form method = "post" name = "confirmPurchaseForm" onsubmit="return validateForm()">
	Product &nbsp &nbsp &nbsp &nbsp : <?php echo $name?> <br>
	Price &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp :  <input readonly type="text" name="price" class = "read_only" value="<?php echo $price ?>"> <br>
	Quantity &nbsp &nbsp &nbsp &nbsp: <input type="text" name ="quantity" class="quantity" value = "1" onkeypress="return validateNumber" onkeydown = "return multiplication()" onkeyup = "return multiplication()"> pcs <br>
	Total Price &nbsp &nbsp :  <input readonly type="text" name="total_price" class = "read_only" value="<?php echo $price ?>"> <br>
	Delivery to &nbsp &nbsp : <br><br>
	Consignee <br>
	<input type="text" name = "consignee" value = "<?php echo $consignee?>"> <br><br>
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
	<input type="reset" name="cancel" value = "CANCEL">
	<input type="submit" name="confirm" value = "CONFIRM"> 
</form>

</body>
</html>
