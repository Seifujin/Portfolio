<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form';
		$to = 'example@bootstrapbay.com';
		$subject = 'Message from Contact Demo ';

		$body = "From: $name\n E-Mail: $email\n Message:\n $message";

		// Vérifie si le nom à bien été taper
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}

		// Vérifie si le nom a bien été tapé et qu'il est validé
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}

		//Vérifie si le message a bien été tapé
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}

// Si il n'y a pas d'erreurs , envoyez le mail
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
	}
?>
