<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']		= 'encrypt';
$ref['title']		= 'Encrypt';
if(function_exists('hash_algos')){
	$ref['options']		= array_flip(hash_algos());
}else{
	$ref['options']		= array('ERROR!'=>0);
}
$ref['description'] = 'Encriptaci&oacute;n con distintos algoritmos';

function encrypt($txt, $par=0){
	
	if(function_exists('hash_algos')){
		$f = hash_algos();
		$sf = $f[$par];
		return hash($sf, $txt);
	}else{
		return 'La versión de PHP no soporta las funciones requeridas';
	}
	
}
?>