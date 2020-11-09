<?php 
include('inc/header.php');
?>
<title>coderszine.com : Demo Filter Search Result with Ajax, PHP & MySQL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/search.js"></script>
<?php include('inc/container.php');?>
<div class="container">
	<h2>Example: Filter Search Result with Ajax, PHP & MySQL</h2>
	<br>
	<div class="row">		
		<div class="form-group col-md-3">
			<input type="text" class="search form-control" id="keywords" name="keywords" placeholder="By customer or item">			
		</div>
		<div class="form-group col-md-2">
			<input type="button" class="btn btn-primary" value="Search" id="search" name="search" />
		</div>
		<div class="form-group col-md-4">
			<select class="form-control" id="sortSearch">
			  <option value="">Sort By</option>
			  <option value="hrs_asc">Broj sati rastući</option>
              <option value="hrs_desc">Broj sati opadajući</option>
			  <option value="name_asc">Ime rastući</option>
			  <option value="name_desc">Ime opadajući</option>
              <option value="sn_asc">Prezime rastući</option>
			  <option value="sn_desc">Prezime opadajući</option>
			</select>
		</div>
	</div>
    <div class="loading-overlay" style="display: none;"><div class="overlay-content">Loading.....</div></div>
    <table class="table table-striped">
        <thead>
            <tr>
				<th>JMBG</th>
				<th>Drzavljanstvo</th>
				<th>Ime</th>
				<th>Prezime</th>
				<th>DatumRodjenja</th>
				<th>DatumZaposlenja</th>
                <th>BrojSati</th>
            </tr>
        </thead>
        <tbody id="userData">		
			<?php			
			include 'Search.php';
			$search = new Search();
			$allOrders = $search->searchResult(array('order_by'=>'id DESC'));      
			if(!empty($allOrders)) {
				foreach($allOrders as $order) {
					echo '
					<tr>
					<td>'.$order["JMBG"].'</td>
					<td>'.$order["Drzavljanstvo"].'</td>
					<td>'.$order["Ime"].'</td>
					<td>$'.$order["Prezime"].'</td>
					<td>'.$order["DatumRodjenja"].'</td>
                    <td>'.$order["DatumZaposlenja"].'</td>
                    <td>'.$order["BrojSati"].'</td>
					</tr>';
				}
			} else {
			?>            
				<tr><td colspan="5">No user(s) found...</td></tr>
			<?php } ?>
        </tbody>
    </table>	
</div>	
</div>	
<?php include('inc/footer.php');?>