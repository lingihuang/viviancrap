var requiredMajorVersion = 8;
var requiredMinorVersion = 0;
var requiredRevision = 0;

var isIE  = (navigator.appVersion.indexOf("MSIE") != -1) ? true : false;
var isWin = (navigator.appVersion.toLowerCase().indexOf("win") != -1) ? true : false;
var isOpera = (navigator.userAgent.indexOf("Opera") != -1) ? true : false;


/*****************************************************************************************
Assign Flash Player Version
*****************************************************************************************/
function assignSWFVersion() {
	var version;
	var flashObject;
	var e;
	try {
		flashObject = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");
		version = flashObject.GetVariable("$version");
	} catch (e) {
	}
	if (!version) {
		try {
			flashObject = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");
			version = "WIN 6,0,21,0";
			flashObject.AllowScriptAccess = "always";
			version = flashObject.GetVariable("$version");
		} catch (e) {
		}
	}
	if (!version) {
		try {
			// version will be set for 4.X or 5.X player
			flashObject = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.3");
			version = flashObject.GetVariable("$version");
		} catch (e) {
		}
	}
	if (!version) {
		try {
			flashObject = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.3");
			version = "WIN 3,0,18,0";
		} catch (e) {
		}
	}
	if (!version) {
		try {
			flashObject = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
			version = "WIN 2,0,0,11";
		} catch (e) {
			version = -1;
		}
	}
	return version;
}
/****************************************************************************************/


/*****************************************************************************************
Get Flash Version
Detect if the browser has installed the flash player.
*****************************************************************************************/
function getFlashVersion() {
	var flashVersion = -1;
	if (navigator.plugins != null && navigator.plugins.length > 0) {  // Browser has been installed flash player.
		if (navigator.plugins["Shockwave Flash 2.0"] || navigator.plugins["Shockwave Flash"]) {
			var swfVersion = navigator.plugins["Shockwave Flash 2.0"] ? " 2.0" : "";
			var flashDescription = navigator.plugins["Shockwave Flash" + swfVersion].description;	
			var descriptionArray = flashDescription.split(" ");
			var tempArrayMajor = descriptionArray[2].split(".");
			var versionMajor = tempArrayMajor[0];
			var versionMinor = tempArrayMajor[1];
			if (descriptionArray[3] != "") {
				tempArrayMinor = descriptionArray[3].split("r");
			} else {
				tempArrayMinor = descriptionArray[4].split("r");
			}
			var versionRevision = tempArrayMinor[1] > 0 ? tempArrayMinor[1] : 0;
			var flashVersion = versionMajor + "." + versionMinor + "." + versionRevision;
		}
	} else if (isIE && isWin && !isOpera) {  // Browser is IE on Windows. navigator.plugins is always empty on IE.
		flashVersion = assignSWFVersion();
	}
	return flashVersion;
}
/****************************************************************************************/


/*****************************************************************************************
Detect Flash Player Version
*****************************************************************************************/
function detectFlashVersion() {
	var versionMajor;
	var versionMinor;
	var versionRevision;
	var flashVersion = getFlashVersion();
	if (flashVersion == -1) {
		return false;
	} else {
		if (isIE && isWin && !isOpera) {
			tempArray = flashVersion.split(" ");
			tempString = tempArray[1];
			versionArray = tempString.split(",");
		} else {
			versionArray = flashVersion.split(".");
		}
		versionMajor = versionArray[0];
		versionMinor = versionArray[1];
		versionRevision = versionArray[2];
	}
	if (versionMajor > parseFloat(requiredMajorVersion)) {
		return true;
	} else if (versionMajor == parseFloat(requiredMajorVersion)) {
		if (versionMinor > parseFloat(requiredMinorVersion)) {
			return true;
		} else if (versionMinor == parseFloat(requiredMinorVersion)) {
			if (versionRevision >= parseFloat(requiredRevision)) {
				return true;
			}
		}
	} else {
		return false;
	}
}
/****************************************************************************************/

/*****************************************************************************************
Generate Flash Player Object
*****************************************************************************************/
function generateFlashObject() {
	var flashObject = getArguments(arguments);
	var flashOutput = writeFlashObject(flashObject.objAttrs, flashObject.params, flashObject.embedAttrs);
	var output = '';
	output = '<tr><td id="myPhotosBg" valign="top">' + flashOutput + '</td></tr>';
	document.write(output);
}

