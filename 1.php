<?php
	include 'top.html';

    function microtime_float(){ 
        list($usec, $sec) = explode(" ", microtime()); 
        return ((float)$usec + (float)$sec); 
    } 

    //TEXTE
    if (substr($_POST['ord'], $_POST['num'], 1)=='1'){
        include 'verif.php';
        include 'text_hip.php';
    }

    //IMAGE
    if (substr($_POST['ord'], $_POST['num'], 1)=='2'){
        include 'verif.php';
        include 'img_hip.php';
    }

    //ILLUSION
    if (substr($_POST['ord'], $_POST['num'], 1)=='3'){
        include 'verif.php';
        include 'ill_hip.php';
    }

    // HABITUDES ET LES PREFERENCES.
    if ($_POST['num']=='3'){

        include 'verif.php';
        echo'
            <form action="1.php" method="POST">';
        include 'form_hab.html';
        include 'post.php';
        echo'
            <input type="hidden" name="tpsend" value="'.microtime_float().'">
            <input type="submit">
        </form>';
    } 

    // ENREGISTREMENT. 
    if (isset($_POST['tpstxt']) and isset($_POST['tpsimg']) and isset($_POST['tpsill']) and isset($_POST['tpsend'])){

        $user = fopen('subjects_data.txt', 'r+');
        fseek($user, 0, SEEK_END);

        // Calcul des temps de réponse.
        if (substr($_POST['ord'], 0, 1)=='1'){
            if (substr($_POST['ord'], 1, 1)=='2'){ // texte, image, illusion
                $tpstxt=$_POST['tpsimg']-$_POST['tpstxt'];
                $tpsimg=$_POST['tpsill']-$_POST['tpsimg'];
                $tpsill=$_POST['tpsend']-$_POST['tpsill']; 
            }
            if (substr($_POST['ord'], 1, 1)=='3'){ // texte, illusion, image
                $tpstxt=$_POST['tpsill']-$_POST['tpstxt'];
                $tpsill=$_POST['tpsimg']-$_POST['tpsill'];
                $tpsimg=$_POST['tpsend']-$_POST['tpsimg'];
            }
        }

        if (substr($_POST['ord'], 0, 1)=='2'){
            if (substr($_POST['ord'], 1, 1)=='1'){ // image, texte, illusion
                $tpstxt=$_POST['tpstxt']-$_POST['tpsimg'];
                $tpsimg=$_POST['tpsill']-$_POST['tpstxt'];
                $tpsill=$_POST['tpsend']-$_POST['tpsill'];    
            }
            if (substr($_POST['ord'], 1, 1)=='3'){ // image, illusion, texte
                $tpstxt=$_POST['tpsill']-$_POST['tpsimg'];
                $tpsill=$_POST['tpstxt']-$_POST['tpsill'];
                $tpsimg=$_POST['tpsend']-$_POST['tpstxt'];
            }
        }

        if (substr($_POST['ord'], 0, 1)=='3'){  
            if (substr($_POST['ord'], 1, 1)=='1'){ // illusion, texte, image
                $tpstxt=$_POST['tpstxt']-$_POST['tpsill'];
                $tpsimg=$_POST['tpsimg']-$_POST['tpstxt'];
                $tpsill=$_POST['tpsend']-$_POST['tpsimg'];  
            }
            if (substr($_POST['ord'], 1, 1)=='2'){ // illusion, image, texte
                $tpstxt=$_POST['tpsimg']-$_POST['tpsill'];
                $tpsill=$_POST['tpstxt']-$_POST['tpsimg'];
                $tpsimg=$_POST['tpsend']-$_POST['tpstxt'];
            }
        }

        // Écriture des résultats dans le fichier. 
        fwrite($user, $_POST['restxt'].', '.$tpstxt.', '.
                    $_POST['resimg'].', '.$tpsimg.', '.
                    $_POST['resill'].', '.$tpsill.', '.
                    $_POST['age'].', '.
                    $_POST['freq_ord'].', '.
                    $_POST['freq_int'].', '.
                    $_POST['pref'].', '.
                    $_POST['ord']."\n");

        // Affichage des résultats pour l'utilisateur. 
        echo '
        <p> 
            Merci beaucoup pour votre participation. <br> 
            Voici vos résultats : <br>
        </p>
        <p>';
	    echo 'TEXTE :     '.$_POST['restxt'].$restxt.' (tps : '.$tpstxt.')<br>
	          IMAGES :    '.$_POST['resimg'].$resimg.' (tps : '.$tpsimg.')<br>
              ILLUSIONS : '.$_POST['resill'].$resill.' (tps : '.$tpsill.')<br>

               Âge : '.$_POST['age'].
            ', internet : '.$_POST['freq_int'].
            ', ordinateur : '.$_POST['freq_ord'].
            ', préférence : '.$_POST['pref'].
            '.</p>';
    }
?>
</body>
</html>