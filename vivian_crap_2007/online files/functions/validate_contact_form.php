<?php

$msg = "";

/***************************************************************************************************
Submit Contact Form
***************************************************************************************************/
function submitContactForm() {
	global $msg;
	$userName = $_POST['user_name'];
	$email = $_POST['email'];
	$url = $_POST['url'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	include_once("init_contact_form.php");
	list($_SESSION['styles']['user_name'], $_SESSION['required']['user_name']) = validateUserName($userName);
	list($_SESSION['styles']['email'], $_SESSION['required']['email']) = validateEmail($email);
	list($_SESSION['styles']['subject'], $_SESSION['required']['subject']) = validateSubject($subject);
	list($_SESSION['styles']['message'], $_SESSION['required']['message']) = validateMessage($message);
	if ($_SESSION['styles']['user_name'] != "errorInput" && $_SESSION['styles']['email'] != "errorInput" && $_SESSION['styles']['url'] != "errorInput" && $_SESSION['styles']['message'] != "errorInput") {
		$to = "lingihuang@hotmail.com";
		$message = "Name: $userName\r\n\nE-mail: $email\r\n\nURL: $url\r\n\nSubject: $subject\r\n\nMessage: $message";
		$subject = "You have an email from $userName.";
		$headers = "From: $email\r\nReply-To: $email\r\n";
		if (mail($to, $subject, $message, $headers)) {
			$msg = "Thanks for your e-mail. I will reply you as soon as possible.";
		} else {
			$msg = "Your mail could not be sent. Please try it later.";
		}
		session_destroy();
		return "contact_form_reply.php";
	} else {
		$_SESSION['values']['user_name'] = $userName;
		$_SESSION['values']['email'] = $email;
		$_SESSION['values']['url'] = $url;
		$_SESSION['values']['subject'] = $subject;
		$_SESSION['values']['message'] = $message;
		session_destroy();
		return "contact_form.php";
	}
}
/**************************************************************************************************/


/***************************************************************************************************
AJAX
***************************************************************************************************/
function validateContactForm($fieldID, $inputValue) {
	$requiredArray = array();
	switch ($fieldID) {
		case "user_name":
			$requiredArray = validateUserName($inputValue);
			break;
		case "email":
			$requiredArray = validateEmail($inputValue);
			break;
		case "subject":
			$requiredArray = validateSubject($inputValue);
			break;
		case "message":
			$requiredArray = validateMessage($inputValue);
			break;
	}
	return $requiredArray;
}
/**************************************************************************************************/


/***************************************************************************************************
Validate Contact Form
***************************************************************************************************/
function validateUserName($inputValue) {
	$requiredArray = array();
	if ($inputValue != "") {
		$inputStyle = "inputField";
		$requiredMsg = "";
	} else {
		$inputStyle = "errorInput";
		$requiredMsg = "please enter your name";
	}
	array_push($requiredArray, $inputStyle, $requiredMsg);
	return $requiredArray;
}

function validateEmail($inputValue) {
	$requiredArray = array();
	if ($inputValue != "") {
		if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $inputValue)) {
			$inputStyle = "errorInput";
			$requiredMsg = "please enter a valid email";
		} else {
			$inputStyle = "inputField";
			$requiredMsg = "";
		}
	} else {
		$inputStyle = "errorInput";
		$requiredMsg = "please enter your email";
	}
	array_push($requiredArray, $inputStyle, $requiredMsg);
	return $requiredArray;
}

function validateSubject($inputValue) {
	$requiredArray = array();
	if ($inputValue != "") {
		$inputStyle = "inputField";
		$requiredMsg = "";
	} else {
		$inputStyle = "errorInput";
		$requiredMsg = "please enter your subject";
	}
	array_push($requiredArray, $inputStyle, $requiredMsg);
	return $requiredArray;
}

function validateMessage($inputValue) {
	$requiredArray = array();
	if ($inputValue != "") {
		$inputStyle = "inputField";
		$requiredMsg = "";
	} else {
		$inputStyle = "errorInput";
		$requiredMsg = "please enter your message";
	}
	array_push($requiredArray, $inputStyle, $requiredMsg);
	return $requiredArray;
}
/**************************************************************************************************/

?>