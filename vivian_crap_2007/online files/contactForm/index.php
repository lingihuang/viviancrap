<?php

$page = $_GET['page'];

$style = '';
$script = '';
$scriptLoaded = '';
$fileURL = "http://www.lingihuang.com/selfbrander/index.html";

if ($page == "") {
	$page = "home";
}

switch ($page) {
	case "my_personals":
		$style = '
			<link type="text/css" href="css/contact_info_style.css" rel="stylesheet" media="screen" />
			<link type="text/css" href="css/sub_link_style.css" rel="stylesheet" media="screen" />';
		break;
	case "my_works":
		$script = '
			<script type="text/javascript" src="javascript/preload_thumbnails.js"></script>';
		$scriptLoaded = ' onload="preloadThumbnails()"';
		break;
	case "my_archives":
		$style = '
			<link type="text/css" href="css/sub_link_style.css" rel="stylesheet" media="screen" />';
		break;
	case "my_photos":
		$style = '
			<script type="text/javascript" src="javascript/flash_player_detection.js"></script>';
		break;
	case "my_contacts":
		$style = '
			<link type="text/css" href="css/contact_info_style.css" rel="stylesheet" media="screen" />';
		$script = '
			<script type="text/javascript" src="javascript/contact_form.js"></script>';
		break;
}

include_once("includes/global_navi.php");

if ($page != "my_contacts") {
	include_once("includes/left_menu.php");
}

$pageURL = "pages/" . $page . ".php";
$pageHandle = fopen($pageURL, "r");
include_once($pageURL);
fclose($pageHandle);

include_once("includes/footer.php");
include_once("includes/main_template.php");


?>