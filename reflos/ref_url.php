<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']		='url';
$ref['title']		='URL';
$ref['options']		=array('Encode'=>1, 'Encode (x2)'=>2, 'Decode'=>3, 'Decode (x2)'=>4);
$ref['description'] ='Implementaci&oacute;n de URLencode y URLdecode';

function url($txt, $opt){
	switch($opt){
		case 1:
			$txt = urlencode($txt);
			break;
		case 2:
			$txt = urlencode($txt);
			$txt = urlencode($txt);
			break;
		case 3:
			$txt = urldecode($txt);
			break;
		case 4:
			$txt = urldecode($txt);
			$txt = urldecode($txt);
			break;
		
	}
	return $txt;
}
?>