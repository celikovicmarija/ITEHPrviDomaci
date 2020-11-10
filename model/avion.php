<?php
class avion{


    public $RegBroj;
    public $NazivAviona;
    public $MaxBrojPutnika;
    public $GodinaProizvodnje;

    public function __construct($RegBroj = null, $NazivAviona = null, $MaxBrojPutnika = null, $GodinaProizvodnje = null)
    {
        $this->RegBroj = $RegBroj;
        $this->NazivAviona = $NazivAviona;
        $this->MaxBrojPutnika = $MaxBrojPutnika;
        $this->GodinaProizvodnje = $GodinaProizvodnje;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM avion";
        return $conn->query($q);
    }

    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM avion WHERE RegBroj=$id";
        $array = array();
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public static function deleteById($RegBroj, mysqli $conn)
    {
        $q = "DELETE FROM avion WHERE RegBroj=$RegBroj";
        return $conn->query($q);
    }

    public static function add($RegBroj, $NazivAviona, $MaxBrojPutnika, $GodinaProizvodnje,mysqli $conn)
    {
        $q = "INSERT INTO avion(RegBroj,NazivAviona, MaxBrojPutnika, GodinaProizvodnje) values('$RegBroj','$NazivAviona','$MaxBrojPutnika', '$GodinaProizvodnje')";
       echo    $q;
        return $conn->query($q);
    }

    public static function update($RegBroj,$NazivAviona, $MaxBrojPutnika, $GodinaProizvodnje, mysqli $conn)
    {
        $q = "UPDATE avion set NazivAviona='$NazivAviona', MaxBrojPutnika='$MaxBrojPutnika', GodinaProizvodnje='$GodinaProizvodnje' where RegBroj=$RegBroj";
        return $conn->query($q);
    }

}?>