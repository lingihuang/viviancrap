<?php

$leftMenu = '';
$menuBottom = '';

if ($page == "home") {
	$menuBottom = '<img src="images/home_images/latest_bottom.jpg" width="256" height="18" />';
} else if ($page == "my_personals") {
	$menuBottom = '<img src="images/personals_images/latest_bottom.jpg" width="256" height="502" />';
} else if ($page == "my_works") {
	$menuBottom = '<img src="images/works_images/latest_bottom.jpg" width="256" height="449" />';
} else if ($page == "my_archives") {
	$menuBottom = '<img src="images/archives_images/latest_bottom.jpg" width="256" height="2081" />';
} else if ($page == "my_photos") {
	$menuBottom = '<img src="images/photos_images/latest_bottom.jpg" width="256" height="562" />';
}

$leftMenu = '
	<!-- Left Menu: Latest Work -->
	<table id="leftMenuTable" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2"><img src="images/latest_work_images/latest_heading.jpg" width="256" height="207" /></td>
		</tr>
		<tr>
			<td><img src="images/latest_work_images/launch_left.jpg" width="171" height="19" /></td>
			<td><a href="' . $fileURL . '" target="_blank"><img name="launch" src="images/latest_work_images/launch_out.jpg" srcover="images/latest_work_images/launch_over.jpg" width="85" height="19" /></a></td>
		</tr>
		<tr>
			<td colspan="2"><img src="images/latest_work_images/latest_image.jpg" width="256" height="125" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="detailLeft"></div>
				<div id="detailLabel" class="detailMiddle_1">Purpose:<br />Skills:<br /><br /><br />Date:</div>
				<div id="detailTexts" class="detailMiddle_2">
					Thesis Project<br />Adobe Photoshop, Action Script, Fuse Kit, XML, PHP, MySQL<br />Fall 2005 - Fall 2006
				</div>
				<div class="detailRight"></div>
			</td>
		</tr>
		<tr>
			<td colspan="2">' . $menuBottom . '</td>
		</tr>
	</table>';


?>