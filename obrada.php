<?php
    include "Database.php";
    $mydb = new Database('aerodrom');
    
    if(isset($_POST["posalji"]) && $_POST["posalji"]="Posalji zahtev"){
        //AVION
        if($_POST["regbroj_avion"]!=null && $_POST["naziv_avion"]!=null && $_POST["putnici_avion"]!=null && $_POST["godproizvodnje_avion"]!=null){
            $niz = ["RegBroj"=> "'".$_POST["regbroj_avion"]."'", "NazivAviona"=>"'".$_POST["naziv_avion"]."'", "MaxBrojPutnika"=>"'".$_POST["putnici_avion"]."'",  "GodinaProizvodne"=>"'".$_POST["godproizvodnje_avion"]."'"];
            if($mydb->insert("avion", "RegBroj, NazivAviona, MaxBrojPutnika, GodinaProizvodnje", $niz)){
                echo "vrednosti ubacene";
            } else{
                echo "vrednosti nisu ubacene";
            }
            $_POST = array();
            exit();
        }   
        //DRZAVA, radi samo treba da se ponovo ubace sve vrednosti, auto increment ne radi
       else if($_POST["naziv_drzava"]!=null){
           $naziv=$_POST["naziv_drzava"];
            $niz = ["NazivDrzave"=> "'".$naziv."'"];
            if($mydb->insert("drzava", "NazivDrzave",$niz)){
                echo "vrednosti ubacene";
            } else{
                echo "vrednosti nisu ubacene";
            }
            $_POST = array();
            exit();
        }  
        //////
        //LET
        else if($_POST["idruta_let"]!=null && $_POST["idpilot_let"]!=null && $_POST["drzavljanstvo_let"]!=null && $_POST["regbravion_let"]!=null && $_POST["datum_let"]!=null && $_POST["trajanje_let"]!=null){
            $niz = ["BrojRute"=> $_POST["idruta_let"], "PilotID"=>$_POST["idpilot_let"], "Drzavljanstvo"=>$_POST["drzavljanstvo_let"], "RegBroj"=>$_POST["regbravion_let"],  "DatumLeta"=>"NOW()",  "TrajanjeLeta"=>$_POST["trajanje_let"]];
            echo "OVA GRANA";
            if($mydb->insert("let","BrojRute, PilotID, Drzavljanstvo, RegBroj, DatumLeta, TrajanjeLeta", $niz)){
                echo "vrednosti ubacene";
            } else{
                echo "vrednosti nisu ubacene";
            }
            $_POST = array();
            exit();
        }

        //PILOT
        //ne cita jmbg dobro
        else if( $_POST['jmbg_pilot']!=null && $_POST["iddrzavljanstvo_pilot"]!=null && $_POST["ime_pilot"]!=null && $_POST["prezime_pilot"]!=null && $_POST["datrodj_pilot"]!=null && $_POST["datzap_pilot"]!=null && $_POST["sati_pilot"]!=null){
            echo "OVA GRANA";
            //"'".$_POST["datrodj_pilot"]."'"
            //"'".$_POST["datzap_pilot"]."'"
            $niz = ["JMBG"=>"'".$_POST['jmbg_pilot']."'", "Drzavljanstvo"=>$_POST["iddrzavljanstvo_pilot"], "Ime"=>"'".$_POST["ime_pilot"]."'",  "Prezime"=>"'".$_POST["prezime_pilot"]."'",  "DatumRodjenja"=>"NOW()",  "DatumZaposlenja"=>"NOW()",  "BrojSati"=>$_POST["sati_pilot"]];
            echo $niz;
            if($mydb->insert("pilot", "JMBG, Drzavljanstvo, Ime, Prezime, DatumRodjenja, DatumZaposlenja, BrojSati", $niz)){
                echo "vrednosti ubacene";
            } else{
                echo "vrednosti nisu ubacene";
            }
            $_POST = array();
            exit();
        }    
        //RUTA
        else if($_POST["broj_ruta"]!=null && $_POST["naziv_ruta"]!=null && $_POST["brpresedanja_ruta"]!=null && $_POST["idpocetak_ruta"]!=null && $_POST["idkraj_ruta"]!=null){
            $niz = ["BrojRute"=> "'".$_POST["broj_ruta"]."'", "NazivRute"=>"'".$_POST["naziv_ruta"]."'", "BrojPresedanja"=>"'".$_POST["brpresedanja_ruta"]."'",  "PocetnaTacka"=>"'".$_POST["idpocetak_ruta"]."'",  "KrajnjaTacka"=>"'".$_POST["idkraj_ruta"]."'"];
            if($mydb->insert("ruta", "BrojRute, NazivRute, BrojPresedanja, PocetnaTacka, KrajnjaTacka", $niz)){
                echo "vrednosti ubacene";
            } else{
                echo "vrednosti nisu ubacene";
            }
            $_POST = array();
            exit();
        }   
        //////////UPDATE 
        //AVION
        else if($_POST["regbr_avion"]!=null && $_POST["naziv_avion_put"]!=null && $_POST["putnici_avion_put"]!=null && $_POST["godproizvodnje_avion_put"]!=null){
            $niz = ["'".$_POST["naziv_avion_put"]."'", $_POST["putnici_avion_put"], $_POST["godproizvodnje_avion_put"]];
            echo "Ovde sam";
            if($mydb->update("avion","RegBroj",$_POST["regbr_avion"], ["NazivAviona", "MaxBrojPutnika", "GodinaProizvodnje"],$niz)){
                echo "vrednosti izmenjene";
            } else{
                echo "vrednosti nisu izmenjene";
            }
            $_POST = array();
            exit();
        }   
        //DRZAVA
       else if($_POST["id_drzava"]!=null && $_POST["naziv_drzava_put"]!=null){
           $naziv="'".$_POST["naziv_drzava_put"]."'";
            $niz = [$naziv];
            if($mydb->update("drzava", "DrzavaID",$_POST["id_drzava"],["NazivDrzave"],$niz)){
                echo "vrednosti izmenjene";
            } else{
                echo "vrednosti nisu izmenjene";
            }
            $_POST = array();
            exit();
        }  
        //////
        //LET
        else if($_POST["idruta_let_put"]!=null && $_POST["idpilot_let_put"]!=null && $_POST["drzavljanstvo_let_put"]!=null && $_POST["regbravion_let_put"]!=null && $_POST["datum_let_put"]!=null && $_POST["trajanje_let_put"]!=null){
            $niz = [ $_POST["idpilot_let_put"], $_POST["drzavljanstvo_let_put"],$_POST["regbravion_let_put"], "NOW()", $_POST["trajanje_let_put"]];
            if($mydb->update("let","BrojRute", $_POST["idruta_let_put"],[ "PilotID", "Drzavljanstvo", "RegBroj", "DatumLeta", "TrajanjeLeta"], $niz)){
                echo "vrednosti izmenjene";
            } else{
                echo "vrednosti nisu izmenjene";
            }
            $_POST = array();
            exit();
        }

        //PILOT
        else if($_POST["jmbg_pilot_put"]!=null && $_POST["iddrzavljanstvo_pilot_put"]!=null && $_POST["ime_pilot_put"]!=null && $_POST["prezime_pilot_put"]!=null  && $_POST["sati_pilot_put"]!=null){
            $niz = [$_POST["iddrzavljanstvo_pilot_put"],"'".$_POST["ime_pilot_put"]."'", "'".$_POST["prezime_pilot_put"]."'",$_POST["sati_pilot_put"]];
            if($mydb->update("pilot","JMBG", $_POST["jmbg_pilot_put"], ["Drzavljanstvo", "Ime", "Prezime", "BrojSati"], $niz)){
                echo "vrednosti izmenjene";
            } else{
                echo "vrednosti nisu izmenjene";
            }
            $_POST = array();
            exit();
        }    
        //RUTA
        else if($_POST["id_ruta"]!=null && $_POST["naziv_ruta_put"]!=null && $_POST["brpresedanja_ruta_put"]!=null && $_POST["idpocetak_ruta_put"]!=null && $_POST["idkraj_ruta_put"]!=null){
            $niz = [ "'".$_POST["naziv_ruta_put"]. "'", $_POST["brpresedanja_ruta_put"],  $_POST["idpocetak_ruta_put"],$_POST["idkraj_ruta_put"]];
            if($mydb->update("ruta","BrojRute", $_POST["id_ruta"],[ "NazivRute", "BrojPresedanja", "PocetnaTacka", "KrajnjaTacka"], $niz)){
                echo "vrednosti izmenjene";
            } else{
                echo "vrednosti nisu izmenjene";
            }
            $_POST = array();
            exit();
        }
        
        
        //Brisanje 

        else if($_POST["brisanje"]!=null && $_POST["odabir_tabele"]!=null){
            $tabela = $_POST["odabir_tabele"];
            $id = "RegBroj";
            $id_val = $_POST["brisanje"];
            if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();
        } 
        else if($_POST["odabir_tabele"]!=null &&  $_POST["brisanje_avion"]!=null){
            $tabela =$_POST["odabir_tabele"]; 
            $id = "RegBroj";
            $id_val = $_POST["brisanje_avion"];
            if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();
        } 
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_drzava"]!=null && $_POST["odabir_tabele"]!=null){
            $tabela = $_POST["odabir_tabele"];
            $id = "DrzavaID";
            $id_val = $_POST["brisanje_drzava"];
            if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();
        }
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_let"]!=null && $_POST["odabir_tabele"]!=null){
            $tabela = $_POST["odabir_tabele"];
            $id = "BrojRute";
            $id_val = $_POST["brisanje_let"];
            if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();
        }
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_pilot"]!=null && $_POST["odabir_tabele"]!=null){
            $tabela = $_POST["odabir_tabele"];
            $id = "JMBG";
            $id_val = $_POST["brisanje_pilot"];
            if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();
        }
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_ruta"]!=null && $_POST["odabir_tabele"]!=null){
            $tabela = $_POST["odabir_tabele"];
            $id = "BrojRute";
            $id_val = $_POST["brisanje_ruta"];
            if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();
        }else {
            if( $_POST["odabir_tabele"]!= null){
                 $tabela = $_POST["odabir_tabele"];
                  $result=  $mydb->select($tabela, "*", null, null, null);
         }
           
        }
    }
?>