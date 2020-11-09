<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">

    <title>Vagabond's map</title>
 
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
           <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <?php
    
        include "obrada.php";
    
    ?>
</head>

<body>
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
    <h1 class="text-center pt-4 pb-4">Forma za manipulaciju sa API-em</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
    <!-- Radio button grupa za odabir tipa tabele iz baze koji želimo da menjamo -->
    <form action="" method="post">
        <div id="odabir_tabele" class="text-center pt-4 pb-1">
            <input type="radio" name="odabir_tabele" id="radio_avion" value="avion">
            <label for="radio_avion">avion</label>
            <input type="radio" name="odabir_tabele" id="radio_drzava" value="drzava">
            <label for="radio_drzava">drzava</label>
            <input type="radio" name="odabir_tabele" id="radio_let" value="let">
            <label for="radio_let">let</label>
            <input type="radio" name="odabir_tabele" id="radio_pilot" value="pilot">
            <label for="radio_pilot">pilot</label>
            <input type="radio" name="odabir_tabele" id="radio_ruta" value="ruta">
            <label for="radio_ruta">ruta</label>
        </div>


        <!-- Radio button grupa za odabir tipa HTTP zahteva koji želimo da pošaljemo -->

        <div id="http_zahtev" class="text-center pt-1 pb-2">
            <input type="radio" name="http_zahtev" id="get" value="get">
            <label for="get">GET</label>
            <input type="radio" name="http_zahtev" id="post" value="post">
            <label for="post">POST</label>
            <input type="radio" name="http_zahtev" id="put" value="put">
            <label for="put">PUT</label>
            <input type="radio" name="http_zahtev" id="delete" value="delete">
            <label for="delete">DELETE</label>
        </div>

        <!-- Div sekcija za prikaz odgovora za GET zahtev sa servera
        HTML tag <pre></pre> nam omogućava da ispisuje prethodno formatiran tekst, što nam je potrebno za pretty prikaz JSON-a -->

        <pre id="get_odgovor" class="text-center pt-4 pb-4"></pre>

        <div id="avion_post" class="text-center pt-4 pb-4">
            <input type="text" name="regbroj_avion" placeholder="Unesite registarski broj aviona">
            <br>
            <input type="text" name="naziv_avion" placeholder="Unesite naziv aviona">
            <br>
            <input type="text" name="putnici_avion" placeholder="Unesite maksimalni broj putnika aviona">
            <br>
            <input type="text" name="godproizvodnje_avion" placeholder="Unesite godinu proizvodnje aviona">
            <br>
        </div>

        <div id="drzava_post"class="text-center pt-4 pb-4">
            <input type="text" name="naziv_drzava" placeholder="Unesite naziv drzave">
            <br>
        </div>


        <div id="let_post"class="text-center pt-4 pb-4">
            <input type="text" name="idruta_let" id="idruta_let" placeholder="Unesite rutu leta">
            <br>
            <input type="text" name="idpilot_let" id ="idpilot_let" placeholder="Unesite id pilota leta">
            <br>
            <input type="text" name="drzavljanstvo_let" id="drzavljanstvo_let" placeholder="Unesite drzavaljanstvo pilota leta">
            <br>
            <input type="text" name="regbravion_let" id="regbravion_let" placeholder="Unesite registarski broj aviona leta">
            <br>
            <input type="text" name="datum_let" id="datum_let" placeholder="Unesite datum leta">
            <br>
            <input type="text" name="trajanje_let" id="trajanje_let" placeholder="Unesite trajanje leta">
            <br>


        </div>
        <div id="pilot_post"class="text-center pt-4 pb-4">
            <input type="text" name="jmbg_pilot" id="jmbg_pilot" placeholder="Unesite jmbg pilota">
            <br>
            <input type="text" name="iddrzavljanstvo_pilot" id="iddrzavljanstvo_pilot" placeholder="Unesite drzavljanstvo pilota">
            <br>
            <input type="text" name="ime_pilot" id="ime_pilot" placeholder="Unesite ime pilota">
            <br>
            <input type="text" name="prezime_pilot" id="prezime_pilot" placeholder="Unesite prezime pilota">
            <br>
            <input type="text" name="datrodj_pilot" id="datrodj_pilot" placeholder="Unesite datum rodjenja pilota">
            <br>
            <input type="text" name="datzap_pilot" id="datzap_pilot" placeholder="Unesite datum zaposlenja pilota">
            <br>
            <input type="text" name="sati_pilot" id="sati_pilot" placeholder="Unesite broj sati rada pilota">

        </div>
        <div id="ruta_post"class="text-center pt-4 pb-4">
        <input type="text" name="broj_ruta" placeholder="Unesite broj rute">
            <br>
            <input type="text" name="naziv_ruta" placeholder="Unesite naziv rute">
            <br>
            <input type="text" name="brpresedanja_ruta" placeholder="Unesite broj bresedanja na ruti">
            <br>
            <input type="text" name="idpocetak_ruta" placeholder="Unesite pocetnu tacku rute">
            <br>
            <input type="text" name="idkraj_ruta" placeholder="Unesite krajnju tacku rute">
            <br>

        </div>



        <div id="brisanje_reda"class="text-center pt-4 pb-4">
            <input type="text" name="brisanje" id="brisanje" placeholder="Unesite id koji želite da obrišete">
        </div>
        <div id="brisanje_reda_avion"class="text-center pt-4 pb-4">
            <input type="text" name="brisanje_avion" id="brisanje_avion" placeholder="Unesite id aviona koji želite da obrišete">
        </div>
        <div id="brisanje_reda_drzava"class="text-center pt-4 pb-4">
            <input type="text" name="brisanje_drzava" id="brisanje_drzava" placeholder="Unesite id drzave koju želite da obrišete">
        </div>
        <div id="brisanje_reda_let"class="text-center pt-4 pb-4">
            <input type="text" name="brisanje_let" id="brisanje_let" placeholder="Unesite id leta koji želite da obrišete">
        </div>
        <div id="brisanje_reda_pilot"class="text-center pt-4 pb-4">
            <input type="text" name="brisanje_pilot" id="brisanje_pilot" placeholder="Unesite jmbg pilota koji želite da obrišete">
        </div>
        <div id="brisanje_reda_ruta"class="text-center pt-4 pb-4">
            <input type="text" name="brisanje_ruta" id="brisanje_ruta" placeholder="Unesite id rute koju želite da obrišete">
        </div>



        <div id="avion_put"class="text-center pt-4 pb-4">
            <input type="text" name="regbr_avion" id="regbr_avion"
                placeholder="Unesiteregistarkski broj aviona za promenu">
            <br>
            <input type="text" name="naziv_avion_put" id="naziv_avion_put" placeholder="Unesite novinaziv aviona">
            <br>
            <input type="text" name="putnici_avion_put" id="putnici_avion_put"
                placeholder="Unesite novi maksimalni broj putnika aviona">
            <br>
            <input type="text" name="godproizvodnje_avion_put" id="godproizvodnje_avion_put"
                placeholder="Unesite novu godinu proizvodnje aviona">
            <br>

        </div>
        <div id="drzava_put"class="text-center pt-4 pb-4">
            <input type="text" name="id_drzava" id="id_drzava" placeholder="Unesite id drzave za promenu">
            <br>
            <input type="text" name="naziv_drzava_put" id="naziv_drzava_put" placeholder="Unesite novi naziv drzave">
            <br>
        </div>
        <!-- ovo menjaj-->
        <div id="let_put"class="text-center pt-4 pb-4">
            <input type="text" name="idruta_let_put" id="idruta_let_put" placeholder="Unesite rutu leta za promenu">
            <br>
            <input type="text" name="idpilot_let_put" id="idpilot_let_put"
                placeholder="Unesite id pilota leta za promenu">
            <br>
            <input type="text" name="drzavljanstvo_let_put" id="drzavljanstvo_let_put"
                placeholder="Unesite drzavaljanstvo pilota leta za promenu">
            <br>
            <input type="text" name="regbravion_let_put" id="regbravion_let_put"
                placeholder="Unesite novi registarski broj aviona leta">
            <br>
            <input type="text" name="datum_let_put" id="datum_let_put" placeholder="Unesite novi datum leta">
            <br>
            <input type="text" name="trajanje_let_put" id="trajanje_let_put" placeholder="Unesite novo trajanje leta">
        </div>
        <div id="pilot_put"class="text-center pt-4 pb-4">
            <input type="text" name="jmbg_pilot_put" placeholder="Unesite jmbg pilota za promenu">
            <br>
            <input type="text" name="iddrzavljanstvo_pilot_put" placeholder="Unesite novo drzavljanstvo pilota">
            <br>
            <input type="text" name="ime_pilot_put" id="ime_pilot_put" placeholder="Unesite novo ime pilota">
            <br>
            <input type="text" name="prezime_pilot_put" id="prezime_pilot_put"
                placeholder="Unesite novo prezime pilota">
            <br>
            <input type="text" name="sati_pilot_put" id="sati_pilot_put"
                placeholder="Unesite novi broj sati rada pilota">
        </div>
        <div id="ruta_put"class="text-center pt-4 pb-4">
            <input type="text" name="id_ruta" id="id_ruta" placeholder="Unesite id rute za izmenu">
            <br>
            <input type="text" name="naziv_ruta_put" id="naziv_ruta_put" placeholder="Unesite naziv rute">
            <br>
            <input type="text" name="brpresedanja_ruta_put" id="brpresedanja_ruta_put"
                placeholder="Unesite novi broj bresedanja na ruti">
            <br>
            <input type="text" name="idpocetak_ruta_put" id="idpocetak_ruta_put"
                placeholder="Unesite novu pocetnu tacku rute">
            <br>
            <input type="text" name="idkraj_ruta_put" id="idkraj_ruta_put"
                placeholder="Unesite novu krajnju tacku rute">
            <br>
        </div>


        <!-- Div sekcija za ispisivanje grešaka u slučaju pogrešne selekcije radio button-a -->

        <div id="greska"class="text-center pt-4 pb-4">

            <!-- Div sekcija za za dugme preko kojeg će se slati zahtevi -->

        </div>
        <!--<div id="submit"> <button type="button">Posalji zahtev</button>        </div>-->
        
        <div id="submit" class="text-center pt-4 pb-4">
            <input type="submit" name="posalji" id="posalji" value="Posalji zahtev">
        </div>
    </form>
    </div>
        </div>
    </div>
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

