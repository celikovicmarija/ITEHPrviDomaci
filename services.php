
 
<?php
include "inc/header.php";
include "obrada.php";
?>


</head>

<body>
<?php 
include("inc/container.php");?>
    </nav>
    <h1 class="text-center pt-4 pb-4">CRUD Operations</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">

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

        <pre id="get_odgovor" ></pre>

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

        <div id="drzava_post" class="text-center pt-4 pb-4">
          
            <input type="text" name="naziv_drzava" id="naziv_drzava" placeholder="Unesite naziv države">
            <input type="text" name="d_drzava" id="d_drzava" placeholder="Unesite id drzave">
            <br>
        </div>


        <div id="let_post" class="text-center pt-4 pb-4">
            <input type="text" name="idruta_let" id="idruta_let" placeholder="Unesite rutu leta">
            <br>
            <input type="text" name="idpilot_let" id ="idpilot_let" placeholder="Unesite id pilota leta">
            <br>
            <input type="text" name="drzavljanstvo_let" id="drzavljanstvo_let" placeholder="Unesite državaljanstvo pilota leta">
            <br>
            <input type="text" name="regbravion_let" id="regbravion_let" placeholder="Unesite registarski broj aviona leta">
            <br>
            <input type="text" name="datum_let" id="datum_let" placeholder="Unesite datum leta">
            <br>
            <input type="text" name="trajanje_let" id="trajanje_let" placeholder="Unesite trajanje leta">
            <br>


        </div>
        <div id="pilot_post" class="text-center pt-4 pb-4">
            <input type="text" name="jmbg_pilot" id="jmbg_pilot" placeholder="Unesite jmbg pilota">
            <br>
            <input type="text" name="iddrzavljanstvo_pilot" id="iddrzavljanstvo_pilot" placeholder="Unesite državljanstvo pilota">
            <br>
            <input type="text" name="ime_pilot" id="ime_pilot" placeholder="Unesite ime pilota">
            <br>
            <input type="text" name="prezime_pilot" id="prezime_pilot" placeholder="Unesite prezime pilota">
            <br>
            <input type="text" name="datrodj_pilot" id="datrodj_pilot" placeholder="Unesite datum rođenja pilota">
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
            <input type="text" name="brpresedanja_ruta" placeholder="Unesite broj presedanja na ruti">
            <br>
            <input type="text" name="idpocetak_ruta" placeholder="Unesite pocetnu tačku rute">
            <br>
            <input type="text" name="idkraj_ruta" placeholder="Unesite krajnju tačku rute">
            <br>

        </div>



    
        <div id="brisanje_reda_avion"class="text-center pt-4 pb-4">
            <input type="text" name="brisanje_avion" id="brisanje_avion" placeholder="Unesite id aviona koji želite da obrišete">
        </div>
        <div id="brisanje_reda_drzava"class="text-center pt-4 pb-4">
            <input type="text" name="brisanje_drzava" id="brisanje_drzava" placeholder="Unesite id države koju želite da obrišete">
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
            <input type="text" name="naziv_avion_put" id="naziv_avion_put" placeholder="Unesite novi naziv aviona">
            <br>
            <input type="text" name="putnici_avion_put" id="putnici_avion_put"
                placeholder="Unesite novi maksimalni broj putnika aviona">
            <br>
            <input type="text" name="godproizvodnje_avion_put" id="godproizvodnje_avion_put"
                placeholder="Unesite novu godinu proizvodnje aviona">
            <br>

        </div>
        <div id="drzava_put"class="text-center pt-4 pb-4">
            <input type="text" name="id_drzava" id="id_drzava" placeholder="Unesite id države za promenu">
            <br>
            <input type="text" name="naziv_drzava_put" id="naziv_drzava_put" placeholder="Unesite novi naziv države">
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
            <input type="text" name="iddrzavljanstvo_pilot_put" placeholder="Unesite novo državljanstvo pilota">
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


        <div id="greska"class="text-center pt-4 pb-4">

        </div>
        
        <div id="submit" class="text-center pt-4 pb-4">
            <input type="submit" name="posalji" id="posalji" value="Posalji zahtev">
        </div>
        <?php	 if( isset($_POST["posalji"]) && $_POST["posalji"]="Posalji zahtev" &&$_POST["odabir_tabele"]!= null){
            $tabela = $_POST["odabir_tabele"];

        } if($tabela=="pilot"){?>

       
    <table class="table table-striped table-bordered text-center table-hover table-fixed text-nowrap">
        <thead>
            <tr>
				<th>JMBG</th>
				<th>Državljanstvo</th>
				<th>Ime</th>
				<th>Prezime</th>
				<th>Datum rođenja</th>
				<th>Datum zaposlenja</th>
                <th>Broj sati</th>
            </tr>
        </thead>
        <tbody id="userData">		
			<?php			
			include 'Search.php';
			$search = new Search();
			$pilots = $search->searchResult(array('order_by'=>'JMBG DESC'));      
			if(!empty($pilots)) {
				foreach($pilots as $pilot) {
					echo '
					<tr>
					<td>'.$pilot["JMBG"].'</td>
					<td>'.$pilot["Drzavljanstvo"].'</td>
					<td>'.$pilot["Ime"].'</td>
					<td>$'.$pilot["Prezime"].'</td>
					<td>'.$pilot["DatumRodjenja"].'</td>
                    <td>'.$pilot["DatumZaposlenja"].'</td>
                    <td>'.$pilot["BrojSati"].'</td>
					</tr>';
				}
			} else {
			?>            
				<tr><td colspan="5">No pilot(s) found...</td></tr>
			<?php } ?>
        </tbody>
    </table>	
            </form> <?php } ?> 
            <?php if($tabela=="drzava"){?>

       
<table class="table table-striped table-bordered text-center table-hover table-fixed text-nowrap">
    <thead>
        <tr>
            <th>DrzavaID</th>
            <th>NazivDrzave</th>

        </tr>
    </thead>
    <tbody id="userData">		
        <?php			
        include 'Search.php';
        $search = new Search();
        $countries=Drzava::getAll($conn);    
        if(!empty($countries)) {
            foreach($countries as $country) {
                echo '
                <tr>
                <td>'.$country["DrzavaID"].'</td>
                <td>'.$country["NazivDrzave"].'</td>
                </tr>';
            }
        } else {
        ?>            
            <tr><td colspan="5">No countries(s) found...</td></tr>
        <?php } ?>
    </tbody>
</table>	
        </form> <?php } ?>

        <?php if($tabela=="avion"){?>

       
<table class="table table-striped table-bordered text-center table-hover table-fixed text-nowrap">
    <thead>
        <tr>
            <th>Registarski Broj</th>
            <th>Naziv Aviona</th>
            <th>Maksimalni broj putnika</th>
            <th>Godina proizvodnje</th>

        </tr>
    </thead>
    <tbody id="userData">		
        <?php			
        include 'Search.php';
        $search = new Search();
        $airplanes=Avion::getAll($conn);    
        if(!empty($airplanes)) {
            foreach($airplanes as $airplane) {
                echo '
                <tr>
                <td>'.$airplane["RegBroj"].'</td>
                <td>'.$airplane["NazivAviona"].'</td>
                <td>'.$airplane["MaxBrojPutnika"].'</td>
                <td>'.$airplane["GodinaProizvodnje"].'</td>
                </tr>';
            }
        } else {
        ?>            
            <tr><td colspan="5">No countries(s) found...</td></tr>
        <?php } ?>
    </tbody>
</table>	
        </form> <?php } ?>
        <?php
        if($tabela=="let"){?>

       
            <table class="table table-striped table-bordered text-center  table-hover table-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Broj rute</th>
                        <th>ID Pilota</th>
                        <th>Drzavljanstvo pilota</th>
                        <th>Registarski broj aviona</th>
                        <th>Datum leta</th>
                        <th>Trajanje leta </th>

                    </tr>
                </thead>
                <tbody id="userData">		
                    <?php			
                    include 'Search.php';
                    $search = new Search();
                    $flights = $search->searchResult(array('order_by'=>'RegBroj DESC'));  
                    $flights=Let::getAll($conn);    
                    if(!empty($flights)) {
                        foreach($flights as $flight) {
                            echo '
                            <tr>
                            <td>'.$flight["BrojRute"].'</td>
                            <td>'.$flight["PilotID"].'</td>
                            <td>'.$flight["Drzavljanstvo"].'</td>
                            <td>'.$flight["RegBroj"].'</td>
                            <td>'.$flight["DatumLeta"].'</td>
                            <td>'.$flight["TrajanjeLeta"].'</td>
                            </tr>';
                        }
                    } else {
                    ?>            
                        <tr><td colspan="5">No flight(s) found...</td></tr>
                    <?php } ?>
                </tbody>
            </table>	
                    </form> <?php } ?>
                    <?php
                     if($tabela=="ruta"){?>

       
                        <table class="table table-striped table-bordered text-center  w-auto text-nowrap">
                            <thead>
                                <tr>
                                    <th>Broj rute</th>
                                    <th>Naziv rute</th>
                                    <th>Broj presedanja</th>
                                    <th>Pocetna tacka</th>
                                    <th>Krajnja tacka</th>
            
                                </tr>
                            </thead>
                            <tbody id="userData">		
                                <?php			
                                include 'Search.php';
                                $search = new Search();
                                $routs = $search->searchResult(array('order_by'=>'RegBroj DESC'));  
                                $routs=Ruta::getAll($conn);    
                                if(!empty($routs)) {
                                    foreach($routs as $route) {
                                        echo '
                                        <tr>
                                        <td>'.$route["BrojRute"].'</td>
                                        <td>'.$route["NazivRute"].'</td>
                                        <td>'.$route["BrojPresedanja"].'</td>
                                        <td>'.$route["PocetnaTacka"].'</td>
                                        <td>'.$route["KrajnjaTacka"].'</td>
                                        </tr>';
                                    }
                                } else {
                                ?>            
                                    <tr><td colspan="5">No route(s) found...</td></tr>
                                <?php } ?>
                            </tbody>
                        </table>	
                                </form> <?php } ?>
    </div>
        </div>
    </div>
    <?php 
