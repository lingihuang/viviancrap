<?php

session_start();

if (!isset($_SESSION['values'])) {
	$_SESSION['values']['user_name'] = "";
	$_SESSION['values']['email'] = "";
	$_SESSION['values']['url'] = "";
	$_SESSION['values']['subject'] = "";
	$_SESSION['values']['message'] = "";
}

if (!isset($_SESSION['styles'])) {
	$_SESSION['styles']['user_name'] = "inputField";
	$_SESSION['styles']['email'] = "inputField";
	$_SESSION['styles']['url'] = "inputField";
	$_SESSION['styles']['subject'] = "inputField";
	$_SESSION['styles']['message'] = "inputField";
}

if (!isset($_SESSION['required'])) {
	$_SESSION['required']['user_name'] = "required";
	$_SESSION['required']['email'] = "required";
	$_SESSION['required']['subject'] = "required";
	$_SESSION['required']['message'] = "allow 1,000 characters only";
}

?>