</body>



<script>
    // kreiramo niz blokova, odnosno niz svih id vrednosti div sekcija
    var nizBlokova = ["get_odgovor", "avion_post", "drzava_post", "let_post", "pilot_post", "ruta_post", "brisanje_reda", "avion_put", "drzava_put",
        "let_put", "pilot_put", "ruta_put", "greska", "brisanje_reda_avion","brisanje_reda_drzava","brisanje_reda_let","brisanje_reda_pilot","brisanje_reda_ruta"];

    //na samom početku želimo da sakrijemo sve blokove, dok korisnik ne odabere tip tabele i HTTP zahteva
    function skloniBlokove() {
        //prolazimo kroz niz blokova
        for (const blok of nizBlokova) {
            //i vrednost display atributa u okviru css-a postavljamo na none, kako se ne bi prikazivali
            document.getElementById(blok).style.display = "none";
        }
    };
    //pozivamo funkciju da se izvrši
    skloniBlokove();


    //definišemo event handler-e za svaki klik na formi
    //gde klikom na neki radio button za HTTP zahtev i određenu tabelu, želimo da se prikaže DIV element za tu kombinaciju
    //kombinacija je definisana u okviru prikaziBlok funkcije
    $("input[name=http_zahtev]").on("click", prikaziBlok);
    $("input[name=odabir_tabele]").on("click", resetHTTP);
    $("button").on("click", posaljiZahtev);

    //prikaziBlok funkcija koristeći switch prolazi kroz sve tipove zahteva koji mogu biti odabrani
    //$("input[name=http_zahtev]:checked")[0].id je jQuery funkcija koja nam omogućava da 
    // dođemo do svih čekiranih input polja čiji je name http_zahtev 
    // i da pristupimo njegovom id-u jer su kao id postavljene vrednosti get post put delete 
    function prikaziBlok() {
        console.log()
        switch ($("input[name=http_zahtev]:checked")[0].id) {
            case "get":
                // u slučaju da odaberemo get, sakrićemo sve prethodno prikazane div-ove
                skloniBlokove();
                //obrisaćemo unutrašnji HTML get_odgovor bloka 
                document.getElementById("get_odgovor").innerHTML = "";
                // i prikazati ga da bude vidljiv, promenom atributa display sa none na block
                document.getElementById(nizBlokova[0]).style.display = "block";
                break;
            case "post":
                // u slučaju da odaberemo post, sakrićemo sve prethodno prikazane div-ove
                skloniBlokove();
                //proverićemo da li je odabrana tabela novosti ili kategorije
                if ($("input[name=odabir_tabele]:checked").length == 0) {
                    //ako nije, želimo da se prikaže div blok za grešku i ispiše poruka da mora biti obeležena greška tabela 
                    document.getElementById(nizBlokova[12]).innerHTML = "Morate odabrati tabelu za manipulaciju";
                    document.getElementById(nizBlokova[12]).style.display = "block";
                } else {
                    //ako jeste odabrana tabela, odnosno length nije 0
                    //uzećemo koja je to tabela, odnosno id tog radio button-a
                    var tabela = $("input[name=odabir_tabele]:checked")[0].id;

                    if (tabela == "radio_avion") {
                        //i u slučaju da je u pitanju tabela kategorije
                        //prikazaćemo post formu za kategorije
                        document.getElementById(nizBlokova[1]).style.display = "block";
                    } else if (tabela == "radio_drzava") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[2]).style.display = "block";
                    }
                    else if (tabela == "radio_let") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[3]).style.display = "block";
                    }
                    else if (tabela == "radio_pilot") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[4]).style.display = "block";
                    }
                    else if (tabela == "radio_ruta") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[5]).style.display = "block";
                    }
                }

                break;
            case "put":
                // u slučaju da odaberemo put, sakrićemo sve prethodno prikazane div-ove
                skloniBlokove();
                //proverićemo da li je odabrana tabela novosti ili kategorije
                if ($("input[name=odabir_tabele]:checked").length == 0) {
                    //ako nije, želimo da se prikaže div blok za grešku i ispiše poruka da mora biti obeležena greška tabela 
                    document.getElementById(nizBlokova[12]).innerHTML = "Morate odabrati tabelu za manipulaciju";
                    document.getElementById(nizBlokova[12]).style.display = "block";
                } else {
                    //ako jeste odabrana tabela, odnosno length nije 0
                    //uzećemo koja je to tabela, odnosno id tog radio button-a
                    var tabela = $("input[name=odabir_tabele]:checked")[0].id;

                    if (tabela == "radio_avion") {
                        //i u slučaju da je u pitanju tabela kategorije
                        //prikazaćemo post formu za kategorije
                        document.getElementById(nizBlokova[7]).style.display = "block";
                    } else if (tabela == "radio_drzava") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[8]).style.display = "block";
                    }
                    else if (tabela == "radio_let") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[9]).style.display = "block";
                    }
                    else if (tabela == "radio_pilot") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[10]).style.display = "block";
                    }
                    else if (tabela == "radio_ruta") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[11]).style.display = "block";
                    }
                }
                break;
            case "delete":
                //poslednja opcija nam je prikaz bloka za brisanje elemenata iz određene tabele
                skloniBlokove();
                //proverićemo da li je odabrana tabela novosti ili kategorije
                if ($("input[name=odabir_tabele]:checked").length == 0) {
                    //ako nije, želimo da se prikaže div blok za grešku i ispiše poruka da mora biti obeležena greška tabela 
                    document.getElementById(nizBlokova[12]).innerHTML = "Morate odabrati tabelu za manipulaciju";
                    document.getElementById(nizBlokova[12]).style.display = "block";
                } else {

                    //ako jeste odabrana tabela, odnosno length nije 0
                    //prikazaćemo put formu za kategorije
                    var tabela = $("input[name=odabir_tabele]:checked")[0].id;
                    document.getElementById(nizBlokova[6]).style.display = "block";

                    if (tabela == "radio_avion") {
                        //i u slučaju da je u pitanju tabela kategorije
                        //prikazaćemo post formu za kategorije
                        document.getElementById(nizBlokova[13]).style.display = "block";
                    } else if (tabela == "radio_drzava") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[14]).style.display = "block";
                    }
                    else if (tabela == "radio_let") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[15]).style.display = "block";
                    }
                    else if (tabela == "radio_pilot") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[16]).style.display = "block";
                    }
                    else if (tabela == "radio_ruta") {
                        //u suprotnom prikazaćemo post formu za novosti
                        document.getElementById(nizBlokova[17]).style.display = "block";
                    }
                }
                break;
            default:
                break;
        }
    }
    //funkcija resetHTTP nam samo resetuje odabrane HTTP zahteve nakon promene odabrane tabele  
    function resetHTTP() {
        skloniBlokove();
        $("input[name=http_zahtev]").prop('checked', false);

    }

    //funkcija posaljiZahtev obrađuje pomoću AJAX-a zahteve koje šaljemo ka serveru
    function posaljiZahtev(){
        console.log('Zahtev')
        //na samom početku nam je bitno da su selektovani i zahtev i tabela
        if($("input[name=odabir_tabele]:checked").length!=0 && $("input[name=http_zahtev]:checked").length!=0){
            //ako jesu nastavljamo sa obradom zahteva
            //pamtimo koja je tabela u pitanju
            var tabela = $("input[name=odabir_tabele]:checked")[0].id;
            console.log(" eee"+tabela)
            //i ponovo  kroz switch prolazimo i obrađujemo svaki zahtev
            switch ( $("input[name=http_zahtev]:checked")[0].id){
                case "get":
                //kada je get u pitanju
                //proveravamo koja je tabela
                    if(tabela=="radio_drzava"){
                        //i nakon toga pozivamo getJSON funkciju kojoj prosleđujemo link endpoint-a našeg API-a
                        //više od funkciji getJSON https://api.jquery.com/jquery.getjson/
                            console.log('drzava')
                        //getJSON funkcija ima 2 bitna parametra, a to su url koji prosleđujemo i success funkcija koja kojom obrađujemo podatke koje smo dobili
                        //data parametar u okviru funkcije, predstavlja podatke poslate sa servera u JSON formatu
                        $.getJSON("http://localhost:80/aerodrom/drzava", function(data){
                            //postavljamo unutrašnji HTML div bloka get_odgovor na pretty string reprezentaciju JSON objekta
                            //string reprezentacija je mogla i da se postavi samo sa JSON.stringify(data)
                            // ali postavljamo i parametre null i 2 kako bi prikaz JSONa bio čitljiv
                            document.getElementById("get_odgovor").innerHTML = JSON.stringify(data,null,2);
                        });
                    }else{
                        //ponavljamo istu proceduru samo za tabelu kategorije
                        $.getJSON("http://localhost:80/rest/api/kategorije", function(data){
                            document.getElementById("get_odgovor").innerHTML = JSON.stringify(data,null,2);
                        });
                    }
                    break;

                default:
                    console.log("default");
            }
        }
    }

    //funkcija posaljiZahtev obrađuje pomoću AJAX-a zahteve koje šaljemo ka serveru

</script>
