<?php

$inputFields = array("user_name", "email", "url", "subject", "message");
$total = count($inputFields);
$inputValues = array();
$inputStyles = array();
$inputValids = array();
$errorMsgs = array("required", "required", "", "required", "allow 1,000 characters only");
$menuBottom = '';
$contactForm = '';
$bottom = '';
$rightBar = '';
$msg = '';

/**********************************************************************************************
Reset Contact Form
**********************************************************************************************/
function resetContactForm() {
	global $inputStyles;
	global $inputValids;
	global $errorMsgs;
	global $total;
	for ($i=0; $i<$total; $i++) {
		$inputStyles[$i] = "inputField";
		$inputValids[$i] = true;
		$errorMsgs[$i] = "";
	}
}
/*********************************************************************************************/

/**********************************************************************************************
Check Contact Form
**********************************************************************************************/
function checkContactForm() {
	global $inputValues;
	global $inputStyles;
	global $inputValids;
	global $errorMsgs;
	global $total;
	$allValid = true;
	resetContactForm();
	// Your Name
	if ($inputValues[0] != "") {
		$inputStyles[0] = "inputField";
		$inputValids[0] = true;
	} else {
		$inputStyles[0] = "errorInput";
		$inputValids[0] = false;
		$errorMsgs[0] = "please enter your name";
	}
	// Your Email
	if ($inputValues[1] != "") {
		if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $inputValues[1])) {
			$inputStyles[1] = "errorInput";
			$inputValids[1] = false;
			$errorMsgs[1] = "please enter a valid email";
		} else {
			$inputStyles[1] = "inputField";
			$inputValids[1] = true;
		}
	} else {
		$inputStyles[1] = "errorInput";
		$inputValids[1] = false;
		$errorMsgs[1] = "please enter your email";
	}
	// Your Subject
	if ($inputValues[3] != "") {
		$inputStyles[3] = "inputField";
		$inputValids[3] = true;
	} else {
		$inputStyles[3] = "errorInput";
		$inputValids[3] = false;
		$errorMsgs[3] = "please enter your subject";
	}
	// Your Message
	if ($inputValues[4] != "") {
		$entry = explode(" ", $inputValues[4]);
		if (count($entry) > 1000) {
			$inputStyles[4] = "errorInput";
			$inputValids[4] = false;
			$errorMsgs[4] = "1,000 characters limited";
		} else {
			$inputStyles[4] = "inputField";
			$inputValids[4] = true;
		}
	} else {
		$inputStyles[4] = "errorInput";
		$inputValids[4] = false;
		$errorMsgs[4] = "please enter your message";
	}
	for ($i=0; $i<$total; $i++) {
		if ($inputValids[$i] == false) {
			$allValid = false;
			break;
		}
	}
	return $allValid;
}
/*********************************************************************************************/

/**********************************************************************************************
Send Mail
**********************************************************************************************/
function sendMail() {
	global $inputValues;
	global $msg;
	$output = array();
	$allValid = checkContactForm();
	if ($allValid) {
		$to = "lingihuang@hotmail.com";
		$name = $inputValues[0];
		$email = $inputValues[1];
		$url = $inputValues[2];
		$subject = $inputValues[3];
		$message = $inputValues[4];
		$message = "Name: $name\r\n\nE-mail: $email\r\n\nURL: $url\r\n\nSubject: $subject\r\n\nMessage: $message";
		$subject = "You have an email from $name.";
		$headers = "From: $email\r\nReply-To: $email\r\n";
		if (mail($to, $subject, $message, $headers)) {
			$msg = "Thanks for your e-mail. I will reply you as soon as possible.";
		} else {
			$msg = "Your mail could not be sent. Please try it later.";
		}
		$output = writeReplyMessage();
	} else {
		$output = writeContactForm();
	}
	return $output;
}
/*********************************************************************************************/

