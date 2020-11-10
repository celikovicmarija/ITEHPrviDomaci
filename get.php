<?php 
require "model/avion.php";
require "model/drzava.php";
require "model/let.php";
require "model/pilot.php";
require "model/ruta.php";
require "dbBroker.php";
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
                 echo json_encode($myArray);
         }
    
?>