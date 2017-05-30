<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']		='html';
$ref['title']		='HTML entities';
$ref['options']		=array('Encode'=>1, 'Encode (x2)'=>2, 'Encode (tildes)'=>3, 'Decode'=>4, 'Decode (x2)'=>5);
$ref['description'] ='En realidad este era el punto central de todo esto. Ahora es la opci&oacute;n que peor funciona...';

function html($txt, $opt=1){
	switch($opt){
		case 1:
			return htmlentities(utf8_decode($txt));
			break;
		case 2:
			return htmlentities(htmlentities(utf8_decode($txt)));
			break;
		case 3:
			return html_tilde($txt);
			break;
		case 4:
			return utf8_encode(html_entity_decode($txt));
			break;
		case 5:
			return html_entity_decode(html_entity_decode($txt));
			break;
		default:
			return $txt;
			
	}
}

function html_tilde($txt){
	$txt = str_replace('á', '&aacute;', $txt);
	$txt = str_replace('é', '&eacute;', $txt);
	$txt = str_replace('í', '&iacute;', $txt);
	$txt = str_replace('ó', '&oacute;', $txt);
	$txt = str_replace('ú', '&uacute;', $txt);
	
	$txt = str_replace('Á', '&Aacute;', $txt);
	$txt = str_replace('É', '&Eacute;', $txt);
	$txt = str_replace('Í', '&Iacute;', $txt);
	$txt = str_replace('Ó', '&Oacute;', $txt);
	$txt = str_replace('Ú', '&Uacute;', $txt);
	
	$txt = str_replace('ñ', '&ntilde;', $txt);
	$txt = str_replace('Ñ', '&Ntilde;', $txt);
	
	return $txt;
}
?>