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
	var z = document.addProductForm.price.value;
	var b = document.addProductForm.description.value;
	var w = document.addProductForm.photo.value;
	document.getElementById('errname').innerHTML="";
	document.getElementById('errdesc').innerHTML="";
	document.getElementById('errprice').innerHTML="";
	document.getElementById('errphoto').innerHTML="";
	var a = true;
	if (x == null || x == ""){
		document.getElementById('errname').innerHTML="Please provide product name";
		a = false;
	}
	if (z == null || z == ""){
		document.getElementById('errprice').innerHTML="Please provide product price";
		a = false;
	}
	if (w == null || w == ""){
		document.getElementById('errphoto').innerHTML="Please provide photo of the product";
		a = false;
	} 	else if (!validateFile()) {
		document.getElementById('errphoto').innerHTML="Invalid file format";
		a = false;
	}
	if (b.length < 1 || !b.replace(/^\s+|\s+$/g,"")){
		document.getElementById('errdesc').innerHTML="Please provide photo of the product";
		a = false;
	}
	return a;
}
function clear_err() {
	document.getElementById('errname').innerHTML="";
	document.getElementById('errdesc').innerHTML="";
	document.getElementById('errprice').innerHTML="";
	document.getElementById('errphoto').innerHTML="";
}
