<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']	='ascii';
$ref['title']	='ASCII';
$ref['options']	=array('code'=>0, 'code[char]'=>1, 'char[code]'=>2);
$ref['description'] ='Lista el c&oacute;digo ASCII de los caracteres ingresados';

function ascii($txt, $opt=0){
	for($i=0; $i<strlen($txt); $i++){
		$l = substr($txt, $i, 1);
		switch($opt){
			case 0:
				$l = ord($l);
				break;
			case 1:
				$l = ord($l).'['.$l.']';
				break;
			case 2:
			$l = $l.'['.ord($l).']';
				break;
		}
		$res[] = $l;
	}
	return implode(' ', $res);
}
?>