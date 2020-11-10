<?php
class pilot{

    public $JMBG;
    public $Drzavljanstvo;
    public $Ime;
    public $Prezime;
    public $DatumRodjenja;
    public $DatumZaposlenja;
    public $BrojSati;

    public function __construct($JMBG = null, $Drzavljanstvo = null, $Ime = null, $Prezime = null,$DatumRodjenja=null, $DatumZaposlenja=null,$BrojSati=null)
    {
        $this->JMBG = $JMBG;
        $this->Drzavljanstvo = $Drzavljanstvo;
        $this->Ime = $Ime;
        $this->Prezime = $Prezime;
        $this->DatumRodjenja = $DatumRodjenja;
        $this->DatumZaposlenja = $DatumZaposlenja;
        $this->BrojSati = $BrojSati;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM pilot";
        return $conn->query($q);
    }

    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM pilot WHERE JMBG=$id";
        $array = array();
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public static function deleteById($JMBG, mysqli $conn)
    {
        $q = "DELETE FROM pilot WHERE JMBG=$JMBG";
        return $conn->query($q);
    }

    public static function add($JMBG,$Drzavljanstvo, $Ime, $Prezime,$DatumRodjenja, $DatumZaposlenja,$BrojSati, mysqli $conn)
    {
        $q = "INSERT INTO pilot(JMBG, Drzavljanstvo, Ime, Prezime,DatumRodjenja, DatumZaposlenja, BrojSati) values('$JMBG','$Drzavljanstvo','$Ime', '$Prezime','$DatumRodjenja','$DatumZaposlenja','$BrojSati')";
        return $conn->query($q);
    }

    public static function update($JMBG,$Drzavljanstvo, $Ime, $Prezime,$DatumRodjenja,$DatumZaposlenja, $BrojSati, mysqli $conn)
    {
        $q = "UPDATE pilot set Drzavljanstvo='$Drzavljanstvo', Ime='$Ime', Prezime='$Prezime', DatumRodjenja='$DatumRodjenja', DatumZaposlenja='$DatumZaposlenja', BrojSati='$BrojSati' where JMBG=$JMBG";
        return $conn->query($q);
    }
}


?>