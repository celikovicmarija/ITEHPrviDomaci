<?php

class let{
    public $BrojRute;
    public $PilotID;
    public $Drzavljanstvo;
    public $RegBroj;
    public $DatumLeta;
    public $TrajanjeLeta;

    public function __construct($BrojRute = null, $PilotID = null, $Drzavljanstvo = null, $RegBroj = null, $DatumLeta=null, $TrajanjeLeta=null)
    {
        $this->BrojRute = $BrojRute;
        $this->PilotID = $PilotID;
        $this->Drzavljanstvo = $Drzavljanstvo;
        $this->GodinaProizvodnje = $RegBroj;
        $this->DatumLeta=$DatumLeta;
        $this->TrajanjeLeta=$TrajanjeLeta;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM let";
        return $conn->query($q);
    }
 // Produzi ovo sa slozeni
    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM let WHERE BrojRute=$id";
        $array = array();
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public static function deleteById($BrojRute, mysqli $conn)
    {
        $q = "DELETE FROM let WHERE BrojRute=$BrojRute";
        return $conn->query($q);
    }

    public static function add($BrojRute, $PilotID, $Drzavljanstvo, $RegBroj,$DatumLeta,$TrajanjeLeta, mysqli $conn)
    {
        $q = "INSERT INTO let(BrojRute, PilotID, Drzavljanstvo, RegBroj, DatumLeta, TrajanjeLeta) values('$BrojRute','$PilotID','$Drzavljanstvo', '$RegBroj','$DatumLeta','$TrajanjeLeta')";
        echo $q;
        return $conn->query($q);
        
    }

    public static function update($BrojRute,$PilotID, $Drzavljanstvo, $RegBroj,$DatumLeta, $TrajanjeLeta, mysqli $conn)
    {
        $q = "UPDATE let set PilotID='$PilotID', Drzavljanstvo='$Drzavljanstvo', RegBroj='$RegBroj', DatumLeta='$DatumLeta', TrajanjeLeta='$TrajanjeLeta' where BrojRute=$BrojRute";
        return $conn->query($q);
    }
}


?>