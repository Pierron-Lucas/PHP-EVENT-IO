<?php
    //A modifier pour ajouter tout ca dans une base de donnée
?>
<div class="post-event">
    <div id="post-event-block"></div>
</div>

<?php
    if (SessionHelper::GetUser() != null && SessionHelper::GetRole() == "Administrateur"){
    ?>
    <div class="button-create-event">
        <a href="<?= SITE_URL ?>?controller=index&action=createEvenement">Créer un évènement +</a>
    </div>
   <?php } ?>

<div class="event abs">
        <?php
            $pdoHelper = new PdoHelper();
            $sql = $pdoHelper->GetPDO()->prepare("SELECT * FROM Campaign ORDER BY campaign_id DESC");
            $sql -> execute();
            $campaign = $sql -> fetchAll();
            foreach($campaign as $tableCampaign){ ?>
                <div class="event-body">
                    <div class="event-block-section1">
                        <h3><?= $tableCampaign['campaign_name']; ?></h3>
                    </div>
                    <div class="event-block-section2">
                        <b>Description</b> <br>
                        <p class="description">
                            <?= $tableCampaign['campaign_des']; ?>
                        </p>
                        <div class="buttonCampaign">
                            <a href="<?= SITE_URL ?>?controller=index&action=ideesEvenement&campaign_id=<?= $tableCampaign['campaign_id']?>&campaignAction=see">Voir les idées<i class="fas fa-chevron-right"></i></a>
                        </div> 
                        <?php
                            if (SessionHelper::GetUser() != null && SessionHelper::GetRole() == "Donateur"){
                            ?>
                                <p class="point">
                                    Vous pouvez dépenser jusqu'à
                                    <?= $tableCampaign['pointsAtt']; ?>
                                    points pour cette campagne
                                </p>
                        <?php 
                                $campaign_id = $tableCampaign['campaign_id'];
                                $userId = SessionHelper::GetIdUser();
                                $reqUserExist = $pdoHelper->GetPDO()->prepare("SELECT * FROM UserPoint WHERE user_id = :userId AND campaign_id = :campaign_id");
                                $reqUserExist -> execute(array(":userId"=>$userId, ":campaign_id"=> $campaign_id));
                                $userExist = $reqUserExist -> fetch();
                                
                                if($userExist){ ?>
                                <div class="rejoinCampaign">
                                    <a href="<?= SITE_URL ?>?controller=index&action=ideesEvenement&campaign_id=<?= $tableCampaign['campaign_id']?>&campaignAction=rejoin">Rejoindre la campagne</a>
                                </div>
                                   
                                <?php }
                                
                                else{ ?>
                                    <form class="jCamp" action="<?= SITE_URL ?>?controller=index&action=ideesEvenement&campaign_id=<?= $tableCampaign['campaign_id']?>&campaignAction=rejoin" method="POST">
                                        <input class="joinCamp" type="submit" value="Rejoindre la campagne"></input>
                                    </form>
                                <?php }
                            } ?>
                    </div>
                </div>
      <?php } ?>
</div>
<script>
    var chaine = "Nos évènements";
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