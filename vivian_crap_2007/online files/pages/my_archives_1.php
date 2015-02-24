<?php

include_once("functions/sort_my_archives.php");

$contents = '

	<!-- Contents:  My Archives -->
	<table id="contentTable" border="0" cellpadding="0" cellspacing="0">
		<!-- My Archives Overview -->
		<tr>
			<td><img id="headingRow" src="images/archives_images/archives_heading.jpg" width="433" height="58" /></td>
		</tr>
		<tr>
			<td id="archivesRow" valign="top">
				<div class="texts">According to the needs of my work, I leave this section to collect some sites of the tutorials I browsed often, such as action scripting, css, javascript, php, photoshop etc.</div>
				<div class="texts">Besides, I collect some sites of the recipes here, too. Cooking and reading recipes are the only leisure of mine right now so that I would like to share this with all of my friends who also love cooking and welcome to email me any great sites of the recipes.</div>
			</td>
		</tr>
		<tr>
			<td>
				<!-- Sub Links -->
				<div id="subLink">
					<ul>
						<li class="leftLink_2"></li>
						<li class="flashLink"><a class="label" href="#flash">Flash Tutorials</a></li>
						<li class="photoshopLink"><a class="label" href="#photoshop">Photoshop Tutorials</a></li>
						<li class="webLink"><a class="label" href="#web">Web Tutorials</a></li>
						<li class="recipesLink"><a class="label" href="#recipes">Recipes</a></li>
					</ul>
				</div>'
				. $myArchives .
			'</td>
		</tr>
		<tr>
			<td><img src="images/archives_images/bottom.jpg" width="433" height="48" /></td>
		</tr>
	</table>
	<!-- Right Bar Image -->
	<img id="rightBar" src="images/archives_images/right_bar.jpg" width="18" height="2505" />';
	

?>