<?
//Autor: Agustín Fiori
//Fecha: 24/Nov/2010
$ref['name']		='roman';
$ref['title']		='Roman';
$ref['options']		= array('Encode'=>1, 'Decode'=>2);
$ref['description']	='Conversi&oacute;n entre n&uacute;meros ar&aacute;bigos y n&uacute;meros romanos';

function roman($num, $opt){
	$ArRo= new ArRoConvertor();
	if($opt==1){	
		return $ArRo->ArabicToRoman($num).' '.$ArRo->error;
	}else{
		return $ArRo->RomanToArabic($num).' '.$ArRo->error;
	}
}






/*************************************************************
*              Arabic/Roman Numeral Convertor                *
*                                                            *
* For converting between integers and Roman Numerals as well *
* as checking the validity of Roman Numerals.                *
*                                                            *
*     1    I                                                 *
*     5    V         5,000     V                             *
*     10   X         10,000    X                             *
*     50   L         50,000    L                             *
*     100  C         100,000   C                             *
*     500  D         500,000   D                             *
*     1000 M         1,000,000 M                             *
*                                                            *
* Copyright (C)  Dmitry Zarezenko, 2005                      *
*       E-mail : DIKGenius_php@rambler.ru                    *
*************************************************************/
class ArRoConvertor{
   // Constructor
    function ArRoConvertor (){
    
    }

    /***********************************
    * These first arrays are used by   *
    * the functions which convert      *
    * roman numerals into arabic.      *
    ***********************************/
    
    var $counter= Array();
    var $romans = Array("I" => 1, "V" => 5, "X" => 10, "L" => 50, "C" => 100, "D" => 500, "M" => 1000, "" => 0);
    var $subs   = Array("I" => true, "X" => true, "C" => true, "M" => true);
	var $error	= '';
   
    
    /***********************************
    * These next four functions are    *
    * used to test for errors in the   *
    * input and convert roman numerals *
    * into arabic integers.            *
    ***********************************/
    
    function checkRom($Rcur, $Rnext, $lSub, $n, $l) {
        if (!isSet($this->romans[$Rcur]) || (!isSet($this->romans[$Rnext]) && (($n+1) < $l))) {
            $this->error="Not a Roman Numeral";
        }
        else if ($this->romans[$Rcur] >= $lSub) {
            $this->error="Not a Properly Formed Numeral";
        }
    }
    
    function testSub($cR, $nR, $pR) {
       if (isSet ($this->romans[$cR]) && isSet ($this->romans[$nR]) && isSet ($this->romans[$pR])){
            if ($this->romans[$cR] < $this->romans[$nR]) {
                if (($this->romans[$pR] == $this->romans[$nR]) && ($this->subs[$nR] != true)) {
                    $this->error="Not a Properly Formed Numeral";
                }
                else if (($this->subs[$cR] == true) && (10*$this->romans[$cR] >= $this->romans[$nR])) {
                    return true;
                }
                else {
                    $this->error="Not a Properly Formed Numeral";
                    return false;
                }
            }
        }
        return false;
    }
    
    function testRom($rome) {
       if (!isSet ($this->counter[$rome])) return false;
        if ($this->counter[$rome] < 3) {
            return true;
        }
        else {
            $this->error="Not a Properly Formed Numeral";
        }
        return false;
    }
    
    function RomanToArabic ($rNumb) {
        $this->counter["I"] = 0;
        $this->counter["V"] = 2;
        $this->counter["X"] = 0;
        $this->counter["L"] = 2;
        $this->counter["C"] = 0;
        $this->counter["D"] = 2;
        $this->counter["M"] = -1000000000; // Negative infinity
        $intNumb = 0;
        $lastNumb = 1000000000; // Positive infinity
        $thisNumb = 0;
        $lastSub = 1000000000; // Positive infinity
    
        $rNumb= strtoupper ($rNumb);
        /*$tmpNumb= preg_replace ( "/[^IVXLCDM]/m", '', $rNumb);
        if ($tmpNumb!= $rNumb) $this->createError("Warning", "$rNumb is not a Roman numeral, was changed on $tmpNumb");
        $rNumb= $tmpNumb;*/
        $len= strlen ($rNumb);
        for ($i= 0; $i< $len; $i++){
            $currentR = $rNumb[$i];
            @$nextR    = $rNumb[$i+1];
            @$prevR    = $rNumb[$i-1];
    
            $this->checkRom ($currentR, $nextR, $lastSub, $i, $len);
            if ($this->testSub ($currentR, $nextR, $prevR)) {
                $thisNumb = $this->romans[$nextR] - $this->romans[$currentR];
                $i ++;
                $lastSub = $this->romans[$currentR];
            }
            else if ($this->testRom($currentR)){
                $thisNumb = $this->romans[$currentR];
                $this->counter[$currentR] ++;
            }
            if ($thisNumb > $lastNumb) {
                $this->error="Not a Properly Formed Numeral";
            }
            else {
                $intNumb += $thisNumb;
                $lastNumb = $thisNumb;
            }
        }
        return $intNumb;
    }
    
    /***********************************
    * The next two functions are used  *
    * for converting an arabic integer *
    * into a roman Numeral.            *
    ***********************************/
    
    function Cut($num, $n){
        return ($num - ($num % $n ) ) / $n;
    }
    
    function ArabicToRoman ($aNumb) {
       if (($aNumb+0)!=$aNumb){
            $this->error="$aNumb is not a Arabic Integer";
            return "";
        }
        $rNumb= "";
        while ($aNumb> 5999) { $rNumb.= "M"; $aNumb-= 1000;}
        if(($aNumb > 0)) {
            $mill = Array("", "M", "MM", "MMM", "MMMM", "MMMMM");
            $cent = Array("", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM");
            $tens = Array("", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC");
            $ones = Array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX");
    
            $m = $this->Cut($aNumb, 1000); $aNumb%= 1000;
            $c = $this->Cut($aNumb, 100); $aNumb%= 100;
            $t = $this->Cut($aNumb, 10); $aNumb%= 10;
            
            return $rNumb . $mill[$m] . $cent[$c] . $tens[$t] . $ones[$aNumb];
        }
        else {
           $this->error="Numbers from 1 to 5999 only please.";
            return "";
        }
    }
}
?>