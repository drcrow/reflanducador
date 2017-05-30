<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']		='file_name';
$ref['title']		='File Name';
$ref['options']		=array('Simple'=>0, 'Multiline'=>1);
$ref['description'] = 'Formatea una cadena para poder usarla como nombre de archivo sin problemas';

function file_name($txt){
	$txt = strtolower($txt);
	$txt = str_replace(chr(195).chr(161), "a", $txt);
	$txt = str_replace(chr(195).chr(169), "e", $txt);
	$txt = str_replace(chr(195).chr(173), "i", $txt);
	$txt = str_replace(chr(195).chr(179), "o", $txt);
	$txt = str_replace(chr(195).chr(186), "u", $txt);
	$txt = str_replace(chr(195).chr(177), "n", $txt);
	
	$txt = str_replace(chr(227).chr(161), "a", $txt);
	$txt = str_replace(chr(227).chr(169), "e", $txt);
	$txt = str_replace(chr(227).chr(173), "i", $txt);
	$txt = str_replace(chr(227).chr(179), "o", $txt);
	$txt = str_replace(chr(227).chr(186), "u", $txt);
	$txt = str_replace(chr(227).chr(177), "n", $txt);
	
	$txt = str_replace(chr(10), "", $txt);
	$txt = str_replace(chr(13), "", $txt);
	
	$txt = str_replace(" ", "_", $txt);
	
	for($i=0; $i<strlen($txt); $i++){
		$c = substr($txt, $i, 1);
		if((ord($c)>=97 and ord($c)<=122) or (ord($c)>=48 and ord($c)<=57)){
			$res.=$c;
		}else{
			$res.='_';	
		}
	}
	
	$txt = $res;
	
	while(strpos($txt, '__')!==false){
		$txt = str_replace('__', '_', $txt);
	}
	
	
	return $txt;
}
?>