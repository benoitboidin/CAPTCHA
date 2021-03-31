<?php	
	// Vérification des réponses pour le texte. 
	if (isset($_POST['reptxt'])){
		if ($_POST['reptxt']==$_POST['veriftxt']){
			$restxt='1';
		}
		else{
			$restxt='0';
		}
	}

	// Vérification des réponses pour l'image.
	if (isset($_POST['tpsimg'])){ 
		$resimg=1;
		$i=0;
		foreach ($_POST['repimg'] as $ligne) {
	    	if ($ligne!=0){
	    		$resimg=0;
	    		$i=+1;
	    	}
		}
		if ($_POST['verifimg']!=count($_POST['repimg'])){
			$resimg=0;
		}
	}
	
	// Vérification des réponses pour l'illusion.
	if (isset($_POST['repill'])){
	    $repill='';
	    foreach ($_POST['repill'] as $ligne) {
	        $repill = $repill.$ligne;
	    }

	    if ($repill==substr($_POST['verifill'],0,1)){
	        $resill=1;
	    }
	    else{
	        $resill=0;
	    }
    }
?>