/**********************************************************************************************
Write Contact Form
**********************************************************************************************/
function writeContactForm() {
	global $inputStyles;
	global $inputValues;
	global $errorMsgs;
	global $isDone;
	$menuBottom = '';
	$contactForm = '';
	$bottom = '';
	$rightBar = '';
	$output = array();
	$menuBottom = '<img src="images/contacts_images/latest_bottom_1.jpg" width="256" height="466" />';
	$contactForm = '
				<!-- Contact Form -->
				<form id="contactForm" onsubmit="" action="index.php?page=my_contacts" method="POST">
					<div><img src="images/contacts_images/contact_form_heading.jpg" width="433" height="35" /></div>
					<!-- Your Name -->
					<div><img src="images/contacts_images/name_label_1.jpg" width="433" height="23" /></div>
					<div id="formRow">
						<div id="nameLabel"></div>
						<div id="nameRequired" class="requiredTexts">' . $errorMsgs[0] . '</div>
					</div>
					<div id="formRow">
						<div id="nameFieldLeft"></div>
						<div id="nameField"><input class="' . $inputStyles[0] . '" type="text" name="user_name" size="50" maxlength="50" value="' . $inputValues[0] . '" /></div>
					</div>
					<!-- Your Email -->
					<div><img src="images/contacts_images/email_label_1.jpg" width="433" height="23" /></div>
					<div id="formRow">
						<div id="emailLabel"></div>
						<div id="emailRequired" class="requiredTexts">' . $errorMsgs[1] . '</div>
					</div>
					<div id="formRow">
						<div id="emailFieldLeft"></div>
						<div id="emailField"><input class="' . $inputStyles[1] . '" type="text" name="email" size="50" maxlength="50" value="' . $inputValues[1] . '" /></div>
					</div>
					<!-- Your URL -->
					<div><img src="images/contacts_images/url_label.jpg" width="433" height="41" /></div>
					<div id="formRow">
						<div id="urlFieldLeft"></div>
						<div id="urlField"><input class="' . $inputStyles[2] . '" type="text" name="url" size="50" maxlength="50" value="' . $inputValues[2] . '" /></div>
					</div>
					<!-- Your Subject -->
					<div><img src="images/contacts_images/subject_label_1.jpg" width="433" height="23" /></div>
					<div id="formRow">
						<div id="subjectLabel"></div>
						<div id="subjectRequired" class="requiredTexts">' . $errorMsgs[3] . '</div>
					</div>
					<div id="formRow">
						<div id="subjectFieldLeft"></div>
						<div id="subjectField"><input class="' . $inputStyles[3] . '" type="text" name="subject" size="50" maxlength="50" value="' . $inputValues[3] . '" /></div>
					</div>
					<!-- Your Message -->
					<div><img src="images/contacts_images/message_label_1.jpg" width="433" height="23" /></div>
					<div id="formRow">
						<div id="messageLabel"></div>
						<div id="messageRequired" class="requiredTexts">' . $errorMsgs[4] . '</div>
					</div>
					<div id="formRow">
						<div id="messageFieldLeft"></div>
						<div id="messageField"><textarea class="' . $inputStyles[4] . '" name="message" cols="49" rows="9" wrap="virtual" onkeyup="textLimit();">' . $inputValues[4] . '</textarea></div>
					</div>
					<!-- Submit/Clear Buttons -->
					<div id="formRow">
						<input type="hidden" name="action" value="submitted" />
						<input type="image" value="submit_button" class="buttonItem" name="submit" src="images/contacts_images/submit_out.jpg" srcover="images/contacts_images/submit_over.jpg" width="101" height="46" />
						<input type="image" value="clear_button" class="buttonItem" name="clear" src="images/contacts_images/clear_out.jpg" srcover="images/contacts_images/clear_over.jpg" width="103" height="46" onclick="clearContactForm()" />
						<img class="buttonItem" src="images/contacts_images/button_right.jpg" width="229" height="46" />
					</div>
				</form>';
	$bottom = '<img src="images/contacts_images/bottom_1.jpg" width="433" height="38" />';
	$rightBar = '<img id="rightBar" src="images/contacts_images/right_bar_1.jpg" width="18" height="890" />';
	array_push($output, $menuBottom, $contactForm, $bottom, $rightBar);
	return $output;
}
/*********************************************************************************************/

/**********************************************************************************************
Write Reply Message
**********************************************************************************************/
function writeReplyMessage() {
	global $msg;
	$menuBottom = '';
	$contactForm = '';
	$bottom = '';
	$rightBar = '';
	$output = array();
	$menuBottom = '<img src="images/contacts_images/latest_bottom_2.jpg" width="256" height="28" />';
	$contactForm = '
				<!-- Contact Reply -->
				<div id="contactReply">
					<div><img src="images/contacts_images/contact_form_heading.jpg" width="433" height="35" /></div>
					<div><img src="images/contacts_images/reply_top.jpg" width="433" height="10" /></div>
					<div id="replyRow">
						<div id="replyLeft"></div>
						<div id="replyBg" class="replyTexts">' . $msg . '</div>
					</div>
					<div><img src="images/contacts_images/reply_bottom.jpg" width="433" height="46" /></div>
				</div>';
	$bottom = '<img src="images/contacts_images/bottom_2.jpg" width="433" height="54" />';
	$rightBar = '<img id="rightBar" src="images/contacts_images/right_bar_2.jpg" width="18" height="452" />';
	array_push($output, $menuBottom, $contactForm, $bottom, $rightBar);
	return $output;
}
/*********************************************************************************************/

function resetInputValues() {
	global $inputValues;
	global $total;
	for ($i=0; $i<$total; $i++) {
		$inputValues[$i] = "";
	}
}

/**********************************************************************************************
Get Input Values Of Contact Form
**********************************************************************************************/
if ($_POST['action'] == 'submitted') {
	for ($i=0; $i<$total; $i++) {
		$input = $_POST[$inputFields[$i]];
		array_push($inputValues, $input);
	}
	list($menuBottom, $contactForm, $bottom, $rightBar) = sendMail();
} else {
	list($menuBottom, $contactForm, $bottom, $rightBar) = writeContactForm();
}
/*********************************************************************************************/


?>