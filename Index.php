<?php
    include 'top.html';
?>
    <div id="consigne">
        Bonjour, vous allez passez une épreuve de résolution de CAPTCHA. Ce sont des tests visant à vérifier si vous êtes un humain. <br> Lorsque vous appuierez sur "Départ", vous serez chronométré. <br><br>
        
        <?php
        $ord='123';
        $ord=str_shuffle($ord);
        echo'
        <form action="1.php" method="POST">
            <input type="hidden" name="ord" value="'.$ord.'">
            <input type="hidden" name="num" value="0">
            <input type="submit" value="Départ">
        <form>
            ';
        ?>

    </div> 
    <div>
        <p>
            Aucune information personnelle ne sera enregistrée. 
            <br>
            Vos résultats serviront à alimenter une base de données pour la rédaction d'un mémoire dans le cadre de la licence MIASHS à l'Université Lumière Lyon 2.
        </p>
        <img src="Université-Lyon-2-350x0-c-default.png">
    </div>
</body>
</html>