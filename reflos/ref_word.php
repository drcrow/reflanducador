<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']		='word';
$ref['title']		='Word';
$ref['options']		=array('Tildes'=>1, 'Cuotes'=>2, 'All'=>3);
$ref['description'] ='Quita las porquer&iacute;as que hace Office (no solo Word) con los textos';

function word($txt, $opt){
	switch($opt){
		case 1:
			$txt = word_tildes($txt);
			break;
		case 2:
			$txt = word_cuotes($txt);
			break;
		case 3:
			$txt = word_tildes($txt);
			$txt = word_cuotes($txt);
			break;
	}
	return $txt;
}



function word_cuotes($txt){
	
	$txt = str_replace(chr(226).chr(128).chr(156), "\"", $txt);
	$txt = str_replace(chr(226).chr(128).chr(157), "\"", $txt);
	$txt = str_replace(chr(226).chr(128).chr(152), "'", $txt);
	$txt = str_replace(chr(226).chr(128).chr(153), "'", $txt);
	
	return $txt;
}


function word_tildes($txt){
	
	$txt = str_replace(chr(195).chr(161), "á", $txt);
	$txt = str_replace(chr(195).chr(169), "é", $txt);
	$txt = str_replace(chr(195).chr(173), "í", $txt);
	$txt = str_replace(chr(195).chr(179), "ó", $txt);
	$txt = str_replace(chr(195).chr(186), "ú", $txt);
	$txt = str_replace(chr(195).chr(177), "ñ", $txt);
	
	$txt = str_replace(chr(227).chr(161), "á", $txt);
	$txt = str_replace(chr(227).chr(169), "é", $txt);
	$txt = str_replace(chr(227).chr(173), "í", $txt);
	$txt = str_replace(chr(227).chr(179), "ó", $txt);
	$txt = str_replace(chr(227).chr(186), "ú", $txt);
	$txt = str_replace(chr(227).chr(177), "ñ", $txt);
	
	return $txt;
}
?>