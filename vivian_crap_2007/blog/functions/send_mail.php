<?php

$action = "";
if (isset($_POST['validate'])) {
	$action = $_POST['validate'];
}
if (isset($_POST['submit'])) {
	$action = $_POST['submit'];
}
if (isset($_POST['clear'])) {
	$action = $_POST['clear'];
}


if ($action == "submit") {
	include_once("validate_contact_form.php");
	include_once(submitContactForm());
} else if ($action == "clear") {
	include_once("init_contact_form.php");
	include_once("contact_form.php");
} else if ($action == "ajax") {
	include_once("validate_contact_form.php");
	$fieldID = $_POST['fieldID'];
	$inputValue = $_POST['inputValue'];
	list($inputStyle, $requiredMsg) = validateContactForm($fieldID, $inputValue);
	$requiredName = explode("_", $fieldID);
	if (count($requiredName) > 1) {
		$requiredID = $requiredName[1] . "Required";
	} else {
		$requiredID = $requiredName[0] . "Required";
	}
	$response = 
	  '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' .
	  '<response>' .
			'<field fieldID="' . $fieldID . '" inputStyle="' . $inputStyle . '" inputValue="' . $inputValue . '" />' .
			'<required requiredID="' . $requiredID . '" requiredMsg="' . $requiredMsg . '" />' .
	  '</response>'; 
	header('Content-Type: text/xml');
	echo $response;
} else {
	include_once("init_contact_form.php");
	include_once("contact_form.php");
}

?>