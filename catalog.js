function validateForm() {
	var x = document.searchCatalogForm.search.value;
	var y = document.searchCatalogForm.search_button[0];
	var z = document.searchCatalogForm.search_button[1];
	if (x == null || x == "") {
		alert("Search Bar is Empty");
		return false;
	} else if (!y.checked && !z.checked){
		alert("Choose search method");
		return false;
	}
	else {
		return true; 
	}
}
