function Delete(x, z) {
	var y = confirm("Are you sure you want to delete this product?");
	if (y == true) {
		location.href='delete.php?id_product='+x+'&id_user='+z;
		return true;
	}
	else  {
		return false;
	}
}
