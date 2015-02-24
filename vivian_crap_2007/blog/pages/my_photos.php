<?php

$contents = '

	<!-- Contents: My Photos -->
	<table id="contentTable" border="0" cellpadding="0" cellspacing="0">
		<!-- My Photos Overview -->
		<tr>
			<td><img src="images/photos_images/photos_heading.jpg" width="433" height="58" /></td>
		</tr>
		<tr>
			<td id="photosRow" valign="top">
				<div class="texts">In this section, I gather some photos of mine and most photos of my nieces. After I came to USA, I missed them so much that I browseed their photos all the time. I bet they must be happy to see their photos in my site, too. Another, I appreciate my younger sister always spent lots of time to send me my nieces&acute; photos.</div>
				<div class="texts">Please select any album to view my photos. If you don&acute;t see my photos below, please install Flash Player <a style="font-size: 10px; font-weight: normal; color: #800400;" href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" target="_blank">here</a>. If you see any errors or bugs, please <a style="font-size: 10px; font-weight: normal; color: #800400;" href="index.php?page=my_contacts">contact me</a>.</div>
				<div class="texts">ps. To three of my nieces,<br />I still keep the drawings you drew to me, I&acute;ll scan and put them here later, too.</div>
			</td>
		</tr>' .
		'<script language="JavaScript" type="text/javascript">
			var isRequestedVersion = detectFlashVersion();
			if (isRequestedVersion) {
				generateFlashObject(
							"src", "pages/my_photos",
							"width", "433",
							"height", "688",
							"align", "middle",
							"id", "my_photos",
							"quality", "high",
							"wmode", "transparent",
							"bgcolor", "#ffffff",
							"name", "my_photos",
							"allowScriptAccess","sameDomain",
							"classid", "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000",
							"codebase", "http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0",
							"type", "application/x-shockwave-flash",
							"pluginspage", "http://www.macromedia.com/go/getflashplayer");
			} else {
				writeError();		
			}
		</script>' .
	'</table>
	<!-- Right Bar Image -->
	<img id="rightBar" src="images/photos_images/right_bar.jpg" width="18" height="986" />';
	

?>