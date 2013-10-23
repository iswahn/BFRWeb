<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/navigation_styles.css">
<link rel="stylesheet" type="text/css" href="css/home_styles.css">
<?php $page="Thank You"?>
<title>Brown Family Realty - <?php echo $page?></title>
</head>
<body>
	<?php include 'header.php'; ?>
	<?php include 'navigation.php'; ?>
	<div id="content">
		<div id="sub_content">
		<?php
			if(isset($_POST['email'])) {
				$email_to = "ianswahn@gmail.com";
				$email_subject = "testing";
				 
				$name = $_POST['name'];
				$email = $_POST['email'];
				$address = $_POST['address']; 
				$city = $_POST['city']; 
				$state = $_POST['state']; 
				$zip = $_POST['zip'];
				$phone = $_POST['phone'];
				
				$location = $_POST['location'];
				$min = $_POST['min_range'];
				$max = $_POST['max_range'];
				$rooms = $_POST['rooms'];
				$bedrooms = $_POST['bedrooms'];
				$bathrooms = $_POST['bathrooms'];
				$acreage = $_POST['acreage'];
				$style = $_POST['style'];
				$comments = $_POST['comments'];				
				
				 
				$email_message = "Form details below.\n\n";
				 
				function clean_string($string) {
				  $bad = array("content-type","bcc:","to:","cc:","href");
				  return str_replace($bad,"",$string);
				}
				 
				$email_message .= "Name: ".clean_string($name)."\n";
				$email_message .= "Email: ".clean_string($email)."\n";
				$email_message .= "Current Address: ".clean_string($address)." ".clean_string($city).", ".clean_string($state)." ".clean_string($zip)."\n";
				$email_message .= "Telephone: ".clean_string($phone)."\n\n";
				$email_message .= "Looking for a place in: ".clean_string($location)."\n";
				$email_message .= "Between the prices of: ".clean_string($min)." and ".clean_string($max)."\n";
				$email_message .= "Number of rooms: ".clean_string($rooms)."\n";
				$email_message .= "Number of bedrooms: ".clean_string($bedrooms)."\n";
				$email_message .= "Number of bathrooms: ".clean_string($bathrooms)."\n";
				$email_message .= "Number of acres: ".clean_string($acres)."\n";
				$email_message .= "Style of house: ".clean_string($style)."\n";
				$email_message .= "User Comments: ".clean_string($comments)."\n";
				 
				 
				// create email headers
				$headers = 'From: '.$email_from."\r\n".
				'Reply-To: '.$email."\r\n" .
				'X-Mailer: PHP/' . phpversion();
				@mail($email_to, $email_subject, $email_message, $headers);
			}
			?>

			<h2>Thank you for your inquiry!</h2>

			<p>We will respond to your inquiry within 24 hours after we receive it if a response is required.</p>

			<p>Thank you for visiting Brown Family Realty.</p>

			<p>We look forward to meeting your real estate needs.</p>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>

</html>