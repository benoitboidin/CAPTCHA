<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <title>Human Interaction Proof</title>
</head>
<body>
		
<?php	

    $verif = fopen('verif_ill.txt', 'r');
    $table = file('verif_ill.txt');

    $hip=$table[rand(0, count($table)-1)];

    fclose('verif_ill.txt');

    echo'
    <div id="consigne">
        Quel petit carré semble le plus clair ?  
    </div>

    <div id="captcha">
        <img src="sample_ill/'.$hip.'.png"
    </div>

    </div> 
    <div id="reponse">
        <form action="1.php" method="POST">
            
            Réponse : 
            <input type="radio" name="repill[]" value="g">
            <input type="radio" name="repill[]" value="d">
            <input type="hidden" name="verifill" value="'.$hip.'">  
            <input type="hidden" name="tpsill" value="'.microtime_float().'">';
            include'post.php';
            echo'
            <br><br>
        <input type="submit">
        <br><br>
        </form>
    </div>';
    
?>

</body>
</html>