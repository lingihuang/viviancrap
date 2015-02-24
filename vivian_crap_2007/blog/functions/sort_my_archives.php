<?php

include_once("includes/dbconnect.php");

$archiveSql = "SELECT * FROM archives";
$archiveQuery = mysql_query($archiveSql);

$myArchives = '';

if ($archiveQuery) {
	while ($archiveRow = mysql_fetch_array($archiveQuery)) {
		$archiveID = $archiveRow['archive_id'];
		$archiveHeading = $archiveRow['archive_heading'];
		$archiveImageURL = "images/" . $archiveRow['archive_url'];
		list($archiveImageWidth, $archiveImageHeight) = getimagesize($archiveImageURL);
		$topLeftURL = "images/" . $archiveRow['top_left_url'];
		list($topLeftWidth, $topLeftHeight) = getimagesize($topLeftURL);
		$topOutURL = "images/" . $archiveRow['top_out_url'];
		$topOverURL = "images/" . $archiveRow['top_over_url'];
		list($topOutWidth, $topOutHeight) = getimagesize($topOutURL);
		$myArchives .= '<table id="' . $archiveHeading . '" class="listTable" border="0" cellpadding="0" cellspacing="0">';
		$myArchives .= '<tr><td><img src="' . $archiveImageURL . '" width="' . $archiveImageWidth . '" height="' . $archiveImageHeight . '" /></td></tr>';
		$tutorialSql = "SELECT * FROM tutorials WHERE archive_id ='$archiveID'";
		$tutorialQuery = mysql_query($tutorialSql);
		if ($tutorialQuery) {
			$tutorialCount = 0;
			while ($tutorialRow = mysql_fetch_array($tutorialQuery)) {
				$tutorialCount++;
				$tutorialImageURL = "images/" . $tutorialRow['tutorial_image_url'];
				list($tutorialImageWidth, $tutorialImageHeight) = getimagesize($tutorialImageURL);
				$tutorialURL = $tutorialRow['tutorial_url'];
				$tutorialDescription = $tutorialRow['tutorial_description'];
				$myArchives .= '<tr><td valign="top">';
				$myArchives .= '<div><img src="' . $tutorialImageURL . '" width="' . $$tutorialImageWidth . '" height="' . $$tutorialImageHeight . '" /></div>';
				$myArchives .= '<div id="listRow">';
				$myArchives .= '<div id="' . $archiveHeading . 'ContentLeft_' . $tutorialCount . '"></div>';
				$myArchives .= '<div id="' . $archiveHeading . 'ContentBg_' . $tutorialCount . '" class="contentTexts">' . $tutorialDescription . '</div>';
				$myArchives .= '<div id="' . $archiveHeading . 'Image_' . $tutorialCount . '"></div>';
				$myArchives .= '</div>';
				$myArchives .= '<div id="listRow">';
				$myArchives .= '<div id="' . $archiveHeading . 'LaunchLeft_' . $tutorialCount . '"></div>';
				$myArchives .= '<div id="' . $archiveHeading . 'LaunchBg_' . $tutorialCount . '"><a class="label" href="' . $tutorialURL . '" target="_blank">Launch</a></div>';
				$myArchives .= '</div>';
				$myArchives .= '</td></tr>';
			}
		}
		$myArchives .= '<tr><td>';
		$myArchives .= '<div id="listRow">';
		$myArchives .= '<img class="topLeft" src="' . $topLeftURL . '" width="'. $topLeftWidth . '" height="' . $topLeftHeight . '" />';
		$myArchives .= '<a href="#subLink"><img class="topColumn" src="' . $topOutURL . '" srcover="' . $topOverURL . '" width="' . $topOutWidth . '" height="' . $topOutHeight . '" /></a>';
		$myArchives .= '</div>';
		$myArchives .= '</td></tr>';
		$myArchives .= '</table>';
	}
}



?>