function writeFlashObject(objAttrs, params, embedAttrs) { 
    var flashOutput = '';
    if (isIE && isWin && !isOpera) {  // Generate Flash Object for IE
  		flashOutput += '<object ';
  		for (var i in objAttrs) {
  			flashOutput += i + '="' + objAttrs[i] + '" ';
		}
		flashOutput += '>';
  		for (var i in params) {
  			flashOutput += '<param name="' + i + '" value="' + params[i] + '" /> ';
		}
  		flashOutput += '</object>';
    } else {
  		flashOutput += '<embed ';
  		for (var i in embedAttrs) {
  			flashOutput += i + '="' + embedAttrs[i] + '" ';
		}
  		flashOutput += '></embed>';
    }
	return flashOutput;
}

function getExtension(src, extention) {
  if (src.indexOf('?') != -1)
    return src.replace(/\?/, extention+'?'); 
  else
    return src + extention;
}

function getArguments(args) {
	var flashObject = new Object();
	flashObject.embedAttrs = new Object();
  	flashObject.params = new Object();
 	flashObject.objAttrs = new Object();
	var extention = ".swf";
	var total = args.length;
	for (var i=0; i<total; i+=2) {
		switch (args[i]) {
		  	case "src":
				args[i+1] = getExtension(args[i+1], extention);
				flashObject.embedAttrs["src"] = args[i+1];
				flashObject.params["movie"] = args[i+1];
				break;
		  	case "id":
				flashObject.objAttrs[args[i]] = args[i+1];
				break;
		  	case "width":
				flashObject.embedAttrs[args[i]] = args[i+1];
				flashObject.objAttrs[args[i]] = args[i+1];
				break;
		  	case "height":
				flashObject.embedAttrs[args[i]] = args[i+1];
				flashObject.objAttrs[args[i]] = args[i+1];
				break;
		  	case "align":
				flashObject.embedAttrs[args[i]] = args[i+1];
				flashObject.objAttrs[args[i]] = args[i+1];
				break;
			case "quality":
				flashObject.embedAttrs[args[i]] = args[i+1];
				flashObject.params[args[i]] = args[i+1];
				break;
			case "wmode":
				flashObject.embedAttrs[args[i]] = args[i+1];
				flashObject.params[args[i]] = args[i+1];
				break;
			case "bgcolor":
				flashObject.embedAttrs[args[i]] = args[i+1];
				flashObject.params[args[i]] = args[i+1];
				break;
		  	case "name":
				flashObject.embedAttrs[args[i]] = args[i+1];
				break;
			case "allowScriptAccess":
				flashObject.embedAttrs[args[i]] = args[i+1];
				flashObject.params[args[i]] = args[i+1];
				break;
			case "classid":
				flashObject.objAttrs[args[i]] = args[i+1];
				break;
			case "codebase":
				flashObject.objAttrs[args[i]] = args[i+1];
				break;
			case "type":
				flashObject.embedAttrs[args[i]] = args[i+1];
				break;
			case "pluginspage":
				flashObject.embedAttrs[args[i]] = args[i+1];
				break;
		}
	}
  	return flashObject;
}
/****************************************************************************************/


/*****************************************************************************************
Generate Error
*****************************************************************************************/
function writeError() {
	var output = '';
	output += '<tr><td><div id="errorReply">';
	output += '<div><img src="images/photos_images/error_heading.jpg" width="433" height="55" /></div>';
	output += '<div id="errorRow">';
	output += '<div id="errorLeft"></div>';
	output += '<div id="errorBg" class="errorTexts">If you want to view my photos, you&acute;ll need Macromedia Flash Player 8.0 or later. Please install it <a style="font-size: 10px; font-weight: normal; color: #aeb5b7;" href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" target="_blank">here</a>.</div>';
	output += '</div>';
	output += '<div><img src="images/photos_images/error_bottom.jpg" width="433" height="38" /></div>';
	output += '</div></td></tr>';
	output += '<tr><td><img src="images/photos_images/bottom_2.jpg" width="433" height="562" /></td></tr>';
	document.write(output);
}
/****************************************************************************************/