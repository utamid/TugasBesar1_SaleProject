<html>
<head>
	<title>Edit Product</title>
	<link rel="stylesheet" type="text/css" href="addProduct.css"> 
</head>
<body>
<h1>
	<span class="sale">Sale</span>
	<span class="project">Project</span>
</h1>
<h2> Please update your product here </h2>
<hr>
<form action = "editProduct.php" method = "post">
	Name <br>
	<input type="text" name = "name"> <br><br>
	Description (max 200 chars)<br>
	<input type="text" name = "description" class="desc"> <br><br>
	Price (IDR) <br>
	<input type="text" name = "price"> <br><br>
	Photo <br>
	<input type="file" name= "choose_file" value = "choose file" accept="image/*"> <br><br><br>
	<input type="reset" name="cancel" value = "CANCEL">
	<input type="submit" name="add" value = "UPDATE"> 
</form>

</body>
</html>
