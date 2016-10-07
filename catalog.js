function validateForm() {
	var x = document.searchCatalogForm.search.value;
	document.getElementById('errmsg').innerHTML="";
	if (x == null || x == "") {
		document.getElementById('errmsg').innerHTML="Empty search bar";
		return false;
	}
	else {
		return true; 
	}
}

function alterLikes(x, y, z, a) {
	var xmlhttp;
	var iditem = "item"+y;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById(iditem).innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","likes.php?id_user="+x+"&id_prod="+y+"&liked="+z+"&purch="+a, true);
	xmlhttp.send();
}