<?php

    require "model/avion.php";
    require "model/drzava.php";
    require "model/let.php";
    require "model/pilot.php";
    require "model/ruta.php";
    require "db.php";

    if(isset($_POST["posalji"]) && $_POST["posalji"]="Posalji zahtev"  && !isset($_POST["odabir_tabele"])){
        ?>
                <script> alert('Tabela mora biti odabrana! ')</script><?php
    }
    else if(isset($_POST["posalji"]) && $_POST["posalji"]="Posalji zahtev"){
        //AVION
        if($_POST["regbroj_avion"]!=null && $_POST["naziv_avion"]!=null && $_POST["putnici_avion"]!=null && $_POST["godproizvodnje_avion"]!=null){
            $success=Avion::add($_POST["regbroj_avion"],$_POST["naziv_avion"],$_POST["putnici_avion"],$_POST["godproizvodnje_avion"],$conn);
            if($success){?> 
                <script> alert('Avion je ubačen!');</script><?php
            } else{
                    ?>
                <script> alert('Avion nije ubačen!')</script><?php
            }
  
        }   
        //DRZAVA
       else if($_POST["d_drzava"]!=null && $_POST["naziv_drzava"]!=null ){

            $success=Drzava::add($_POST["naziv_drzava"],$_POST["d_drzava"], $conn);
            if($success){?> 
                <script> alert('Država je ubačena!');</script><?php
            } else{?>
                <script> alert('Država nije ubačena!')</script><?php
            }
            $_POST[]=array();

        }  
        //LET
        else if($_POST["idruta_let"]!=null && $_POST["idpilot_let"]!=null && $_POST["drzavljanstvo_let"]!=null && $_POST["regbravion_let"]!=null && $_POST["datum_let"]!=null && $_POST["trajanje_let"]!=null){
          //  $niz = ["BrojRute"=> $_POST["idruta_let"], "PilotID"=>$_POST["idpilot_let"], "Drzavljanstvo"=>$_POST["drzavljanstvo_let"], "RegBroj"=>$_POST["regbravion_let"],  "DatumLeta"=>"NOW()",  "TrajanjeLeta"=>$_POST["trajanje_let"]];
            $success=Let::add($_POST["idruta_let"], $_POST["idpilot_let"],$_POST["drzavljanstvo_let"],$_POST["regbravion_let"],$_POST["datum_let"],$_POST["trajanje_let"],$conn);
            if($success){?> 
                <script> alert('Let je ubačen!');</script><?php

            } else{?>
                <script> alert('Let nije ubačen!')</script><?php
            }

        }

        //PILOT
        else if( $_POST['jmbg_pilot']!=null && $_POST["iddrzavljanstvo_pilot"]!=null && $_POST["ime_pilot"]!=null && $_POST["prezime_pilot"]!=null && $_POST["datrodj_pilot"]!=null && $_POST["datzap_pilot"]!=null && $_POST["sati_pilot"]!=null){
 $success=Pilot::add($_POST['jmbg_pilot'],$_POST["iddrzavljanstvo_pilot"],$_POST["ime_pilot"],$_POST["prezime_pilot"],$_POST["datzap_pilot"],$_POST["datzap_pilot"],$_POST["sati_pilot"],$conn);
            if($success){?> 
                <script> alert('Pilot je ubačen!');</script><?php
            } else{?>
                <script> alert('Pilot nije ubačen!')</script><?php
            }

        }    
        //RUTA
        else if($_POST["broj_ruta"]!=null && $_POST["naziv_ruta"]!=null && $_POST["brpresedanja_ruta"]!=null && $_POST["idpocetak_ruta"]!=null && $_POST["idkraj_ruta"]!=null){
           $success=Ruta::add($_POST["broj_ruta"],$_POST["naziv_ruta"],$_POST["brpresedanja_ruta"],$_POST["idpocetak_ruta"],$_POST["idkraj_ruta"],$conn);
            if($success){?> 
                <script> alert('Ruta je ubačena!');</script><?php
            } else{?>
                <script> alert('Ruta nije ubačena!')</script><?php
            }

        }   
        //////////UPDATE 
        //AVION
        else if($_POST["regbr_avion"]!=null && $_POST["naziv_avion_put"]!=null && $_POST["putnici_avion_put"]!=null && $_POST["godproizvodnje_avion_put"]!=null){

           $success=Avion::update($_POST["regbr_avion"],$_POST["naziv_avion_put"],$_POST["putnici_avion_put"],$_POST["godproizvodnje_avion_put"],$conn);
           if($success){?> 
            <script> alert('Avion je izmenjen!');</script><?php
        } else{?>
            <script> alert('Avion nije izmenjen')</script><?php
        }

        }   
        //DRZAVA

       else if($_POST["id_drzava"]!=null && $_POST["naziv_drzava_put"]!=null){
           $success=Drzava::update($_POST["id_drzava"], $_POST["naziv_drzava_put"], $conn);
            if($success){?> 
                <script> alert('Država je izmenjena!');</script><?php
            } else{?>
                <script> alert('Država nije izmenjena!')</script><?php
            }

        }  
        //////
        //LET
        else if($_POST["idruta_let_put"]!=null && $_POST["idpilot_let_put"]!=null && $_POST["drzavljanstvo_let_put"]!=null && $_POST["regbravion_let_put"]!=null && $_POST["datum_let_put"]!=null && $_POST["trajanje_let_put"]!=null){
            $success=Let::update($_POST["idruta_let_put"], $_POST["idpilot_let_put"],$_POST["drzavljanstvo_let_put"],$_POST["regbravion_let_put"],$_POST["datum_let_put"],$_POST["trajanje_let_put"],$conn);
            if($success){?> 
                <script> alert('Let je izmenjen!');</script><?php
            } else{?>
                <script> alert('Let nije izmenjen!')</script><?php
            } 
        }

        //PILOT
        else if($_POST["jmbg_pilot_put"]!=null && $_POST["iddrzavljanstvo_pilot_put"]!=null && $_POST["ime_pilot_put"]!=null && $_POST["prezime_pilot_put"]!=null  && $_POST["sati_pilot_put"]!=null){
            $success=Pilot::update($_POST['jmbg_pilot_put'],$_POST["iddrzavljanstvo_pilot_put"],$_POST["ime_pilot_put"],$_POST["prezime_pilot_put"],"NOW()","NOW()",$_POST["sati_pilot_put"],$conn);
            if($success){?> 
                <script> alert('Pilot je izmenjen!');</script><?php
            } else{?>
                <script> alert('Pilot nije izmenjen!')</script><?php
            }

        }    
        //RUTA
        else if($_POST["id_ruta"]!=null && $_POST["naziv_ruta_put"]!=null && $_POST["brpresedanja_ruta_put"]!=null && $_POST["idpocetak_ruta_put"]!=null && $_POST["idkraj_ruta_put"]!=null){
            $success=Ruta::update($_POST["id_ruta"],$_POST["naziv_ruta_put"],$_POST["brpresedanja_ruta_put"],$_POST["idpocetak_ruta_put"],$_POST["idkraj_ruta_put"],$conn);
            if($success){?> 
                <script> alert('Ruta je izmenjena!');</script><?php
            } else{?>
                <script> alert('Ruta nije izmenjena!')</script><?php
            }

        }
        
        
        //Brisanje 
        else if($_POST["odabir_tabele"]!=null &&  $_POST["brisanje_avion"]!=null){
            $id_val = $_POST["brisanje_avion"];
           $success= Avion::deleteById($id_val,$conn);
           if($success){?> 
            <script> alert('Avion je obrisan!');</script><?php
        } else{?>
            <script> alert('Avion nije obrisan!')</script><?php
        
        }
        } 
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_drzava"]!=null){
            $id_val = $_POST["brisanje_drzava"];
            $success= Drzava::deleteById($id_val,$conn);
            if($success){?> 
                <script> alert('Država je obrisana!');</script><?php
            } else{?>
                <script> alert('Država nije obrisana!')</script><?php
            
            }
        }
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_let"]!=null){
            $id_val = $_POST["brisanje_let"];
            $success= Let::deleteById($id_val,$conn);
            if($success){?> 
                <script> alert('Let je obrisan!');</script><?php
            } else{?>
                <script> alert('Let nije obrisan! ')</script><?php
            
            }
        }
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_pilot"]!=null){
            $id_val = $_POST["brisanje_pilot"];
            $success= Pilot::deleteById($id_val,$conn);
            if($success){?> 
                <script> alert('Pilot je obrisan!');</script><?php
            } else{?>
                <script> alert('Pilot nije obrisan!')</script><?php
            
            }

        }
        else if($_POST["odabir_tabele"]!=null && $_POST["brisanje_ruta"]!=null){
            $tabela = $_POST["odabir_tabele"];
            $id = "BrojRute";
            $id_val = $_POST["brisanje_ruta"];
            $success= Ruta::deleteById($id_val,$conn);
            if($success){?> 
                <script> alert('Ruta je obrisana!');</script><?php
            } else{?>
                <script> alert('Ruta nije obrisana! ')</script><?php
            }

        }
    } 