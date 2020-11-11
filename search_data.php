<?php
include 'Search.php';
$search = new Search();
$sqlConditions = array();
if(!empty($_POST['type']) && (!empty($_POST['keywords']) || !empty($_POST['sortValue']))){
    if($_POST['type'] == 'search'){
        $sqlConditions['search'] = array('Ime'=>$_POST['keywords'],'Prezime'=>$_POST['keywords'], 'Drzavljanstvo'=>$_POST['keywords'],'JMBG'=>$_POST['keywords']);
        $sqlConditions['order_by'] = 'Ime DESC';
    }elseif($_POST['type'] == 'sort'){
		if($_POST['keywords']) {
			$sqlConditions['search'] = array('Ime'=>$_POST['keywords'],'Prezime'=>$_POST['keywords'],'Drzavljanstvo'=>$_POST['keywords'],'JMBG'=>$_POST['keywords']);
		}
        $sortValue = $_POST['sortValue'];
        $sortArribute = array(
            'hrs_asc' => array(
                'order_by' => 'BrojSati ASC'
            ),
            'hrs_desc' => array(
                'order_by' => 'BrojSati DESC'
            )
            ,
            'name_asc'=>array(
                'order_by'=>'Ime ASC'
            )
            ,
            'name_desc'=>array(
                'order_by'=>'Ime DESC'
            ),
            'sn_asc'=>array(
                'order_by'=>'Prezime ASC'
            )
            ,
            'sn_desc'=>array(
                'order_by'=>'Prezime DESC'
            )
            ,
            'age_asc'=>array(
                'order_by'=>'DatumRodjenja ASC'
            )
            ,
            'age_desc'=>array(
                'order_by'=>'DatumRodjenja DESC'
            )
        );
        $sortKey = key($sortArribute[$sortValue]);
        $sqlConditions[$sortKey] = $sortArribute[$sortValue][$sortKey];
    }
}else{
    $sqlConditions['order_by'] = 'Ime DESC';
}
$pilots = $search->searchResult($sqlConditions);

if(!empty($pilots)){    
	foreach($pilots as $pilot){

		echo '<tr>';
		echo '<td>'.$pilot['JMBG'].'</td>';
		echo '<td>'.$pilot['Drzavljanstvo'].'</td>';
		echo '<td>'.$pilot['Ime'].'</td>';
		echo '<td>'.$pilot['Prezime'].'</td>';
		echo '<td>'.$pilot['DatumRodjenja'].'</td>';
        echo '<td>'.$pilot['DatumZaposlenja'].'</td>';
        echo '<td>'.$pilot['BrojSati'].'</td>';
        echo '</tr>';
	}
}else{
    echo '<tr><td colspan="5">No user(s) found...</td></tr>';
}
exit;