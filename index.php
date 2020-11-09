<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vagabond's map</title>
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
                    <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="indexSearch.php" class="nav-link">Looking for something?</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->
    <!-- Image Carousel -->
    <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="6500">
        <!-- Carousel Content -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel/1.png" alt="" class="w-100">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-8 bg-custom d-none d-md-block py-3 px-0">
                                <h1>Vagabond's Map</h1>
                                <div class="border-top border-primary w-50 mx-auto my-3">
                                    <h3 class="pb-3">Experience the other perspective</h3>
                                    <a href="#" class="btn btn-danger btn-lg mr-2">View Demo</a>
                                    <a href="#" class="btn btn-primary btn-lg ml-2">Start Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item ">
                <img src="img/carousel/2.png" alt="" class="w-100">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-end text-right">
                            <div class="col-8 bg-custom d-none d-lg-block py-3 px-0 pr-3">
                                <p class="lead pb-3">Ready to start another chapter?</p>
                                <a href="#" class="btn btn-danger btn-lg mr-2">Here!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel/3.png" alt="" class="w-100">
                <div class="carousel-caption">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start text-left">
                                <div class="col-7 bg-custom d-none d-lg-block py-3 px-0 pl-3">
                                    <h3 class="pb-3">Words carry meaning</h3>
                                    <p class="lead">THINK BEFORE SAYING IT OUT LOUD.</p>
                                    <a href="#" class="btn btn-primary btn-lg">Start Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Carousel Content -->
    <!-- Previous & Next Buttons -->
    <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
        <span class="fas fa-chevron-left fa-2x"></span>
    </a>
    <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
        <span class="fas fa-chevron-right fa-2x"></span>
    </a>
    <!-- End Previous & Next Buttons -->
</div>
    <!-- End Image Carousel -->
    
    <!-- Main Page Heading -->
    <div class="col-12 text-center mt-5">
        <h2 class="text-dark pt-4">Innovation</h2>
    
    <div class="border-top border-primary w-25 mx-auto my-3"></div>
    <p class="lead">What lies beyond?</p>
    </div>      
    <!-- Three Column Section -->
    <div class="container">
        <div class="row my-5">
            
            <div class="col-md-4 my-4">
                    <img src="img/1.jpg" alt="" class="w-100">
                    <h4 class="my-4">Need to recharge?</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet tempora nisi repellendus cupiditate earum doloribus aliquam non voluptatibus asperiores iure ad explicabo incidunt et nihil, aperiam dolores soluta eos expedita.</p>
                <a href="#" class="btn btn-outline-dark btn-md">Our story</a>
                </div>
                <div class="col-md-4 my-4">
                    <img src="img/2.jpg" alt="" class="w-100">
                    <h4 class="my-4">Want to travel?</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet tempora nisi repellendus cupiditate earum doloribus aliquam non voluptatibus asperiores iure ad explicabo incidunt et nihil, aperiam dolores soluta eos expedita.</p>
                <a href="#" class="btn btn-outline-dark btn-md">Our story</a>
                </div>
                <div class="col-md-4 my-4">
                    <img src="img/3.jpg" alt="" class="w-100">
                    <h4 class="my-4">Looking for an inspiration?</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet tempora nisi repellendus cupiditate earum doloribus aliquam non voluptatibus asperiores iure ad explicabo incidunt et nihil, aperiam dolores soluta eos expedita.</p>
                <a href="#" class="btn btn-outline-dark btn-md">Our story</a>
                </div>
        </div>
    </div>
    <!-- End Three Column Section -->
    <!-- Emoji Navbar First -->
    <a class="navbar bg-primary sticky-top emoji" href="#emoji" role="button"
    data-toggle="collapse"></a>
    <!-- Start Fixed Background IMG -->
<div class="fixed-background">
    <div class="row text-light py-5">
        <div class="col-12 text-center">
            <h1>Advance to the next level</h1>
            <h3 class="py-4">..See what's on the other side</h3>
            <button type="button" data-toggle="modal" data-target="#modal1"
             class="btn btn-primary btn-lg mr-2">Left</button>
            <button type="button" data-toggle="modal" data-target="#modal1" 
            class="btn btn-danger btn-lg ml-2">Right</button>
       
        </div>
    </div>
    <div class="fixed-wrap">
        <div class="fixed"></div>
    </div>
</div>
    <!-- End Fixed Background IMG -->
    <!-- Emoji Navbar Second -->
    <a class="navbar bg-primary sticky-top emoji" href="#emoji" role="button"
    data-toggle="collapse"><i class="fas fa-plug"></i></a>
    <div class="collapse" id="emoji">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3"><img src="img/emoji/panda.gif" alt="" class="w-100"></div>
                <div class="col-sm-6 col-md-3"><img src="img/emoji/poo.gif" alt="" class="w-100"></div>
                <div class="col-sm-6 col-md-3"><img src="img/emoji/unicorn.gif" alt="" class="w-100"></div>
                <div class="col-sm-6 col-md-3"><img src="img/emoji/chicken.gif" alt="" class="w-100"></div>
            </div>
        </div>
    </div>
    <!-- Modal Popup -->
    <div class="modal fade" id="modal1">
        <div class="modal-dialog">
            <img src="img/emoji/poo.gif" alt="" class="w-100">
        </div>
    </div>
    <!-- Start Two Column Section -->
    <div class="container my-5">
        <div class="row py-4">
                <div class="col-lg-4 mb-4 my-lg-auto">
                    <h1 class="text-dark font-weight-bold mb-3">We've been expecting you</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt dolore repudiandae ut? Possimus esse amet officia ullam itaque? Labore voluptatum eum sequi ab numquam iusto odit nesciunt ducimus eveniet commodi!</p>
               
<a href="#" class="btn btn-outline-dark btn-lg" target="_blank">The agency theme</a>          
                </div>
                <div class="col-lg-8"><img src="img/code.jpg" alt="" class="w-100"></div>
        </div>
    </div>
    <!-- End Two Column Section -->
    <!-- Start Jumbotron -->
    <div class="jumbotron py-5 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-8 col-xl-9 my-auto">
                    <h4>Some text inside jumbotron out here.</h4>
                </div>
                <div class="col-md-5 col-lg-4 col-xl-3 pt-4 pt-md-0"></div>
                <a href="#" class="btn btn-primary btn-lg"> Contact Us Today</a>
            </div>
        </div>
    </div>
    <!-- End Jumbotron -->
    <!-- Start Footer -->
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