<?php 
include('inc/header.php');
?>
<script src="js/search.js"></script>
</head>
<?php include('inc/container.php');?>
<div class="container">
	<h2 class="text-center pt-4 pb-2">Filter Search Our Flying Crew!</h2>
	<br>
	<div class="row">		
		<div class="form-group col-md-4 ">
			<input type="text" class="search form-control" id="keywords" name="keywords" placeholder="By customer or item">			
		</div>
		<div class="form-group col-md-4">
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
			  <option value="age_asc">Starost rastući</option>
			  <option value="age_desc">Starost opadajući</option>
			</select>
		</div>
	</div>
    <div class="loading-overlay" style="display: none;"><div class="overlay-content">Loading.....</div></div>
    <table class="table table-striped">
        <thead>
            <tr>
				<th>JMBG</th>
				<th>Državljanstvo</th>
				<th>Ime</th>
				<th>Prezime</th>
				<th>Datum rođenja</th>
				<th>Datum zaposlenja</th>
                <th>Broj sati</th>
            </tr>
        </thead>
        <tbody id="userData">		
			<?php			
			include 'Search.php';
			$search = new Search();
			$pilots = $search->searchResult(array('order_by'=>'JMBG DESC'));      
			if(!empty($pilots)) {
				foreach($pilots as $pilot) {
					echo '
					<tr>
					<td>'.$pilot["JMBG"].'</td>
					<td>'.$pilot["Drzavljanstvo"].'</td>
					<td>'.$pilot["Ime"].'</td>
					<td>$'.$pilot["Prezime"].'</td>
					<td>'.$pilot["DatumRodjenja"].'</td>
                    <td>'.$pilot["DatumZaposlenja"].'</td>
                    <td>'.$pilot["BrojSati"].'</td>
					</tr>';
				}
			} else {
			?>            
				<tr><td colspan="5">No pilot(s) found...</td></tr>
			<?php } ?>
        </tbody>
    </table>	
</div>	
</div>	
<?php include('inc/footer.php');?>