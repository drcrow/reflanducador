<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']	='nlTobr';
$ref['title']	='Line Breaks';
$ref['options']		=array('NL 2 BR'=>0, 'BR 2 NL'=>1);
$ref['description'] ='Saltos de l&iacute;nea y tags br';

function nlTobr($txt, $opt=0){
	if($opt==0){
		$txt = nl2br($txt);
	}else{
		$txt = str_replace('<br>', "\n", $txt);
		$txt = str_replace('<br/>', "\n", $txt);
		$txt = str_replace('<br />', "\n", $txt);	
	}
	
	return $txt;
}
?>