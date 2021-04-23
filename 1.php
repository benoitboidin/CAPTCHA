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
    if (isset($_POST['tpstxt']) and 
    	isset($_POST['tpsimg']) and 
    	isset($_POST['tpsill']) and 
    	isset($_POST['tpsend'])){

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
                $tpsimg=$_POST['tpstxt']-$_POST['tpsimg'];
                $tpstxt=$_POST['tpsill']-$_POST['tpstxt'];
                $tpsill=$_POST['tpsend']-$_POST['tpsill'];    
            }
            if (substr($_POST['ord'], 1, 1)=='3'){ // image, illusion, texte
                $tpsimg=$_POST['tpsill']-$_POST['tpsimg'];
                $tpsill=$_POST['tpstxt']-$_POST['tpsill'];
                $tpstxt=$_POST['tpsend']-$_POST['tpstxt'];
            }
        }

        if (substr($_POST['ord'], 0, 1)=='3'){  
            if (substr($_POST['ord'], 1, 1)=='1'){ // illusion, texte, image
                $tpsill=$_POST['tpstxt']-$_POST['tpsill'];
                $tpstxt=$_POST['tpsimg']-$_POST['tpstxt'];
                $tpsimg=$_POST['tpsend']-$_POST['tpsimg'];  
            }
            if (substr($_POST['ord'], 1, 1)=='2'){ // illusion, image, texte
                $tpsill=$_POST['tpsimg']-$_POST['tpsill'];
                $tpsimg=$_POST['tpstxt']-$_POST['tpsimg'];
                $tpstxt=$_POST['tpsend']-$_POST['tpstxt'];
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
                    $_POST['ord'].', '.
                    $_SERVER['REMOTE_ADDR']."\n");

        // Affichage des résultats pour l'utilisateur. 
        echo'
        <div id="consigne">
	        <p> 
	            Merci beaucoup pour votre participation. <br> 
	            Voici vos résultats : <br>
	        </p>
        </div>
        <div id="infos">
	        <p>';
		    echo'
		    	TEXTE :     '.$_POST['restxt'].$restxt.' (temps : '.$tpstxt.')<br>
		        IMAGES :    '.$_POST['resimg'].$resimg.' (temps : '.$tpsimg.')<br>
	            ILLUSIONS : '.$_POST['resill'].$resill.' (temps : '.$tpsill.')<br>

	               Âge : '.$_POST['age'].', 
	               utilisation d\'internet : '.$_POST['freq_int'].', 
	               utilisation d\'un ordinateur : '.$_POST['freq_ord'].', 
	               préférence : '.$_POST['pref'].'.
	        </p>
	        <p>
	            Si vous remarquez un problème, ou avez une question, vous pouvez me contacter par <a href = "mailto: contact@benoitboidin.tech">e-mail</a>. N\'hésitez pas à partager ce site ;) 
	        </p>
	        <p>
	            <strong>Informations : </strong>
	      		<br><br>
	      		Les CAPTCHA, aussi appelés HIP, pour "Human Interaction Proof", sont conçus pour vérifier si vous êtes bien humain. Cette vérification est importante :  sans elle, il serait possible qu\'un robot envoie un grand nombre de réponses à un sondage en ligne, ce qui fausserait les résultats ; ils seraient également en mesure de créer des centaines d\'adresses e-mail, d\'envoyer des spams et de saturer des serveurs par exemple. 
	      		<br>
	      		Cependant, certains programmes, notamment les réseaux de neurones, sont aujourd\'hui assez puissants pour dépasser les capacités humaines en lecture et reconnaissance d\'images. Il est alors nécessaire de créer de nouvelles épreuves, plus difficiles à surmonter par un système informatique, mais sans gêner l\'expérience de l\'utilisateur.  
	        </p>
	        <p>
	        	Les CAPTCHA sont inspirés du test de Turing, un brillant mathématicien britannique. Celui-ci avait énoncé le principe suivant : si une machine est capable de faire croire qu\'elle est humaine, alors elle peut être considérée comme intelligente. Ici, c\'est le contraire qui se produit : la personne doit convaincre qu\'elle n\'est pas une machine.
	        </p>
	        <p>
	        	L\'expérimentation que vous venez de passer vise à évaluer la pertinence d\'une nouvelle sorte de tests : les illusions d\'optique. La démarche est opposée aux tests calssiques : il s\'agit ici que l\'utilisateur échoue (le principe d\'une illusion est de mettre nos sens en défaut). Avant de mettre en pratique ce type d\'évaluation, nous voulions tout d\'abord savoir si celui-ci convenait aux utilisateurs. C\'est la raison de la mise en place de ce site. 
	        </p>
        </div>
            ';
    }
?>
</body>
</html>