<?php
class Drzava{
    public $DrzavaID;
    public $NazivDrzave;

    public function __construct($DrzavaID = null, $NazivDrzave = null)
    {
        $this->DrzavaID = $DrzavaID;
        $this->NazivDrzave = $NazivDrzave;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM drzava";
        return $conn->query($q);
    }

    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM drzava WHERE DrzavaID=$id";
        $array = array();
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    public static function deleteById($DrzavaID, mysqli $conn)
    {
        $q = "DELETE FROM drzava WHERE DrzavaID=$DrzavaID";
        return $conn->query($q);
    }

    public static function add($NazivDrzave, mysqli $conn)
    {
        $q = "INSERT INTO avion(NazivDrzave) values('$NazivDrzave')";
        return $conn->query($q);
    }

    public static function update($DrzavaID,$NazivDrzave, mysqli $conn)
    {
        $q = "UPDATE avion set NazivDrzave='$NazivDrzave' where DrzavaID=$DrzavaID";
        return $conn->query($q);
    }

}



?>