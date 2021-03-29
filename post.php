<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <title>Human Interaction Proof</title>
</head>
<body>
		
<?php	


// Texte : 
if (isset($_POST['tpstxt'])){
	echo'<input type="hidden" name="tpstxt" value="'.$_POST['tpstxt'].'">';
}
if (isset($restxt)){
	echo'<input type="hidden" name="restxt" value="'.$restxt.'">';
}
if (isset($_POST['restxt'])){
	echo'<input type="hidden" name="restxt" value="'.$_POST['restxt'].'">';
}


// Image : 
if (isset($_POST['tpsimg'])){
	echo'<input type="hidden" name="tpsimg" value="'.$_POST['tpsimg'].'">';
}
if (isset($resimg)){
	echo'<input type="hidden" name="resimg" value="'.$resimg.'">';
}
if (isset($_POST['resimg'])){
	echo'<input type="hidden" name="resimg" value="'.$_POST['resimg'].'">';
}


// Illusion : 
if (isset($_POST['tpsill'])){
	echo'<input type="hidden" name="tpsill" value="'.$_POST['tpsill'].'">';
}
if (isset($resill)){
	echo'<input type="hidden" name="resill" value="'.$resill.'">';
}
if (isset($_POST['resill'])){
	echo'<input type="hidden" name="resill" value="'.$_POST['resill'].'">';
}

// Ordre des tests.
$num=$_POST['num']+1;
echo'<input type="hidden" name="ord" value="'.$_POST['ord'].'">
	 <input type="hidden" name="num" value="'.$num.'">';

?>

</body>
</html>