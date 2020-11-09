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
        );
        $sortKey = key($sortArribute[$sortValue]);
        $sqlConditions[$sortKey] = $sortArribute[$sortValue][$sortKey];
    }
}else{
    $sqlConditions['order_by'] = 'Ime DESC';
}
$orders = $search->searchResult($sqlConditions);
if(!empty($orders)){    
	foreach($orders as $order){

		echo '<tr>';
		echo '<td>'.$order['JMBG'].'</td>';
		echo '<td>'.$order['Drzavljanstvo'].'</td>';
		echo '<td>'.$order['Ime'].'</td>';
		echo '<td>'.$order['Prezime'].'</td>';
		echo '<td>'.$order['DatumRodjenja'].'</td>';
        echo '<td>'.$order['DatumZaposlenja'].'</td>';
        echo '<td>'.$order['BrojSati'].'</td>';
        echo '</tr>';
	}
}else{
    echo '<tr><td colspan="5">No user(s) found...</td></tr>';
}
exit;