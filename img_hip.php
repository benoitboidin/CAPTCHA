<?php	

    echo'
    <div id="consigne">
        Veuillez sélectionner les images de voitures.
    </div> 
    <div id="captcha">
        ';

    // Récupération des images cibles (voitures) et distracteurs.
    $verif_car = fopen('verif_img.txt', 'r');
    $table_car = file('verif_img.txt');

    // Récupération des images distracteurs.
    $verif_divers = fopen('verif_divers_img.txt', 'r');
    $table_divers = file('verif_divers_img.txt');

    // Sélection des images à afficher. 
    $hip=['sample_img/'.substr($table_car[rand(0, count($table_car)-1)], 0, 9).'.png', 
        'sample_divers_img/'.substr($table_divers[rand(0, count($table_divers)-1)], 0, 9).'.png',
        'sample_divers_img/'.substr($table_divers[rand(0, count($table_divers)-1)], 0, 9).'.png',
        'sample_divers_img/'.substr($table_divers[rand(0, count($table_divers)-1)], 0, 9).'.png',
        'sample_divers_img/'.substr($table_divers[rand(0, count($table_divers)-1)], 0, 9).'.png',
        'sample_divers_img/'.substr($table_divers[rand(0, count($table_divers)-1)], 0, 9).'.png'];

    $nb_hip = 5;

    fclose('verif_img.txt');
    
    // Affichage du formulaire.   
    $verifimg=0;
    echo'
        <form action="1.php" method="POST">
            <fieldset required>
                <table width="100%">';


                    for ($j = 1; $j <= 3; $j++) {
                        echo'<tr> ';

                        for ($i = 1; $i <= 3; $i++) {
                            $r=rand(0,$nb_hip);
                            if ($r==0){
                                $verifimg+=1;
                            }
                            echo'
                            <td>
                    			<img src="'.$hip[$r].'">
                                <input type="checkbox" name="repimg[]" value ="'.$r.'">
                    		</td>';
                        }
                        echo'</tr>';
                    }
                    echo' 
                </table> 
            </fieldset>

            <input type="hidden" name="verifimg" value="'.$verifimg.'">
            <input type="hidden" name="tpsimg" value="'.microtime_float().'"> ';
            include'post.php';
            echo'
            <input type="submit">
            <br><br>
        </form>
        '.$verifimg.'
    </div> 
    ';

?>