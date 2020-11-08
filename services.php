<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Testiranje REST API-a</title>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <?php
    
        include "obrada.php";
    
    ?>
</head>

<body>
    <h1>Forma za manipulaciju sa API-em</h1>

    <!-- Radio button grupa za odabir tipa tabele iz baze koji želimo da menjamo -->
    <form action="" method="post">
        <div id="odabir_tabele">
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

        <div id="http_zahtev">
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

        <pre id="get_odgovor"></pre>

        <div id="avion_post">
            <input type="text" name="regbroj_avion" placeholder="Unesite registarski broj aviona">
            <br>
            <input type="text" name="naziv_avion" placeholder="Unesite naziv aviona">
            <br>
            <input type="text" name="putnici_avion" placeholder="Unesite maksimalni broj putnika aviona">
            <br>
            <input type="text" name="godproizvodnje_avion" placeholder="Unesite godinu proizvodnje aviona">
            <br>
        </div>

        <div id="drzava_post">
            <input type="text" name="naziv_drzava" placeholder="Unesite naziv drzave">
            <br>
        </div>


        <div id="let_post">
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
        <div id="pilot_post">
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
        <div id="ruta_post">
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



        <div id="brisanje_reda">
            <input type="text" name="brisanje" id="brisanje" placeholder="Unesite id koji želite da obrišete">
        </div>
        <div id="brisanje_reda_avion">
            <input type="text" name="brisanje_avion" id="brisanje_avion" placeholder="Unesite id aviona koji želite da obrišete">
        </div>
        <div id="brisanje_reda_drzava">
            <input type="text" name="brisanje_drzava" id="brisanje_drzava" placeholder="Unesite id drzave koju želite da obrišete">
        </div>
        <div id="brisanje_reda_let">
            <input type="text" name="brisanje_let" id="brisanje_let" placeholder="Unesite id leta koji želite da obrišete">
        </div>
        <div id="brisanje_reda_pilot">
            <input type="text" name="brisanje_pilot" id="brisanje_pilot" placeholder="Unesite jmbg pilota koji želite da obrišete">
        </div>
        <div id="brisanje_reda_ruta">
            <input type="text" name="brisanje_ruta" id="brisanje_ruta" placeholder="Unesite id rute koju želite da obrišete">
        </div>



        <div id="avion_put">
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
        <div id="drzava_put">
            <input type="text" name="id_drzava" id="id_drzava" placeholder="Unesite id drzave za promenu">
            <br>
            <input type="text" name="naziv_drzava_put" id="naziv_drzava_put" placeholder="Unesite novi naziv drzave">
            <br>
        </div>
        <!-- ovo menjaj-->
        <div id="let_put">
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
        <div id="pilot_put">
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
        <div id="ruta_put">
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

        <div id="greska">

            <!-- Div sekcija za za dugme preko kojeg će se slati zahtevi -->

        </div>
        <!--<div id="submit"> <button type="button">Posalji zahtev</button>        </div>-->
        
        <div id="submit">
            <input type="submit" name="posalji" id="posalji" value="Posalji zahtev">
        </div>
    </form>

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
    function posaljiZahtev() {
        //na samom početku nam je bitno da su selektovani i zahtev i tabela
        if ($("input[name=odabir_tabele]:checked").length != 0 && $("input[name=http_zahtev]:checked").length != 0) {
            //ako jesu nastavljamo sa obradom zahteva
            //pamtimo koja je tabela u pitanju
            var tabela = $("input[name=odabir_tabele]:checked")[0].id;

            //i ponovo kroz switch prolazimo i obrađujemo svaki zahtev
            switch ($("input[name=http_zahtev]:checked")[0].id) {
                case "get":
                    //kada je get u pitanju
                    //proveravamo koja je tabela
                    if (tabela == "radio_avion") {
                        $.getJSON("http://localhost:80/aerodrom/avion", function (data) {

                            document.getElementById("get_odgovor").innerHTML = JSON.stringify(data, null, 2);
                        });
                    } else if (tabela == "radio_drzava") {
                        $.getJSON("http://localhost:80/aerodrom/drzava", function (data) {

                            document.getElementById("get_odgovor").innerHTML = JSON.stringify(data, null, 2);
                        });
                    }
                    else if (tabela == "radio_let") {
                        $.getJSON("http://localhost:80/aerodrom/let", function (data) {

                            document.getElementById("get_odgovor").innerHTML = JSON.stringify(data, null, 2);
                        });
                    }
                    else if (tabela == "radio_pilot") {
                        $.getJSON("http://localhost:80/aerodrom/pilot", function (data) {

                            document.getElementById("get_odgovor").innerHTML = JSON.stringify(data, null, 2);
                        });
                    }
                    else if (tabela == "radio_ruta") {
                        $.getJSON("http://localhost:80/aerodrom/ruta", function (data) {

                            document.getElementById("get_odgovor").innerHTML = JSON.stringify(data, null, 2);
                        });
                    }
                    break;
                case "post":
                    if (tabela == "radio_avion") {
                        // kada je post zahtev u pitanju, potrebno je da 
                        // prikupimo podatke koje hoćemo da pošaljemo iz forme
                        var values = {
                            "RegBroj": parseInt($("#kategorija_odabir").val()),
                            "NazivAviona": $("input[name=naziv_avion]").val(),
                            "MaxBrojPutnika": parseInt($("#kategorija_odabir").val()),
                            "GodinaProizvodnje": parseInt($("#kategorija_odabir").val())
                        };
                        //ispisaćemo te podatke u konzoli kako bismo bili siguri da dobijamo dobar izlaz
                        //konzoli pristupamo u brauzeru sa CTRL+Shift+i i biramo tab Console
                        console.log(values);
                        //post zahtev se obrađuje na sličan način kao get
                        //potrebna su nam dva parametra u funkciji post
                        //url na koji šaljemo podatke
                        //koje podatke šaljemo
                        //i success funkcija u okviru koje prikazujemo odgovor sa servera
                        $.post("http://localhost:80/aerodrom/avion", JSON.stringify(values), function (data) {
                            alert("Odgovor od servera> " + data['poruka']);
                        });
                    } else if (tabela == "radio_drzava") {
                        var values = {
                            "naslov": $("input[name=naslov_novosti]").val(),
                            "tekst": $("#tekst_novosti").val(),
                            "kategorija_id": parseInt($("#kategorija_odabir").val())
                        };

                        console.log(values);

                        $.post("http://localhost:80/aerodrom/drzava", JSON.stringify(values), function (data) {
                            alert("Odgovor od servera> " + data['poruka']);
                        });
                    }
                    else if (tabela == "radio_let") {

                        var values = {
                            "naslov": $("input[name=naslov_novosti]").val(),
                            "tekst": $("#tekst_novosti").val(),
                            "kategorija_id": parseInt($("#kategorija_odabir").val())
                        };


                        $.post("http://localhost:80/aerodrom/let", JSON.stringify(values), function (data) {
                            alert("Odgovor od servera> " + data['poruka']);
                        });
                    }
                    else if (tabela == "radio_pilot") {

                        var values = {
                            "naslov": $("input[name=naslov_novosti]").val(),
                            "tekst": $("#tekst_novosti").val(),
                            "kategorija_id": parseInt($("#kategorija_odabir").val())
                        };

                        console.log(values);
                        $.post("http://localhost:80/aerodrom/pilot", JSON.stringify(values), function (data) {
                            alert("Odgovor od servera> " + data['poruka']);
                        });
                    }
                    else if (tabela == "radio_ruta") {

                        var values = {
                            "naslov": $("input[name=naslov_novosti]").val(),
                            "tekst": $("#tekst_novosti").val(),
                            "kategorija_id": parseInt($("#kategorija_odabir").val())
                        };
                        console.log(values);
                        $.post("http://localhost:80/aerodrom/ruta", JSON.stringify(values), function (data) {
                            alert("Odgovor od servera> " + data['poruka']);
                        });
                    }
                    break;
                case "put": {
                    if (tabela == "radio_avion") {
                        var values = {
                            "naslov": $("input[name=naslov_novosti_put]").val(),
                            "tekst": $("#tekst_novosti_put").val(),
                            "kategorija_id": parseInt($("#kategorija_odabir_put").val())
                        };

                        console.log(values);


                        $.ajax({
                            url: "http://localhost:80/aerodrom/avion/" + values.kategorija_id + "/",
                            method: "PUT",
                            data: JSON.stringify(values),
                            success: function (data) {
                                console.log(data)
                            },
                            dataType: 'json'
                        })
                            ;
                    } else if (tabela == "radio_drzava") {
                        var values = {
                            "naslov": $("input[name=naslov_novosti_put]").val(),
                            "tekst": $("#tekst_novosti_put").val(),
                            "kategorija_id": parseInt($("#kategorija_odabir_put").val())
                        };

                        console.log(values);


                        $.ajax({
                            url: "http://localhost:80/aerodrom/drzava/" + values.kategorija_id + "/",
                            method: "PUT",
                            data: JSON.stringify(values),
                            success: function (data) {
                                console.log(data)
                            },
                            dataType: 'json'
                        })
                            ;
                    }
                    else if (tabela == "radio_let") {
                        var values = {
                            "naslov": $("input[name=naslov_novosti_put]").val(),
                            "tekst": $("#tekst_novosti_put").val(),
                            "kategorija_id": parseInt($("#kategorija_odabir_put").val())
                        };

                        console.log(values);


                        $.ajax({
                            url: "http://localhost:80/aerodrom/let/" + values.kategorija_id + "/",
                            method: "PUT",
                            data: JSON.stringify(values),
                            success: function (data) {
                                console.log(data)
                            },
                            dataType: 'json'
                        })
                            ;
                    }
                    else if (tabela == "radio_pilot") {
                        var values = {
                            "naslov": $("input[name=naslov_novosti_put]").val(),
                            "tekst": $("#tekst_novosti_put").val(),
                            "kategorija_id": parseInt($("#kategorija_odabir_put").val())
                        };

                        console.log(values);


                        $.ajax({
                            url: "http://localhost:80/aerodrom/pilot/" + values.kategorija_id + "/",
                            method: "PUT",
                            data: JSON.stringify(values),
                            success: function (data) {
                                console.log(data)
                            },
                            dataType: 'json'
                        })
                            ;
                    }
                    else if (tabela == "radio_ruta") {
                        var values = {
                            "naslov": $("input[name=naslov_novosti_put]").val(),
                            "tekst": $("#tekst_novosti_put").val(),
                            "kategorija_id": parseInt($("#kategorija_odabir_put").val())
                        };

                        console.log(values);


                        $.ajax({
                            url: "http://localhost:80/aerodrom/ruta/" + values.kategorija_id + "/",
                            method: "PUT",
                            data: JSON.stringify(values),
                            success: function (data) {
                                console.log(data)
                            },
                            dataType: 'json'
                        })
                            ;
                        /*
                        var values ={
                           "id": parseInt($("input[name=id_kategorije]").val()),
                           "kategorija" : $("input[name=kategorija_naziv_put]").val()
                           
                        }
                        console.log(values);
                        $.ajax({
                            url: "http://localhost:80/aerodrom/rest/api/kategorije/"+values.id+"/",
                            method: "PUT",
                            data:JSON.stringify(values),
                            success: function(data){
                                console.log(data)
                            },
                            dataType:'json'
                        })
                        ;*/
                    }

                }
                    break;
                case "delete":
                    //kod za bonus poene
                    {

                        if (tabela == "radio_avion") {
                            var value = parseInt($("input[name=brisanje]").val());

                            $.ajax({
                                url: "http://localhost:80/aerodrom/avion/" + value + "/",
                                method: "DELETE",
                                success: function (data) {
                                    console.log(data)
                                }
                            })
                                ;
                        } else if (tabela == "radio_drzava") {
                            var value = parseInt($("input[name=brisanje]").val());

                            $.ajax({
                                url: "http://localhost:80/aerodrom/drzava/" + value + "/",
                                method: "DELETE",
                                success: function (data) {
                                    console.log(data)
                                }
                            })
                                ;
                        }
                        else if (tabela == "radio_let") {
                            var value = parseInt($("input[name=brisanje]").val());

                            $.ajax({
                                url: "http://localhost:80/aerodrom/let/" + value + "/",
                                method: "DELETE",
                                success: function (data) {
                                    console.log(data)
                                }
                            })
                                ;
                        }
                        else if (tabela == "radio_pilot") {
                            var value = parseInt($("input[name=brisanje]").val());

                            $.ajax({
                                url: "http://localhost:80/aerodrom/pilot/" + value + "/",
                                method: "DELETE",
                                success: function (data) {
                                    console.log(data)
                                }
                            })
                                ;
                        }
                        else if (tabela == "radio_ruta") {
                            var value = parseInt($("input[name=brisanje]").val());

                            $.ajax({
                                url: "http://localhost:80/aerodrom/ruta/" + value + "/",
                                method: "DELETE",
                                success: function (data) {
                                    console.log(data)
                                }
                            })
                                ;
                        }
                        
                    }

                    break;
                default:
                    console.log("default");
            }
        }
    }
    $("input[name=http_zahtev]").on('click',prikaziBlok);
    $("input[name=odabir_tabele]").on('click',resetHTTP);
   // $("button").on('click', posaljiZahtev);
</script>
</html>