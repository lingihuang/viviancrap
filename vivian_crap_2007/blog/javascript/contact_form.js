var xmlHttp;

/*****************************************************************************************
Submit Datas of Contact Form
*****************************************************************************************/
function createXmlHttpRequestObject(){
	var xmlHttp;
	try {
		// Firefox, Safari, and Opera
		xmlHttp = new XMLHttpRequest();
	} catch(e) {
		// IE
		var XmlHttpVersions = new Array("MSXML2.XMLHTTP.6.0", "MSXML2.XMLHTTP.5.0", "MSXML2.XMLHTTP.4.0",
															"MSXML2.XMLHTTP.3.0", "MSXML2.XMLHTTP", "Microsoft.XMLHTTP");
		for (var i=0; i<XmlHttpVersions.length; i++) {
			try {
				xmlHttp = new ActiveXObject(XmlHttpVersions[i]);
			} catch(e) {
				
			}
		}
	}
	if (xmlHttp) {
		return xmlHttp;
	} else {
		
	}
}

function sendRequest(fieldID, inputValue) {
	xmlHttp = createXmlHttpRequestObject();
	if (xmlHttp) {
		var url = "functions/send_mail.php";
		var contactDatas = "validate=ajax" + "&fieldID=" + fieldID + "&inputValue=" + inputValue;
		// Try to connect to the server.
		try {
			/*
			0: Uninitialized
			1: Loading
			2: Loaded
			3: Interactive
			4: Finished
			*/
			if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
				xmlHttp.open("POST", url, true);
				// Send the proper header information along with the request.
				xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlHttp.onreadystatechange = handleRequestStateChange;
				xmlHttp.send(contactDatas);
			}
		// Display the error when failing to connect to the server.
		} catch(e) {
			
		}
	}
}

function handleRequestStateChange() {
	// Connection to the server has been completed.
	if (xmlHttp.readyState == 4) {
		// Successfully retrieve the datas from the server.
		if (xmlHttp.status == 200) {
			try {
				readResponse();
			} catch(e) {
				
			}
		} else {
			
		}
	}
}

function readResponse() {
	var response = xmlHttp.responseText;
  	if (response.indexOf("ERRNO") >= 0 
      || response.indexOf("error:") >= 0
      || response.length == 0)
    throw(response.length == 0 ? "Server error." : response);
	var responseXml = xmlHttp.responseXML;
	var xmlDocument = responseXml.documentElement;
	var fieldID = xmlDocument.getElementsByTagName("field")[0].getAttribute("fieldID");
	var inputStyle = xmlDocument.getElementsByTagName("field")[0].getAttribute("inputStyle");
	var inputValue = xmlDocument.getElementsByTagName("field")[0].getAttribute("inputValue");
	var requiredID = xmlDocument.getElementsByTagName("required")[0].getAttribute("requiredID");
	var requiredMsg = xmlDocument.getElementsByTagName("required")[0].getAttribute("requiredMsg");
	var theForm = document.getElementById("contactForm");
	theForm[fieldID].value = inputValue;
	theForm[fieldID].className = inputStyle;
	var requiredField = document.getElementById(requiredID);
	requiredField.innerHTML = requiredMsg;
}
/****************************************************************************************/


/*****************************************************************************************
Set Focus
*****************************************************************************************/
function placeFocus() {
	var theForm = document.getElementById("contactForm");
	theForm.user_name.focus();
}
/****************************************************************************************/


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

