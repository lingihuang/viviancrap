<?php

$leftMenu = '';

include_once("functions/contact_form.php");

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

$contents = <<< EOD
	<!-- Contents:  My Contacts -->
	<table id="contentTable" border="0" cellpadding="0" cellspacing="0">
		<!-- My Contacts Overview -->
		<tr>
			<td><img id="headingRow" src="images/contacts_images/contacts_heading.jpg" width="433" height="58" /></td>
		</tr>
		<tr>
			<td id="contactsRow" valign="top">
				<div class="texts">I would love to hear from you and welcome any inquires, comments, and feedbacks of yours with using the handy form below.</div>
			</td>
		</tr>
		<tr>
			<td>
				<!-- My Info -->
				<div id="personalsInfo">
					<div id="infoRow"><img src="images/contacts_images/info_heading.jpg" width="433" height="37" /></div>
					<div id="infoRow">
						<div class="infoLeft_2"></div>
						<div class="infoMiddle_3">Primary Line:<br />E-mail:<br />Address:<br /></div>
						<div class="infoMiddle_4">415.260.4610<br /><span class="infoHighlighted">lingihuang@hotmail.com</span><br />825 Post Street APT 411<br />San Francisco, CA 94109</div>
						<div class="infoRight_2"></div>
					</div>
				</div>
				$contactForm
			</td>
		</tr>
		<tr>
			<td>$bottom</td>
		</tr>
	</table>
	<!-- Right Bar Image -->
	$rightBar
EOD;

?>