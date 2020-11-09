<?php 
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

//If the form is submitted
if(isset($_POST['submitted'])) {
	
	// require a name from user
	if(trim($_POST['contactName']) === '') {
		$nameError =  'Forgot your name!'; 
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}
	
	// need valid email
	if(trim($_POST['email']) === '')  {
		$emailError = 'Forgot to enter in your e-mail address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
		
	// we need at least some content
	if(trim($_POST['comments']) === '') {
		$commentError = 'You forgot to enter a message!';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}
		
	// upon no failure errors let's email now!
	if(!isset($hasError)) {

		
		$emailTo = 'celikovicmarija@gmail.com';
		$subject = 'Submitted message from '.$name;
		$sendCopy = trim($_POST['sendCopy']);
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: ' .' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
        
        // set our boolean completion value to TRUE
		$emailSent = true;
	}
}
?>
<!DOCTYPE html>
<head> 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Vagabond's map</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
    <style type="text/css">
			body {
				margin: 0;
				padding: 0;
			}
			
			#wrapper {
				width: 100%;
			}
			
			#clock {
				width: 100%;
                min-height: 15px;
				margin: 0px auto;
				text-align: left;
				font-size: 1.2rem;
			}
		</style>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript">
			var start_time;
			var current_time;
			
			//gets current server time
			var get_time = function () {
				$.ajax({
					type: 'GET',
					url: 'timestamp.php',
					data: ({ action : 'get_time' }),
					success: (function (data) {
						start_time = new Date(
							data.year, 
							data.month, 
							data.day, 
							data.hour, 
							data.minute, 
							data.second
						);
						$('#clock').html(current_time.toLocaleTimeString());
					}),
					dataType: 'json'
				});
			}
			
			//counts 0.25s
			var cnt_time = function () {
				current_time = new Date(start_time.getTime() + 250);
				$('#clock').html(current_time.toLocaleTimeString());
				start_time = current_time;
			}
			
			setInterval(cnt_time, 250); //add 250ms to current time every 250ms
			setInterval(get_time, 30250); //sync with server every 30,25 second
			get_time();
		</script>
</head>

<body>
	  <!-- Top Bar -->
	  <div class="top-bar">
        <div class="container">
            <div class="col-12 text-right">
            <div id="wrapper">
			<div id="clock"></div>
		</div>
                <p><a href="tel:+000000000">We're one phone call away!</a></p>
            </div>
        </div>
    </div>
    <!-- End Top Bar -->
    <!-- Navigation -->
    <nav class="navbar bg-light navbar-light navbar-expand-lg">
        <div class="container">
            <a href="index.html" class="navbar-brand">
                
                <img src="img/airplane.svg" alt="Logo" title="Logo"></a>
                <span class="align-baseline">Vagabond's map</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="indexSearch.php" class="nav-link">Looking for something?</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- @begin contact -->
	<div id="contact" class="section">
		<div class="container content w-100 ">
		
	        <?php if(isset($emailSent) && $emailSent == true) { ?>
                <p class="info">Your email was sent. Thank you for your input!</p>
            <?php } else { ?>
            
				<div class="desc">
					<h2>Contact Us</h2>
					
					<p class="desc">Please use the contact form below to send us any information we may need. It is required you place an e-mail, although if you do not need us to respond feel free to input noreply@yoursite.com.</p>
				</div>
				
				<div id="contact-form">
					<?php if(isset($hasError) || isset($captchaError) ) { ?>
                        <p class="alert">Error submitting the form</p>
                    <?php } ?>
				
					<form id="contact-us" action="contact.php" method="post">
						<div class="formblock">
							<label class="screen-reader-text">Name</label>
							<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="txt requiredField" placeholder="Name:" />
							<?php if($nameError != '') { ?>
								<br /><span class="error"><?php echo $nameError;?></span> 
							<?php } ?>
						</div>
                        
						<div class="formblock">
							<label class="screen-reader-text">Email</label>
							<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="txt requiredField email" placeholder="Email:" />
							<?php if($emailError != '') { ?>
								<br /><span class="error"><?php echo $emailError;?></span>
							<?php } ?>
						</div>
                        
						<div class="formblock">
							<label class="screen-reader-text">Message</label>
							 <textarea name="comments" id="commentsText" class="txtarea requiredField" placeholder="Message:"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
							<?php if($commentError != '') { ?>
								<br /><span class="error"><?php echo $commentError;?></span> 
							<?php } ?>
						</div>
                        
							<button name="submit" type="submit" class="subbutton">Send us Mail!</button>
							<input type="hidden" name="submitted" id="submitted" value="true" />
					</form>			
				</div>
				
			<?php } ?>
		</div>
	</div><!-- End #contact -->
	<footer>
        <div class="container">
            <div class="row text-light text-center py-4 justify-content-center">
                   <div class="col-sm-10 col-md-8 col-lg-6">
                       <img src="img/airplane.svg" alt="">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi explicabo fugit corrupti maxime ab vitae cupiditate dolor, esse aliquam a laborum perferendis, tempore deleniti facere laudantium minus! Voluptates, numquam alias.</p>
                <ul class="social pt-3">
                    <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>
                </ul>
                
                
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Start Socket -->
    <div class="socket text-light text-center py-3">
        <p>&copy; <a href="https://www.google.com" target="_blank">Google</a></p>
    </div>
    <!-- End Socket -->
    <!-- Script Source Files -->
    <!-- jQuery -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4.5 JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!-- Font Awesome -->
    <script src="js/all.min.js"></script>
    <!-- End Script Source Files -->
</body>
</html>
	
<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	$(document).ready(function() {
		$('form#contact-us').submit(function() {
			$('form#contact-us .error').remove();
			var hasError = false;
			$('.requiredField').each(function() {
				if($.trim($(this).val()) == '') {
					var labelText = $(this).prev('label').text();
					$(this).parent().append('<span class="error">Your forgot to enter your '+labelText+'.</span>');
					$(this).addClass('inputError');
					hasError = true;
				} else if($(this).hasClass('email')) {
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if(!emailReg.test($.trim($(this).val()))) {
						var labelText = $(this).prev('label').text();
						$(this).parent().append('<span class="error">Sorry! You\'ve entered an invalid '+labelText+'.</span>');
						$(this).addClass('inputError');
						hasError = true;
					}
				}
			});
			if(!hasError) {
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					$('form#contact-us').slideUp("fast", function() {				   
						$(this).before('<p class="tick"><strong>Thanks!</strong> Your email has been delivered. Huzzah!</p>');
					});
				});
			}
			
			return false;	
		});
	});
	//-->!]]>
</script>
