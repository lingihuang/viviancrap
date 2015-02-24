<?php

include_once("../includes/dbconnect.php");

$albumID = $_POST['albumID'];

$sql = "SELECT * FROM photos WHERE album_id = '$albumID'";
$query = mysql_query($sql);


$photoXML ="<?xml version=\'1.0\'?>\r\n";
$photoXML .="<my_photos>\n";
if ($query) {
	while($photoRow = mysql_fetch_array($query)) {
		$photoXML .="<photo photo_id='{$photoRow['photo_id']}' photo_caption='{$photoRow['photo_caption']}' photo_width='{$photoRow['photo_width']}' photo_height='{$photoRow['photo_height']}' photo_url='{$photoRow['photo_url']}' />\n";
	}
}
$photoXML .="</my_photos>"; 
 
echo $photoXML;


?>
