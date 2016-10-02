<html>
<head>
	<title>Confirmation Purchase</title>
	<link rel="stylesheet" type="text/css" href="purchase.css"> 
</head>
<body>
<h1>
	<span class="sale">Sale</span>
	<span class="project">Project</span>
</h1>
<h2> Please confirm your purchase </h2>
<hr>
<form action = "purchase.php" method = "post">
	Product   : <br>
	Price       : <br>
	Quantity    : <input type="text" name "quantity" class="quantity"> pcs <br>
	Total Price : <br>
	Delivery to : <br><br>
	Consignee <br>
	<input type="text" name = "consignee"> <br><br>
	Full Address<br>
	<input type="text" name = "full_address" class="address"> <br><br>
	Postal Code <br>
	<input type="text" name = "postal_code"> <br><br>
	Phone Number <br>
	<input type="text" name = "phone_number"> <br><br>
	12 Digits Credit Card Number <br>
	<input type="text" name = "credit_card_number"> <br><br>
	3 Digits Card Verification Value <br>
	<input type="text" name = "verification_value"> <br><br><br>
	<input type="reset" name="cancel" value = "CANCEL">
	<input type="submit" name="confirm" value = "CONFIRM"> 
</form>

</body>
</html>
