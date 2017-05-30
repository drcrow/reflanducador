<?
//toma los reflanducadores, los ordena, los incluye, genera el array con todos los datos y los ordena
//¿no es hermoso?
$path = 'reflos/';
$dir = opendir($path);
while($f = readdir($dir)){
	if(strpos($f, 'ref_')===0){
		require_once($path.$f);
		$list[] = array('name'=>$ref['name'], 'title'=>$ref['title'], 'options'=>$ref['options'], 'description'=>$ref['description']);
		unset($ref['name']);
		unset($ref['title']);
		unset($ref['options']);
		unset($ref['description']);
	}
	
}
uasort($list, 'ordenator');

function ordenator($a, $b){
	if($a['title']>$b['title']){
		return 1;	
	}elseif($a['title']<$b['title']){
		return -1;
	}else{
		return 0;	
	}
}
?>