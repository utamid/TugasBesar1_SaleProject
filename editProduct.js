function validateForm() {
	var x = document.editProductForm.name.value;
	var y = document.editProductForm.description.value;
	var z = document.editProductForm.price.value;
	document.getElementById('errname').innerHTML="";
	document.getElementById('errdesc').innerHTML="";
	document.getElementById('errprice').innerHTML="";

	var a = true;
	if (x == null || x == ""){
		document.getElementById('errname').innerHTML="Please provide product name";
		a = false;
	}
	if (y == null || y == ""){
		document.getElementById('errdesc').innerHTML="Please provide product description";
		a = false;
	}
	if (z == null || z == ""){
		document.getElementById('errprice').innerHTML="Please provide product price";
		a = false;
	}
	return a;
	
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
		x.value = x.value.substring(0,200);
	}
}
function disableButton() {
	document.editProductForm.photo.disabled = true;
}
