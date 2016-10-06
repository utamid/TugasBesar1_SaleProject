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
	if (x.value.length >= 200) {
		x.value = x.value.substring(0,200);
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
		
	}
	return isValidFile;
}
function validateForm() {
	var x = document.addProductForm.name.value;
	var y = document.addProductForm.price.value;
	var z = document.addProductForm.description.value;
	var w = document.addProductForm.photo.value;
	document.getElementById('errmsg').innerHTML="";
	if (x == null || x == "" || y == null || y == "" || z == "" || z == null || w == "" || w == null) {
		document.getElementById('errmsg').innerHTML="Please complete form";
		return false;
	}
	else if (!validateFile()) {
		document.getElementById('errmsg').innerHTML="Invalid file format";
		return false;
	}
	else {
		return true; 
	}
}

function clear_err() {
	document.getElementById('errmsg').innerHTML="";
}