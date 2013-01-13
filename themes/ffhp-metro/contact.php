<?php
/*
Template Name: Contact
*/
?>

<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['name']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['name']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nE-Mail: $email \n\nTelefon: $tel \n\nAnliegen: $anliegen";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>


<form  id="contactForm" method="post">
	Name*: <input type="text" name="name"><br>
	E-Mail*: <input type="text" name="email" value="ihre@email.hier" onblur="if(this.value.length == 0) this.value='ihre@email.hier';" onclick="if(this.value == 'ihre@email.hier') this.value='';"><br>
	Telefon: <input type="text" name="telefon"><br>
	Ihr Anliegen:<br>
	<textarea name="anliegen" rows="3"></textarea><br>
	<input type="submit" value="Absenden">
	<input type="hidden" name="submitted" id="submitted" value="true" />
</form>