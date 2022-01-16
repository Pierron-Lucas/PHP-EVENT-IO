<div class="post-event">
    <div id="post-event-block"></div>
</div>
    <?php
    if (SessionHelper::GetUser() != null && SessionHelper::GetRole() == "Organisateur"){
    ?>
        <div class="button-create-event">
            <a href="<?= SITE_URL ?>?controller=index&action=createIdeesEvenement&campaign_id=<?= $_GET['campaign_id']?>">Proposez une idée +</a>
        </div>
    <?php } ?>

        <div class="event abs">
                <?php
                    $pdoHelper = new pdoHelper();   

                    $campaign_id = $_GET['campaign_id'];

                    $reqIdeesPrint = $pdoHelper->GetPDO()->prepare("SELECT * FROM IdeesCampaign
                                                                        WHERE campaign_id = :campaign_id");                                                         
                    $reqIdeesPrint -> execute(array(":campaign_id" => $campaign_id));
                    $IdeesPrint = $reqIdeesPrint -> fetchAll();

                    foreach($IdeesPrint as $idee){ ?>
                        <div class="event-body">
                            <div class="event-block-section1">
                                <h3><?= $idee['ideesCampaign_name']; ?></h3>
                            </div>
                            <div class="event-block-section2">
                                <b>Description</b> <br>
                                <p class="description">
                                    <?= $idee['ideesCampaign_des']; ?>
                                </p>
                                <?php
                                    if (SessionHelper::GetUser() !== null && SessionHelper::GetRole() == "Donateur" && $_GET['campaignAction'] == "rejoin"){
                                    ?>
                                       <form class="form-ideeEvent" action="">
                                           <input class="sub" type="submit" value="Je donne !" id="confirmPoint">
                                       </form>

                                <?php } ?>
                                <p class="point">Cette idée à récolté : <?= $idee['ideesCampaign_points']; ?> points</p>
                            </div>
                        </div>
                    <?php } ?>
        </div>

<script>
    var chaine = "Vos idées";
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
    document.getElementById("post-event-block").innerHTML = texte[actual_texte];
    actual_texte++;
    if(actual_texte >= texte.length)
    actual_texte = nb_msg;
    }
    if(document.getElementById)

    setInterval("changeMessage()",50) /* la vitesse de defilement (plus on a une valeur faible plus 
    texte s'affiche rapidement) */
  </script>