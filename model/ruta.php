<?php
class ruta{
    public $BrojRute;
    public $NazivRute;
    public $BrojPresedanja;
    public $PocetnaTacka;
    public $KrajnjaTacka;

    public function __construct($BrojRute = null, $NazivRute = null, $BrojPresedanja = null, $PocetnaTacka = null, $KrajnjaTacka=null)
    {
        $this->BrojRute = $BrojRute;
        $this->NazivRute = $NazivRute;
        $this->BrojPresedanja = $BrojPresedanja;
        $this->PocetnaTacka = $PocetnaTacka;
        $this->KrajnjaTacka=$KrajnjaTacka;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM ruta";
        return $conn->query($q);
    }

    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM ruta WHERE BrojRute=$id";
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
        $q = "DELETE FROM ruta WHERE BrojRute=$BrojRute";
        return $conn->query($q);
    }

    public static function add($BrojRute,$NazivRute, $BrojPresedanja, $PocetnaTacka, $KrajnjaTacka, mysqli $conn)
    {
        $q = "INSERT INTO avion(BrojRute, NazivRute, BrojPresedanja, PocetnaTacka, KrajnjaTacka) values('$BrojRute','$NazivRute','$BrojPresedanja', '$PocetnaTacka', '$KrajnjaTacka')";
        return $conn->query($q);
    }

    public static function update($BrojRute,$NazivRute, $BrojPresedanja, $PocetnaTacka, $KrajnjaTacka, mysqli $conn)
    {
        $q = "UPDATE avion set NazivRute='$NazivRute', BrojPresedanja='$BrojPresedanja', PocetnaTacka='$PocetnaTacka',KrajnjaTacka='$KrajnjaTacka' where BrojRute=$BrojRute";
        return $conn->query($q);
    }
}


?>