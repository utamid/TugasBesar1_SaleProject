function validateForm() {
	var x = document.confirmPurchaseForm.quantity.value;
	var y = document.confirmPurchaseForm.consignee.value;
	var z = document.confirmPurchaseForm.full_address.value;
	var w = document.confirmPurchaseForm.postal_code.value;
	var v = document.confirmPurchaseForm.phone_number.value;
	var u = document.confirmPurchaseForm.credit_card_number.value;
	var t = document.confirmPurchaseForm.verification_value.value;
	var a = true;
	document.getElementById('errq').innerHTML="";
	document.getElementById('errcons').innerHTML="";
	document.getElementById('erraddr').innerHTML="";
	document.getElementById('errpost').innerHTML="";
	document.getElementById('errphone').innerHTML="";
	document.getElementById('errccn').innerHTML="";
	document.getElementById('errcvv').innerHTML="";
	if (y == null || y == "" || !y.replace(/^\s+|\s+$/g,"")) {
		document.getElementById('errcons').innerHTML="Please provide consignee name";
		a = false;	
	}
	if (z == null || z == "") {
		document.getElementById('erraddr').innerHTML="Please provide address";
		a = false;	
	}
	if (w == null || w == "") {
		document.getElementById('errpost').innerHTML="Please provide postal code";
		a = false;	
	}
	if (v == null || v == "") {
		document.getElementById('errphone').innerHTML="Please provide phone number";
		a = false;	
	}
	if (u == null || u == "") {
		document.getElementById('errccn').innerHTML="Please provide credit card number";
		a = false;	
	}	else if (u.length != 12) {
		document.getElementById('errccn').innerHTML="Credit Card Number must be 12 Digits";
		a = false;
	}
	if (t == null || t == "") {
		document.getElementById('errcvv').innerHTML="Please provide card verification value";
		a = false;	
	}	else if (t.length != 3) {
		document.getElementById('errcvv').innerHTML="Card Verification Value must be 3 Digits";
		a = false;	
	}
	if (x == null || x == "") {
		document.getElementById('errq').innerHTML="Please enter quantity";
		a = false;
	} else if (x == 0) {
		document.getElementById('errq').innerHTML="Quantity must be more than zero";
		a = false;
	}
	if (a) {
		var c = confirm("Are you sure you want to buy this product?");
		if (c == true) {
			a = true;
		}
		else  {
			a = false;
		}
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
function validateAlphabet() {
	var key = (event.which) ? event.which : event.keyCode;
	if (key == 32 || (key > 64 && key < 91) || (key > 96 && key < 123)) {
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
function multiplication(y) {
	var x = document.confirmPurchaseForm.quantity;
	var z = x.value * y;
	document.confirmPurchaseForm.total_price.value = z.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}
