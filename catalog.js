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