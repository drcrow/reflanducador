<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']	='morse';
$ref['title']	='Morse';
$ref['options']	= array('Encode'=>1, 'Decode'=>2);
$ref['description'] ='Sin duda la funci&oacute;n mas &uacute;til de todas las que tiene Reflanducador :)';

function morse($txt, $opt){
	$letters=array('a'=>'·-','b'=>'-···','c'=>'-·-·','d'=>'-··','e'=>'·','f'=>'··-·','g'=>'--·','h'=>'····','i'=>'··','j'=>'·---','k'=>'-·-','l'=>'·-··','m'=>'--','n'=>'-·','o'=>'---','p'=>'·--·','q'=>'--·-','r'=>'·-·','s'=>'···','t'=>'-','u'=>'··-','v'=>'···-','w'=>'·--','x'=>'-··-','y'=>'-·--','z'=>'--··');
    $numbers=array(1=>'·----',2=>'··---',3=>'···--',4=>'····-',5=>'·····',6=>'-····',7=>'--···',8=>'---··',9=>'----·',0=>'-----'); 

	if($opt==1){
		$txt=strtolower($txt);
		trim($txt);
		$k=strlen($txt);
		for ($i=0;$i<$k;$i++) {
			$t=substr($txt,$i,1);
			if ($t==" ") {
			} elseif (array_key_exists($t, $letters)) {
				$out[]=$letters[$t];
			} elseif (array_key_exists($t, $numbers)) {
				$out[]=$numbers[$t];
			}
		} 
		return implode(' ', $out);
	}else{
		
		$letters = array_flip($letters);
		$numbers = array_flip($numbers);
		trim($txt);
		$arr=explode("\n",$txt);
		$k=count($arr);
		for ($i=0;$i<$k;$i++) {
			$obj[$i]=explode(' ',$arr[$i]);
			for ($j=0;$j<count($obj[$i]);$j++) {
				if ($obj[$i][$j]==' ') {
					$out.='';
				} elseif (array_key_exists($obj[$i][$j],$letters)) {
					$out.=$letters[$obj[$i][$j]];
				} elseif (array_key_exists($obj[$i][$j],$numbers)) {
					$out.=$numbers[$obj[$i][$j]];
				}
			}
			$out.=' ';    
		} 
		return $out;
		
	}
}
?>