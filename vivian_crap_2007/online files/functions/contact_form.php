<?php

$menuBottom = '';
$contactForm = '';
$bottom = '';
$rightBar = '';

$menuBottom = '<img src="images/contacts_images/latest_bottom_1.jpg" width="256" height="466" />';
$contactForm = '
					<!-- Contact Form -->
					<form id="contactForm" action="index.php?page=my_contacts" method="POST">
						<div><img src="images/contacts_images/contact_form_heading.jpg" width="433" height="35" /></div>
						<!-- Your Name -->
						<div><img src="images/contacts_images/name_label_1.jpg" width="433" height="23" /></div>
						<div id="formRow">
							<div id="nameLabel"></div>
							<div id="nameRequired" class="requiredTexts">' . $_SESSION['required']['user_name'] . '</div>
						</div>
						<div id="formRow">
							<div id="nameFieldLeft"></div>
							<div id="nameField"><input class="' . $_SESSION['styles']['user_name'] . '" type="text" name="user_name" size="50" maxlength="50" onblur="sendRequest(this.name, this.value)" value="' . $_SESSION['values']['user_name'] . '" /></div>
						</div>
						<!-- Your Email -->
						<div><img src="images/contacts_images/email_label_1.jpg" width="433" height="23" /></div>
						<div id="formRow">
							<div id="emailLabel"></div>
							<div id="emailRequired" class="requiredTexts">' . $_SESSION['required']['email'] . '</div>
						</div>
						<div id="formRow">
							<div id="emailFieldLeft"></div>
							<div id="emailField"><input class="' . $_SESSION['styles']['email'] . '" type="text" name="email" size="50" maxlength="50" onblur="sendRequest(this.name, this.value)" value="' . $_SESSION['values']['email'] . '" /></div>
						</div>
						<!-- Your URL -->
						<div><img src="images/contacts_images/url_label.jpg" width="433" height="41" /></div>
						<div id="formRow">
							<div id="urlFieldLeft"></div>
							<div id="urlField"><input class="' . $_SESSION['styles']['url'] . '" type="text" name="url" size="50" maxlength="50" value="' . $_SESSION['values']['url'] . '" /></div>
						</div>
						<!-- Your Subject -->
						<div><img src="images/contacts_images/subject_label_1.jpg" width="433" height="23" /></div>
						<div id="formRow">
							<div id="subjectLabel"></div>
							<div id="subjectRequired" class="requiredTexts">' . $_SESSION['required']['subject'] . '</div>
						</div>
						<div id="formRow">
							<div id="subjectFieldLeft"></div>
							<div id="subjectField"><input class="' . $_SESSION['styles']['subject'] . '" type="text" name="subject" size="50" maxlength="50" onblur="sendRequest(this.name, this.value)" value="' . $_SESSION['values']['subject'] . '" /></div>
						</div>
						<!-- Your Message -->
						<div><img src="images/contacts_images/message_label_1.jpg" width="433" height="23" /></div>
						<div id="formRow">
							<div id="messageLabel"></div>
							<div id="messageRequired" class="requiredTexts">' . $_SESSION['required']['message'] . '</div>
						</div>
						<div id="formRow">
							<div id="messageFieldLeft"></div>
							<div id="messageField"><textarea class="' . $_SESSION['styles']['message'] . '" name="message" cols="49" rows="9" wrap="virtual" onblur="sendRequest(this.name, this.value)" onkeyup="textLimit();">' . $_SESSION['values']['message'] . '</textarea></div>
						</div>
						<!-- Submit/Clear Buttons -->
						<div id="formRow">
							<input type="image" value="submit" class="buttonItem" name="submit" src="images/contacts_images/submit_out.jpg" srcover="images/contacts_images/submit_over.jpg" width="101" height="46" />
							<input type="image" value="clear" class="buttonItem" name="clear" src="images/contacts_images/clear_out.jpg" srcover="images/contacts_images/clear_over.jpg" width="103" height="46" />
							<img class="buttonItem" src="images/contacts_images/button_right.jpg" width="229" height="46" />
						</div>
					</form>';
					
$bottom = '<img src="images/contacts_images/bottom_1.jpg" width="433" height="38" />';
$rightBar = '<img id="rightBar" src="images/contacts_images/right_bar_1.jpg" width="18" height="890" />';

?>