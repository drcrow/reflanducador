<?
require_once('reflos/make.php');
$description = 'Arrastra las funciones de la lista izquierda a la lista derecha. Coloca el texto a reflanducar en la textarea superior y pulsa el bot&oacute;n para que la magia fluya.';
//iso-8859-1
//iso-8891-1	latin
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8891-1" />
<link type="image/x-icon" href="img/favicon3.ico" rel="icon" />
<title>Reflanducador v0.3</title>

  <script src="js/prototype.js" type="text/javascript"></script>
  <script src="js/scriptaculous/scriptaculous.js" type="text/javascript"></script>
  <script src="js/my_scripts.js" type="text/javascript"></script>
  <link rel="stylesheet" href="style.css" type="text/css" />
  
  
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1033481-10']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  
</head>

<body>

<!--<h1>Reflanducador v0.3</h1>-->
<!--http://creatr.cc/creatr/-->
<img id="logo" src="logo.png" alt="Reflanducador v0.3" />
<h2>Porque yo tambi&eacute;n estoy podrido de reemplazar acentos</h2>
<hr />

<div id="lists_container">

<ul class="sort_list" id="thelist1">
<?
foreach($list as $id=>$val){
	echo "\n".'<li id="thelist1_'.$id.'" onmouseover="$(\'description\').innerHTML=$(\'description_'.$id.'\').value;" onmouseout="$(\'description\').innerHTML=\''.$description.'\';">';
	echo "\n".'<div class="item_c1">'.$val['title'].'</div>';
	echo "\n".'<input name="id_f_'.$id.'" id="id_f_'.$id.'" type="hidden" value="'.$val['name'].'" />';
	echo "\n".'<input name="description_'.$id.'" id="description_'.$id.'" type="hidden" value="'.$val['description'].'" />';
	if(count($val['options'])>0){
		echo "\n".'<div class="item_c2">';
		echo "\n".'<select name="param_'.$id.'" id="param_'.$id.'" class="item_options">';
		foreach($val['options'] as $name=>$value){
			echo '<option value="'.$value.'">'.$name.'</option>';
		}
		echo "\n".'</select>';
		echo "\n".'</div>';
	}
	echo "\n".'</li>';
}
?>
</ul>

<ul class="sort_list" id="thelist2">
</ul>

</div>


<div id="textareas_container">
    <textarea class="txt" name="T1" id="T1"></textarea>
    <p style="text-align:center"><a href="#" class="button orange" onclick="reflanducar(Sortable.serialize('thelist2')); return false;">Reflanducar!</a></p>
    <textarea class="txt" name="T2" id="T2"></textarea>
</div>

<div id="description"><?=$description?></div>

<script type="text/javascript" language="javascript">
// <![CDATA[
  Sortable.create('thelist1',{containment:['thelist1','thelist2'], dropOnEmpty:true});
  Sortable.create('thelist2',{containment:['thelist1','thelist2'], dropOnEmpty:true});
// ]]>
</script>

</body>
</html>
