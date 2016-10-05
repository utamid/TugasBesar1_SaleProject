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
function multiplication(y) {
	var x = document.confirmPurchaseForm.quantity;
	var z = x.value * y;
	document.confirmPurchaseForm.total_price.value = z.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}