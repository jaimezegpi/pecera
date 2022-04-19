<?php
$fishs = json_decode(file_get_contents('data.json'));
$debug = array();
/*
$fishs = array();
array_push($fishs, array('name'=>'juan1','fish'=>'normal','points'=>100));
array_push($fishs, array('name'=>'juan2','fish'=>'normal','points'=>77));
array_push($fishs, array('name'=>'juan3','fish'=>'normal','points'=>100));
array_push($fishs, array('name'=>'juan4','fish'=>'normal','points'=>77));
*/
$nfishs = count($fishs);

$select_victim = rand(0,($nfishs-1));
$select_target = $select_victim;
while ( $select_target == $select_victim ) {
	
	$select_target = rand(0,($nfishs-1));
}


$victim_points = $fishs[$select_victim]->points;

$victim_points_minus = floor( $victim_points/2 );
$fishs[$select_victim]->points = $fishs[$select_victim]->points-$victim_points_minus;
$fishs[$select_target]->points = $fishs[$select_target]->points+$victim_points_minus;


$fp = fopen('data.json', 'w');
fwrite($fp, json_encode($fishs));
fclose($fp);


array_push($debug, 'Numero de jugadores '.$nfishs);
array_push($debug, 'Víctima '.$fishs[$select_victim]->name);
array_push($debug, 'Monedero Víctima '.$victim_points);
array_push($debug, 'Víctima Perdida -'.$victim_points_minus);
array_push($debug, 'Beneficiario -'.$fishs[$select_target]->name);

var_dump($debug);