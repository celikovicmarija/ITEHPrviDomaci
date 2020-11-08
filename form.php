<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "aerodrom";
$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Basic Search form using mysqli</title>
<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    
<div class="container">
<label>Search</label>
<form action="" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<label for="tabela_odabir">Tabela:</label>
            <select name="tabela_odabir" id="tabela_odabir">
                <option value="0">avion</option>
                <option value="1">drzava</option>
                <option value="2">let</option>
                <option value="3">pilot</option>
                <option value="4">uta</option>
            </select>

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $('tabela_odabira').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var value = $option.val();//to get content of "value" attrib
    var text = $option.text();//to get <option>Text</option> content
});
</script>
    <?php
           // $table=$("#tabela_odabir").val();
           //$sql = 'SELECT * FROM '.$table;
           $table='drzava';
           echo " Chosen table is ".$table;
if( isset($_GET['search']) ){
   
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM drzava WHERE NazivDrzave ='$name'";
    switch($table){
        case "avion":
            $sql = "SELECT * FROM avion WHERE NazivAviona ='$name'";
        break;
        case "drzava":
            $sql = "SELECT * FROM drzava WHERE NazivDrzave ='$name'";
        break;
        case "let":
            $sql = "SELECT * FROM let WHERE DatumLeta ='$name'";
        break;
        case "pilot":
            $sql = "SELECT * FROM pilot WHERE Ime ='$name'";
        break;
        case "ruta":
            $sql = "SELECT * FROM ruta WHERE NazivRute ='$name'";
        break;
        deafault:
             echo "A table wasn't chosen.";

    }
      
}
$result = $con->query($sql);
            ?>

            



<h2>List of countries</h2>
<table id="drzava" class="table table-striped table-responsive">
<tr>
<th>ID</th>
<th>Drzava</th>
</tr>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['DrzavaID']; ?></td>
    <td><?php echo $row['NazivDrzave']; ?></td>
    </tr>
    <?php
}
?>

</table>







</div>
</body>
</html>