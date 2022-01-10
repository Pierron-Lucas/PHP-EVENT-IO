<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
</head>
<body>
    <header>
        <div class="nav">
            <div class="logo">
               <a href="index.php"><img src="image/logo.png" alt=""></a>
            </div>
            <div class="nav-link">
                <a href="event.php"><i class="fas fa-calendar-check"></i>Evenements</a>
                <a href="connection.php"><i class="far fa-user-circle"></i>Connexion</a>
            </div>
        </div>
    </header>
    <div class="index abs">
        <div class="index-pres">
            <div id="text-pres"></div>
            <p>
                E-Event.IO est une campagne d'idéation d'évènements, où des étudiants organisateurs proposent
                des idées d'évènements. Une seule et unique idée d'évènement peut être proposée par organisateur 
                pendant cette période définie.
            </p>
            <a href="connexion.html">Voir les évènements</a>
        </div>
        <a href="#"><i class="fas fa-chevron-down"></i></a>
    </div>
    <div id="particles-js"></div>
    
    <!-- scripts -->
<script src="js/particles.js"></script>
<script src="js/app.js"></script>

    <script>
        var chaine = "Notre mission :                      réaliser, ton évènement."
        var nb_car = chaine.length; 
        var tableau = chaine.split("");
        texte = new Array;
        var txt = '';
        var nb_msg = nb_car - 1;
        for (i=0; i<nb_car; i++) {
        texte[i] = txt+tableau[i];
        var txt = texte[i];
        }
    
        actual_texte = 0;
        function changeMessage()
        {
        document.getElementById("text-pres").innerHTML = texte[actual_texte];
        actual_texte++;
        if(actual_texte >= texte.length)
        actual_texte = nb_msg;
        }
        if(document.getElementById)
    
        setInterval("changeMessage()",50) /* la vitesse de defilement (plus on a une valeur faible plus 
        texte s'affiche rapidement) */
      </script>
</body>
</html>