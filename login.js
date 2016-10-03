function limitText() {
	var x = document.loginForm.usn;
	if (x.value.length > 50) {
		x.value = x.value.substring(0,50);
	}
}

function limitPass() {
	var x = document.loginForm.pass;
	if (x.value.length > 20) {
		x.value = x.value.substring(0,20);
	}
}
