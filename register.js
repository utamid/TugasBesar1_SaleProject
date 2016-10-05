	function Validate() {
		
		a = document.register.username;
		b = document.register.fullname;
		c = document.register.mail;
		d = document.register.pass;
		e = document.register.confpass;
		f = document.register.address;
		g = document.register.postcode;
		h = document.register.phone;
		document.getElementById('errun').innerHTML="";
		document.getElementById('errfn').innerHTML="";
		document.getElementById('errmail').innerHTML="";
		document.getElementById('errpass').innerHTML="";
		document.getElementById('errcpass').innerHTML="";
		document.getElementById('errpc').innerHTML="";
		document.getElementById('errpn').innerHTML="";
		
		var x = true;
		
		if (a.value == "") {
			document.getElementById('errun').innerHTML="Please provide your username";
			x = false;
		}
		if (!alphanumeric(a.value)) {
			document.getElementById('errun').innerHTML="Username must only contains characters from a-z, A-Z, or 0-9";
			x = false;
		}
		if (b.value == "") {
			document.getElementById('errfn').innerHTML="Please provide your full name";
			x = false;
		}
		if (!alphabet(b.value)) {
			document.getElementById('errfn').innerHTML="Full name must only contains a-z or A-Z characters";
			x = false;
		}
		if (c.value == "") {
			document.getElementById('errmail').innerHTML="Please provide an email";
			x = false;
		}
		if (!formatemail(c.value)) {
			document.getElementById('errmail').innerHTML="Not a correct email format";
			x = false;
		}
		if (d.value == "") {
			document.getElementById('errpass').innerHTML="Please provide a password";
			x = false;
		}
		if (e.value == "") {
			document.getElementById('errcpass').innerHTML="Please confirm your password";
			x = false;
		}
		if (!matchpass(d.value,e.value)) {
			document.getElementById('errcpass').innerHTML="Password does not match";
			x = false;
		}
		if (f.value == "") {
			document.getElementById('erraddr').innerHTML="Please provide your address";
			x = false;
		}
		if (g.value == "") {
			document.getElementById('errpc').innerHTML="Please provide your postal code";
			x = false;
		}
		if (!numberonly(g.value)) {
			document.getElementById('errpc').innerHTML="Invalid postal code format";
			x = false;
		}
		if (h.value == "") {
			document.getElementById('errpn').innerHTML="Please provide your phone number";
			x = false;
		}
		if (!numberonly(h.value)) {
			document.getElementById('errpn').innerHTML="Invalid phone number format";
			x = false;
		}
		return x;
	}
	
	function alphanumeric(uname) {
		var letters = /^[0-9a-zA-Z]+$/;
		return (uname.match(letters)); 
	}
	
	function alphabet(fname) {
		var letters = /^[a-zA-Z]+$/;
		return (fname.match(letters));
	}
	
	function formatemail(mail) {
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
		return(mail.match(mailformat));
	}
	
	function matchpass(pass, confpass) {
		return(pass == confpass);
	}
	
	function numberonly(val) {
		var numonly = /^[0-9]+$/
		return (val.match(numonly));
	}
