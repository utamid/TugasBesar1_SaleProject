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
		x.value = x.value.substring(0,200);
	}
}
function disableButton() {
	document.editProductForm.photo.disabled = true;
}