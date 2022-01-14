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
<script src="../js/particles.js"></script>
<script src="../js/app.js"></script>

<script>
    var chaine = "Notre mission :                      réaliser ton évènement."
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