include "inc/footer.php"
?>


<script>
    var nizBlokova = ["get_odgovor", "avion_post", "drzava_post", "let_post", "pilot_post", "ruta_post", "avion_put", "drzava_put",
        "let_put", "pilot_put", "ruta_put", "greska", "brisanje_reda_avion","brisanje_reda_drzava","brisanje_reda_let","brisanje_reda_pilot","brisanje_reda_ruta"];
    function skloniBlokove() {
        for (const blok of nizBlokova) {
            document.getElementById(blok).style.display = "none";
        }
    };
    skloniBlokove();


    $("input[name=http_zahtev]").on("click", prikaziBlok);
    $("input[name=odabir_tabele]").on("click", resetHTTP);
    $("button").on("click", posaljiZahtev);

    function prikaziBlok() {
        console.log()
        switch ($("input[name=http_zahtev]:checked")[0].id) {
            case "get":
                skloniBlokove();
                document.getElementById("get_odgovor").innerHTML = "";
                document.getElementById(nizBlokova[0]).style.display = "block";
                break;
            case "post":
                skloniBlokove();
                if ($("input[name=odabir_tabele]:checked").length == 0) {
                    document.getElementById(nizBlokova[11]).innerHTML = "Morate odabrati tabelu za manipulaciju";
                    document.getElementById(nizBlokova[11]).style.display = "block";
                } else {

                    var tabela = $("input[name=odabir_tabele]:checked")[0].id;

                    if (tabela == "radio_avion") {

                        document.getElementById(nizBlokova[1]).style.display = "block";
                    } else if (tabela == "radio_drzava") {
                        document.getElementById(nizBlokova[2]).style.display = "block";
                    }
                    else if (tabela == "radio_let") {
                        document.getElementById(nizBlokova[3]).style.display = "block";
                    }
                    else if (tabela == "radio_pilot") {
                        document.getElementById(nizBlokova[4]).style.display = "block";
                    }
                    else if (tabela == "radio_ruta") {
                        document.getElementById(nizBlokova[5]).style.display = "block";
                    }
                }

                break;
            case "put":
                skloniBlokove();
                if ($("input[name=odabir_tabele]:checked").length == 0) {
                    document.getElementById(nizBlokova[11]).innerHTML = "Morate odabrati tabelu za manipulaciju";
                    document.getElementById(nizBlokova[11]).style.display = "block";
                } else {
                    var tabela = $("input[name=odabir_tabele]:checked")[0].id;
                    if (tabela == "radio_avion") {
                        document.getElementById(nizBlokova[6]).style.display = "block";
                    } else if (tabela == "radio_drzava") {
                        document.getElementById(nizBlokova[7]).style.display = "block";
                    }
                    else if (tabela == "radio_let") {
                        document.getElementById(nizBlokova[8]).style.display = "block";
                    }
                    else if (tabela == "radio_pilot") {
                        document.getElementById(nizBlokova[9]).style.display = "block";
                    }
                    else if (tabela == "radio_ruta") {
                        document.getElementById(nizBlokova[10]).style.display = "block";
                    }
                }
                break;
            case "delete":
                skloniBlokove();
                if ($("input[name=odabir_tabele]:checked").length == 0) {
                    document.getElementById(nizBlokova[11]).innerHTML = "Morate odabrati tabelu za manipulaciju";
                    document.getElementById(nizBlokova[11]).style.display = "block";
                } else {
                    var tabela = $("input[name=odabir_tabele]:checked")[0].id;

                    if (tabela == "radio_avion") {
                        document.getElementById(nizBlokova[12]).style.display = "block";
                    } else if (tabela == "radio_drzava") {
                        document.getElementById(nizBlokova[13]).style.display = "block";
                    }
                    else if (tabela == "radio_let") {
                        document.getElementById(nizBlokova[14]).style.display = "block";
                    }
                    else if (tabela == "radio_pilot") {
                        document.getElementById(nizBlokova[15]).style.display = "block";
                    }
                    else if (tabela == "radio_ruta") {
                        document.getElementById(nizBlokova[16]).style.display = "block";
                    }
                }
                break;
            default:
                break;
        }
    }
    function resetHTTP() {
        skloniBlokove();
        $("input[name=http_zahtev]").prop('checked', false);

    }
    function posaljiZahtev(){

    

    request = $.ajax({
        url: 'get.php',
        type: 'post',
        
        dataType: 'json'
    });
    
}
    
</script>
