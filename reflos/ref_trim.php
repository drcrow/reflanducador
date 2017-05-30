<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']	='mytrim';
$ref['title']	='Trim';
$ref['options']	= array('Simple'=>1, 'Multiline'=>2, 'Internal'=>3, 'Multiline & Internal'=>4);
$ref['description'] ='Versi&oacute;n mejorada del trim con algunas cosas extra';

function mytrim($txt, $opt=1){
	switch($opt){
		case 1:	
			$txt = trim($txt);
			break;
		case 2:
			$txt = trim($txt);
			$txt = mytrim_multi($txt);
			break;
		case 3:
			$txt = trim($txt);
			$txt = mytrim_inter($txt);
			break;
		case 4:
			$txt = trim($txt);
			$txt = mytrim_multi($txt);
			$txt = mytrim_inter($txt);
			break;
	}
	
	return $txt;
}

function mytrim_multi($txt){
	$txt = explode("\n", $txt);
	foreach($txt as $line){
		$res[] = trim($line);
	}
	
	return implode("\n", $res);
}

function mytrim_inter($txt){
	while(strpos($txt, '  ')!==false){
		$txt = str_replace('  ', ' ', $txt);
	}
	
	return $txt;
}
?>