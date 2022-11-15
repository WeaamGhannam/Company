<?php
//$sliders=getWhere('sliders','status=1');
//$clients=getWhere('clients','status= 1');
$sliders=getAll('sliders');
$clients=getAll('clients');
$portfolios=getAll('portfolios');
//$services=getWhere('services','status= 1');
$services=getAll('services');
//$projects=getALL('projects');
$contact=getOnce('contact','status= 1');
//$socialmedia=getWhere('socialmedia','status= 1');
$socialmedia=getALL('socialmedia');
$about=getOnce('about','status= 1');
$getProjects=getJoin('portfolios','projects','portfolios.id as PortId,
portfolios.name as PortName,
portfolios.status as PortStatus ,
projects.id as ProjId,img,
projects.name as ProjName,projects.status as ProjStatus');

$list=$about['list'];
$list=explode(",",$list);

//echo '<pre>';
//print_r($getProjects);
//echo '</pre>';
?>