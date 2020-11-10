<?php
  //  include "Database.php";
    require "model/avion.php";
    require "model/drzava.php";
    require "model/let.php";
    require "model/pilot.php";
    require "model/ruta.php";
    require "dbBroker.php";

 
 //   $mydb = new Database('aerodrom');
    
    if(isset($_POST["posalji"]) && $_POST["posalji"]="Posalji zahtev"){
        //AVION
        if($_POST["regbroj_avion"]!=null && $_POST["naziv_avion"]!=null && $_POST["putnici_avion"]!=null && $_POST["godproizvodnje_avion"]!=null){
            //$niz = ["RegBroj"=> "'".$_POST["regbroj_avion"]."'", "NazivAviona"=>"'".$_POST["naziv_avion"]."'", "MaxBrojPutnika"=>"'".$_POST["putnici_avion"]."'",  "GodinaProizvodne"=>"'".$_POST["godproizvodnje_avion"]."'"];
            $success=Avion::add($_POST["regbroj_avion"],$_POST["naziv_avion"],$_POST["putnici_avion"],$_POST["godproizvodnje_avion"],$conn);
            if($success){?> 
                <script> alert('Vrednosti ubačene');</script><?php
            } else{
                    ?>
                <script> alert('Vrednosti nisu ubačene')</script><?php
            }
            /*if($mydb->insert("avion", "RegBroj, NazivAviona, MaxBrojPutnika, GodinaProizvodnje", $niz)){
                echo "vrednosti ubacene";
            } else{
                echo "vrednosti nisu ubacene";
            }
            $_POST = array();
            exit();*/
        }   
        //Ne radi iz nekog razloga NE RADI
        //DRZAVA, radi samo treba da se ponovo ubace sve vrednosti, auto increment ne radi
       else if($_POST["d_drzava"]!=null && $_POST["naziv_drzava"]!=null ){
          /* echo "Hello";
           $naziv=$_POST["naziv_drzava"];
           $id=$_POST["id_drzava"];
            $niz = ["DrzavaID"=>$id, "NazivDrzave"=> "'".$naziv."'"];*/
            $success=Drzava::add($_POST["naziv_drzava"],$_POST["d_drzava"], $conn);
            if($success){?> 
                <script> alert('Vrednosti ubačene');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu ubačene')</script><?php
            }
        
            /*
            if($mydb->insert("drzava", "DrzavaID, NazivDrzave",$niz)){?> 
            <script> alert('Vrednosti ubačene');</script><?php
        } else{?>
            <script> alert('Vrednosti nisu ubačene')</script><?php
        }
           // $_POST = array();
          //  exit();*/
        }  
        //////
        //LET
        else if($_POST["idruta_let"]!=null && $_POST["idpilot_let"]!=null && $_POST["drzavljanstvo_let"]!=null && $_POST["regbravion_let"]!=null && $_POST["datum_let"]!=null && $_POST["trajanje_let"]!=null){
          //  $niz = ["BrojRute"=> $_POST["idruta_let"], "PilotID"=>$_POST["idpilot_let"], "Drzavljanstvo"=>$_POST["drzavljanstvo_let"], "RegBroj"=>$_POST["regbravion_let"],  "DatumLeta"=>"NOW()",  "TrajanjeLeta"=>$_POST["trajanje_let"]];
            $success=Let::add($_POST["idruta_let"], $_POST["idpilot_let"],$_POST["drzavljanstvo_let"],$_POST["regbravion_let"],$_POST["datum_let"],$_POST["trajanje_let"],$conn);
            if($success){?> 
                <script> alert('Vrednosti ubačene');</script><?php

            } else{?>
                <script> alert('Vrednosti nisu ubačene')</script><?php
            }
            /*
            
            if($mydb->insert("let","BrojRute, PilotID, Drzavljanstvo, RegBroj, DatumLeta, TrajanjeLeta", $niz)){?> 
                <script> alert('Vrednosti ubačene');</script><?php

            } else{?>
                <script> alert('Vrednosti nisu ubačene')</script><?php
            }
            $_POST = array();
            exit();*/
        }

        //PILOT
        //ne cita jmbg dobro
        else if( $_POST['jmbg_pilot']!=null && $_POST["iddrzavljanstvo_pilot"]!=null && $_POST["ime_pilot"]!=null && $_POST["prezime_pilot"]!=null && $_POST["datrodj_pilot"]!=null && $_POST["datzap_pilot"]!=null && $_POST["sati_pilot"]!=null){
            //echo "OVA GRANA";
            //"'".$_POST["datrodj_pilot"]."'"
            //"'".$_POST["datzap_pilot"]."'"
           // $niz = ["JMBG"=>"'".$_POST['jmbg_pilot']."'", "Drzavljanstvo"=>$_POST["iddrzavljanstvo_pilot"], "Ime"=>"'".$_POST["ime_pilot"]."'",  "Prezime"=>"'".$_POST["prezime_pilot"]."'",  "DatumRodjenja"=>"NOW()",  "DatumZaposlenja"=>"NOW()",  "BrojSati"=>$_POST["sati_pilot"]];
            $success=Pilot::add($_POST['jmbg_pilot'],$_POST["iddrzavljanstvo_pilot"],$_POST["ime_pilot"],$_POST["prezime_pilot"],$_POST["datzap_pilot"],$_POST["datzap_pilot"],$_POST["sati_pilot"],$conn);
            if($success){?> 
                <script> alert('Vrednosti ubačene');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu ubačene')</script><?php
            }
            //echo $niz;
            /*if($mydb->insert("pilot", "JMBG, Drzavljanstvo, Ime, Prezime, DatumRodjenja, DatumZaposlenja, BrojSati", $niz)){
                echo "vrednosti ubacene";
            } else{
                echo "vrednosti nisu ubacene";
            }
            $_POST = array();
            exit();*/
        }    
        //RUTA
        else if($_POST["broj_ruta"]!=null && $_POST["naziv_ruta"]!=null && $_POST["brpresedanja_ruta"]!=null && $_POST["idpocetak_ruta"]!=null && $_POST["idkraj_ruta"]!=null){
          //  $niz = ["BrojRute"=> "'".$_POST["broj_ruta"]."'", "NazivRute"=>"'".$_POST["naziv_ruta"]."'", "BrojPresedanja"=>"'".$_POST["brpresedanja_ruta"]."'",  "PocetnaTacka"=>"'".$_POST["idpocetak_ruta"]."'",  "KrajnjaTacka"=>"'".$_POST["idkraj_ruta"]."'"];
           $success=Ruta::add($_POST["broj_ruta"],$_POST["naziv_ruta"],$_POST["brpresedanja_ruta"],$_POST["idpocetak_ruta"],$_POST["idkraj_ruta"],$conn);
            if($success){?> 
                <script> alert('Vrednosti ubačene');</script><?php
                echo "vrednosti ubacene";
            } else{
                echo "vrednosti nisu ubacene";?>
                <script> alert('Vrednosti nisu ubačene')</script><?php
            }
        
        /*  if($mydb->insert("ruta", "BrojRute, NazivRute, BrojPresedanja, PocetnaTacka, KrajnjaTacka", $niz)){?> 
            <script> alert('Vrednosti ubačene');</script><?php
            echo "vrednosti ubacene";
        } else{
            echo "vrednosti nisu ubacene";?>
            <script> alert('Vrednosti nisu ubačene')</script><?php
        }
            $_POST = array();
            exit();*/
        }   
        //////////UPDATE 
        //AVION
        else if($_POST["regbr_avion"]!=null && $_POST["naziv_avion_put"]!=null && $_POST["putnici_avion_put"]!=null && $_POST["godproizvodnje_avion_put"]!=null){
          //  $niz = ["'".$_POST["naziv_avion_put"]."'", $_POST["putnici_avion_put"], $_POST["godproizvodnje_avion_put"]];
           // echo "Ovde sam";
           $success=Avion::update($_POST["regbr_avion"],$_POST["naziv_avion_put"],$_POST["putnici_avion_put"],$_POST["godproizvodnje_avion_put"],$conn);
           if($success){?> 
            <script> alert('Vrednosti izmenjene');</script><?php
        } else{?>
            <script> alert('Vrednosti nisu izmenjene')</script><?php
        }
           /* if($mydb->update("avion","RegBroj",$_POST["regbr_avion"], ["NazivAviona", "MaxBrojPutnika", "GodinaProizvodnje"],$niz)){
                echo "vrednosti izmenjene";
            } else{
                echo "vrednosti nisu izmenjene";
            }
            $_POST = array();
            exit();*/
        }   
        //DRZAVA

       else if($_POST["id_drzava"]!=null && $_POST["naziv_drzava_put"]!=null){
          // $naziv="'".$_POST["naziv_drzava_put"]."'";
           // $niz = [$naziv];
           $success=Drzava::update($_POST["id_drzava"], $_POST["naziv_drzava_put"], $conn);
            if($success){?> 
                <script> alert('Vrednosti izmenjene');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu izmenjene')</script><?php
            }
         /*   
           if($mydb->update("drzava", "DrzavaID",$_POST["id_drzava"],["NazivDrzave"],$niz)){?> 
            <script> alert('Vrednosti izmenjene');</script><?php
        } else{?>
            <script> alert('Vrednosti nisu izmenjene')</script><?php
        }
            $_POST = array();
            exit();*/
        }  
        //////
        //LET
        //ne radi
        else if($_POST["idruta_let_put"]!=null && $_POST["idpilot_let_put"]!=null && $_POST["drzavljanstvo_let_put"]!=null && $_POST["regbravion_let_put"]!=null && $_POST["datum_let_put"]!=null && $_POST["trajanje_let_put"]!=null){
            //$niz = [ $_POST["idpilot_let_put"], $_POST["drzavljanstvo_let_put"],$_POST["regbravion_let_put"], "NOW()", $_POST["trajanje_let_put"]];
           
            $success=Let::update($_POST["idruta_let_put"], $_POST["idpilot_let_put"],$_POST["drzavljanstvo_let_put"],$_POST["regbravion_let_put"],$_POST["datum_let_put"],$_POST["trajanje_let_put"],$conn);
            if($success){?> 
                <script> alert('Vrednosti izmenjene');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu izmenjene')</script><?php
            } /* if($mydb->update("let","BrojRute", $_POST["idruta_let_put"],[ "PilotID", "Drzavljanstvo", "RegBroj", "DatumLeta", "TrajanjeLeta"], $niz)){
                echo "vrednosti izmenjene";
            } else{
                echo "vrednosti nisu izmenjene";
            }
            $_POST = array();
            exit();*/
        }

        //PILOT
        else if($_POST["jmbg_pilot_put"]!=null && $_POST["iddrzavljanstvo_pilot_put"]!=null && $_POST["ime_pilot_put"]!=null && $_POST["prezime_pilot_put"]!=null  && $_POST["sati_pilot_put"]!=null){
          //  $niz = [$_POST["iddrzavljanstvo_pilot_put"],"'".$_POST["ime_pilot_put"]."'", "'".$_POST["prezime_pilot_put"]."'",$_POST["sati_pilot_put"]];
            $success=Pilot::update($_POST['jmbg_pilot_put'],$_POST["iddrzavljanstvo_pilot_put"],$_POST["ime_pilot_put"],$_POST["prezime_pilot_put"],"NOW()","NOW()",$_POST["sati_pilot_put"],$conn);
            if($success){?> 
                <script> alert('Vrednosti izmenjene');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu izmenjene')</script><?php
            }
            /*if($mydb->update("pilot","JMBG", $_POST["jmbg_pilot_put"], ["Drzavljanstvo", "Ime", "Prezime", "BrojSati"], $niz)){
                echo "vrednosti izmenjene";
            } else{
                echo "vrednosti nisu izmenjene";
            }
            $_POST = array();
            exit();*/
        }    
        //RUTA
        //ne radi
        else if($_POST["id_ruta"]!=null && $_POST["naziv_ruta_put"]!=null && $_POST["brpresedanja_ruta_put"]!=null && $_POST["idpocetak_ruta_put"]!=null && $_POST["idkraj_ruta_put"]!=null){
           // $niz = [ "'".$_POST["naziv_ruta_put"]. "'", $_POST["brpresedanja_ruta_put"],  $_POST["idpocetak_ruta_put"],$_POST["idkraj_ruta_put"]];
            $success=Ruta::update($_POST["id_ruta"],$_POST["naziv_ruta_put"],$_POST["brpresedanja_ruta_put"],$_POST["idpocetak_ruta_put"],$_POST["idkraj_ruta_put"],$conn);
            if($success){?> 
                <script> alert('Vrednosti izmenjene');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu izmenjene')</script><?php
            }
            /*if($mydb->update("ruta","BrojRute", $_POST["id_ruta"],[ "NazivRute", "BrojPresedanja", "PocetnaTacka", "KrajnjaTacka"], $niz)){?> 
                <script> alert('Vrednosti izmenjene');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu izmenjene')</script><?php
            }
            $_POST = array();
            exit();*/
        }
        
        
        //Brisanje 
        else if($_POST["odabir_tabele"]!=null &&  $_POST["brisanje_avion"]!=null){
         //   $tabela =$_POST["odabir_tabele"]; 
          //  $id = "RegBroj";
            $id_val = $_POST["brisanje_avion"];
           $success= Avion::deleteById($id_val,$conn);
           if($success){?> 
            <script> alert('Vrednosti obrisane');</script><?php
        } else{?>
            <script> alert('Vrednosti nisu obrisane')</script><?php
        
        }
            /*if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();*/
        } 
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_drzava"]!=null && $_POST["odabir_tabele"]!=null){
           // $tabela = $_POST["odabir_tabele"];
           // $id = "DrzavaID";
            $id_val = $_POST["brisanje_drzava"];
            $success= Drzava::deleteById($id_val,$conn);
            if($success){?> 
                <script> alert('Vrednosti obrisane');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu obrisane')</script><?php
            
            }
            /*if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();*/
        }
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_let"]!=null && $_POST["odabir_tabele"]!=null){
            //$tabela = $_POST["odabir_tabele"];
           // $id = "BrojRute";
            $id_val = $_POST["brisanje_let"];
            $success= Let::deleteById($id_val,$conn);
            if($success){?> 
                <script> alert('Vrednosti obrisane');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu obrisane')</script><?php
            
            }/*
            if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();*/
        }
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_pilot"]!=null && $_POST["odabir_tabele"]!=null){
          //  $tabela = $_POST["odabir_tabele"];
          //  $id = "JMBG";
            $id_val = $_POST["brisanje_pilot"];
            $success= Pilot::deleteById($id_val,$conn);
            if($success){?> 
                <script> alert('Vrednosti obrisane');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu obrisane')</script><?php
            
            }
           /* if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();*/
        }
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_ruta"]!=null && $_POST["odabir_tabele"]!=null){
            $tabela = $_POST["odabir_tabele"];
            $id = "BrojRute";
            $id_val = $_POST["brisanje_ruta"];
            $success= Ruta::deleteById($id_val,$conn);
            if($success){?> 
                <script> alert('Vrednosti obrisane');</script><?php
            } else{?>
                <script> alert('Vrednosti nisu obrisane')</script><?php
            }
            /*if($mydb->delete($tabela,$id,$id_val)){
                echo "red obrisan";
            }else{
                echo "greska prilikom brisanja";
            }
            $_POST = array();
            exit();*/
        }else {
            if( $_POST["odabir_tabele"]!= null){
               $tabela = $_POST["odabir_tabele"];
                 switch($tabela){
                     case "avion":$myArray=Avion::getAll($conn);
                    break;
                     case "drzava": $myArray=Drzava::getAll($conn);break;
                     case "let": $myArray=Let::getAll($conn);break;
                     case "pilot": $myArray=Pilot::getAll($conn);break;
                     case "ruta": $myArray=Ruta::getAll($conn);break;
                     default: echo "err";
                 }
                 foreach($myArray as $row) {
                    print("<pre>".print_r($row,true)."</pre>");
                
                }?>
                <script> 
  
  
// Access the array elements 
var passedArray =  
    <?php echo json_encode($myArray); ?>; 
       
// Display the array elements 
for(var i = 0; i < passedArray.length; i++){ 
    document.write(passedArray[i]); 
    console.log('I am here');
    document.getElementById("get_odgovor").innerHTML = JSON.stringify(passedArray[i],null,2);
} 
</script> <?php
               //  $result=  $mydb->select($tabela, "*", null, null, null);
         }
           
        }
    }
?>