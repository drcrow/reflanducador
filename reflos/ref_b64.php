<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']		= 'b64';
$ref['title']		= 'Base64';
$ref['options']		= array('Encode'=>1, 'Decode'=>2);
$ref['description'] = 'Codificaci&oacute;n y decodificaci&oacute;n en Base64';

function b64($txt, $enc=1){
	if($enc==1){
		return base64_encode($txt);
	}else{
		return base64_decode($txt);
	}
}
?>