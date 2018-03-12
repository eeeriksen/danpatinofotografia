<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8" />
	<title>Daniel Pati&ntilde;o</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,800|Philosopher:700" rel="stylesheet">
	<script src="assets/js/jquery.js"></script>
</head>
<body>

<?php
	// define variables and set to empty values
	$name_errorr = $email_errorr = $phone_errorr = "";
	$name = $email = $phone = $message = $success = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$name_errorr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$name_errorr = "Only letters and white space allowed";
			}
		}

		if (empty($_POST["email"])) {
			$email_errorr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$email_errorr = "Invalid email format";
			}
		}

		if (empty($_POST["phone"])) {
			$phone_errorr = "Phone is required";
		} else {
			$phone = test_input($_POST["phone"]);
			// check if e-mail address is well-formed
			//if (!preg_match("^[0-9+\(\)#\.\s\/ext-]+$",$phone)) {
			//	$phone_errorr = "Invalid phone number"; 
			//}
		}

		if (empty($_POST["message"])) {
			$message = "";
		} else {
			$message = test_input($_POST["message"]);
		}

		if ($name_errorr == '' and $email_errorr == '' and $phone_errorr  == '' ){
			$message_body = '';
			unset($_POST['submit']);
			foreach ($_POST as $key => $value){
				$message_body .=  "$key: $value\n";
			}
			
			$to = 'info@danpatinofotografia.com';
			$subject = 'Contact Form Submit';
			if (mail($to, $subject, $message_body)){
				$success = "Message sent, thank you for contacting us!";
				$name = $email = $phone = $message = '';
			}
		}
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
	<header id="all-header">
		<nav class="name">
			<a href="http://www.danpatinofotografia.com/">Dan Pati&ntilde;o</a>
		</nav>
		<label for="menu">
			<div class="bars">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>
		</label>
		<input type="checkbox" name="menu" id="menu">
		<nav class="menu">
			<a href="inizio.html">Inizio</a>
			<a href="portfolio.html">Portfolio</a>
			<a href="contatti.php">Contatti</a>
			<ul class="social">
				<li><!-- SVG Facebbok-->
					<svg class="icon-facebook" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="339px" height="340.422px" viewBox="-164 -1.028 339 340.422" enable-background="new -164 -1.028 339 340.422" xml:space="preserve">
						<path d="M-29.77,326.157V185.738h-48.229v-55.799h48.228V85.974c0-47.766,29.929-73.765,73.633-73.765 c20.938,0,38.921,1.532,44.139,2.208V64.33H57.693c-23.767,0-28.357,11.037-28.357,27.164v38.446h53.635l-7.357,55.798H29.335 v140.419"/>
					</svg>
				</li>
				<li><!-- SVG Instagram-->
					<svg class="icon-instagram" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="362px" height="367px" viewBox="126.619 211.602 362 367" enable-background="new 126.619 211.602 362 367" xml:space="preserve">
						<path d="M306.102,317.656c-43.29,0-78.208,34.918-78.208,78.207c0,43.29,34.917,78.208,78.208,78.208s78.207-34.918,78.207-78.208 C384.309,352.574,349.392,317.656,306.102,317.656z M306.102,446.708c-27.975,0-50.845-22.803-50.845-50.846 s22.803-50.845,50.845-50.845c28.043,0,50.845,22.802,50.845,50.845S334.077,446.708,306.102,446.708L306.102,446.708z M405.75,314.457c0,10.142-8.168,18.241-18.241,18.241c-10.142,0-18.241-8.167-18.241-18.241c0-10.073,8.168-18.241,18.241-18.241 S405.75,304.383,405.75,314.457z M457.548,332.971c-1.157-24.436-6.738-46.08-24.64-63.913 c-17.833-17.833-39.478-23.415-63.913-24.64c-25.185-1.429-100.669-1.429-125.853,0c-24.368,1.157-46.012,6.738-63.913,24.572 c-17.901,17.833-23.415,39.478-24.641,63.913c-1.429,25.184-1.429,100.669,0,125.853c1.157,24.436,6.739,46.08,24.64,63.913 c17.901,17.834,39.478,23.416,63.913,24.641c25.184,1.429,100.669,1.429,125.854,0c24.435-1.157,46.079-6.739,63.913-24.641 c17.833-17.833,23.414-39.478,24.64-63.913C458.977,433.572,458.977,358.155,457.548,332.971L457.548,332.971z M425.012,485.778 c-5.309,13.341-15.587,23.618-28.996,28.995c-20.079,7.964-67.725,6.126-89.914,6.126c-22.189,0-69.903,1.77-89.914-6.126 c-13.341-5.309-23.619-15.586-28.996-28.995c-7.964-20.079-6.125-67.726-6.125-89.915s-1.77-69.902,6.125-89.914 c5.309-13.341,15.587-23.618,28.996-28.996c20.079-7.963,67.725-6.126,89.914-6.126c22.189,0,69.903-1.77,89.914,6.126 c13.341,5.309,23.619,15.587,28.996,28.996c7.963,20.079,6.125,67.725,6.125,89.914S432.976,465.766,425.012,485.778z"/>
					</svg>
				</li>
			</ul>
		</nav>
	</header>
	<div class="container-contact">
		<section class="contact">
			<div class="text">
				<h1 class="name">Daniel Pati&ntilde;o</h1>
				<hr>
				<p class="info">​Sono un fotografo venezuelano ed ho avuto il mio primo incontro con la fotografia dopo aver comprato la mia prima camera fotografica compatta.</p>
				<p class="info">​Sono partito per il Messico per rendere migliore la mia vita, ed oltre a una vita migliore questa terra mi ha fatto scoprire la passione per la fotografia. Dopo mesi di studio e di pratica il mio hobby con la macchina compatta si &egrave; trasformato in un lavoro. Arrivano le prime collaborazioni lavorative e comincio a realizzare le mie prime sezioni fotografiche di matrimonio, moda, ritratti e still life. Li ho frequentato i primi corsi di fotografia stenopeica e di base.</p>
				<p class="info">​Lavoro tra Playa del Carmen e Guadalajara per due anni e attualmente lavoro come fotografo Freelance nella citt&agrave; che da quattro anni mi ha accolto, Napoli.</p>
				<p class="info">​La mia passione continua ad essere tale ma non smette mai di crescere e di migliorare attraverso il mio studio costante.</p>
				<br/><br/>
				<a class="email" href="mailto:dan@danpatinofotografia.com">dan@danpatinofotografia.com</a>
				<a class="tel" href="tel:3317420049">+39 331 742 0049</a>
				<a class="facebook" href="tel:3317420049">Facebook</a>
				<a class="instagram" href="tel:3317420049">Instagram</a>
			</div>
			<div class="image">
				<img src="images/contact/dan-patino-fotografia-contatti.jpg">
			</div>
		</section>
		<section class="contact-form">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="contact-form">
				<h2>Formulario de Contacto</h2>
				<input type="text" name="name" value="<?php echo $name;?>">
				<span class="error">&nbsp;<?php echo $name_errorr;?></span>
				<label for="name">Nombre completo</label>
				<input type="text" name="email" value="<?php echo $email;?>">
				<span class="error">&nbsp;<?php echo $email_errorr;?></span>
				<label for="email">Correo electronico</label>
				<input type="text" name="phone" value="<?php echo $phone;?>">
				<span class="error">&nbsp;<?php echo $phone_errorr;?></span>
				<label for="phone">Telefono</label>
				<textarea type="text" name="message"><?php echo $message;?></textarea>
				<label for="name">Mensaje</label>
				<input type="submit" name="submit" value="Enviar">
				<div class="success"><?php echo $success ?></div>
			</form>
		</section>
	</div>
	<footer>
		<div class="info">
			<p class="copy">Copyright &copy; Dan Pati&ntilde;o Fotografia. Tutti i diritti riservati.</p>
			<p class="developed"> Developed by <a href="mailto:eriksen.lezama@gmail.com">Eriksen</a></p>
		</div>
	</footer>
	<script src="assets/js/main.js"></script>
</body>
</html>