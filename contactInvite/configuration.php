<?php
	/* this is the main configuration file */
	
	/* PART 1 : OAUTH KEYS 
	 * For more info on how to get your keys please refer to the documentation */
	
	$yahoo_consumer_key = "";
	$yahoo_consumer_secret = "";
	
	$gmail_consumer_key = "";
	$gmail_consumer_secret = "";
	
	$live_consumer_key = "";
	$live_consumer_secret = "";
	
	/* PART 2 : You website info */
	
	$domain = "http://contactpreview.djpate.com"; // for example http://www.djpate.com
	$contactinvite_folder = "contactInvite"; // the directory where is installed contactinvite from your root for example contactinvite
	$website_name = "MyWebsite !";
	
	/* PART 3 : Emails infos 
	 * Most of those settings can be set dynamicly this is just the default values */
	
	$email_from_field = "noreply@yourwebsite.com"; // the from field for your invitation mails ( this field can be set on runtime using $mailer->setFrom() function )
	$email_subject = "Check this out !";  // the email subject
	$email_body = "I've just discovered this new website"; // the email content
?>
