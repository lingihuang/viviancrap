/*****************************************************************************************
Contact Form
*****************************************************************************************/
function clearContactForm() {
	var theForm = document.getElementById("contactForm");
	var total = theForm.length;
	for (i=0; i<total; i++) {
		theForm.elements[i].value = "";
	}
}
/****************************************************************************************/


/*****************************************************************************************
Allow Message 1,000 Characters Only
*****************************************************************************************/
function textLimit() {
	var theMessage = document.getElementById("contactForm").message;
	if (theMessage.value.length > 1000) {
		theMessage.value = theMessage.value.substring(0, 1000);
	}
}
/****************************************************************************************/