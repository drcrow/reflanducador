<?
header('content-type: text/html; charset: iso-8891-1');
require_once('reflos/make.php');

$txt = trim(base64_decode($_POST['txt']));


//die(mb_detect_encoding($txt));

//listadod de funciones y parámetros
$funcs = $_POST['funcs'];
//saco las comillas
$funcs = str_replace('\"', '', $funcs);
//saco los [
$funcs = str_replace('[', '', $funcs);
//saco los ]
$funcs = str_replace(']', '', $funcs);
//separo cada par funcion:parámetro
$funcs = explode(', ', $funcs);

//print_r($funcs);


if($funcs[0]==''){
	die('Naranja Fanta');
}

foreach($funcs as $pair){
	$pair = str_replace('"', '', $pair);
	list($func, $param) = explode(':', $pair);
	eval('$txt='.$func.'($txt, '.$param.');');
}

//print_r($_POST); 
//echo utf8_encode($txt);
echo $txt;
?>