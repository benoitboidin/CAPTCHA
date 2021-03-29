<?php	

	echo'
    <div id="consigne">
        Veuillez écrire ce qui est marqué sur l\'image.
    </div> 
    <div id="captcha">';

        $table = file('verif_txt.txt');
        $hip=substr($table[rand(0, count($table)-1)], 0, 5);

    echo '<img src="sample_txt/'.$hip.'.png">
    </div> 
    <div id="reponse">
        <form action="1.php" method="POST">
            Réponse :

            <input type="text" name="reptxt" autocomplete="off" required>
            <input type="hidden" name="tpstxt" value="'.microtime_float().'">
            <input type="hidden" name="veriftxt" value="'.$hip.'">';
            include'post.php';
            echo'
            <br><br>
            <input type="submit">
        </form> 
    </div>';  
    
?>