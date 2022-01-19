<?php
    $dateJour = date("Y-m-d");
?>

<div class="post-event">
    <div id="post-event-block"></div>
</div>

    <?php
    $pdoHelper = new PdoHelper();
    $campaign_id = $_GET['campaign_id'];

    $sql = $pdoHelper->GetPDO()->prepare("SELECT * FROM Campaign WHERE campaign_id = :campaign_id");
    $sql -> execute(array(":campaign_id"=>$campaign_id));
    $campaign = $sql -> fetchAll();

    foreach($campaign as $tableCampaign){
        $dateFin = $tableCampaign['campaign_end'];

        $user_id = SessionHelper::GetIdUser();

        $reqIdeaUserExist = $pdoHelper->GetPDO()->prepare("SELECT * FROM IdeesCampaign WHERE user_id = :user_id
                                                                                            AND campaign_id = :campaign_id");
        $reqIdeaUserExist -> execute(array(":user_id"=>$user_id, "campaign_id"=>$campaign_id));
        $ideaUserExist = $reqIdeaUserExist -> fetchAll();

        if (SessionHelper::GetUser() != null && SessionHelper::GetRole() == "Organisateur" && $_GET['campaignAction'] == "see" && $dateFin > $dateJour){
            if($ideaUserExist == false){ ?>
            <div class="button-create-event">
                <a href="<?= SITE_URL ?>?controller=index&action=createIdeesEvenement&campaign_id=<?= $_GET['campaign_id']?>">Proposez une idée +</a>
            </div>
        <?php }
            else if($ideaUserExist == true){  ?>
                <div class="button-create-event">
                    <a href="<?= SITE_URL ?>?controller=index&action=createIdeesEvenement&campaign_id=<?= $_GET['campaign_id']?>">Modifier votre idée</a>
                </div>
            <?php }
        } 
    }
    ?>
        <div class="event abs">
            <?php
                $pdoHelper = new pdoHelper();
                $campaign_id = $_GET['campaign_id'];
                $reqIdeesPrint = $pdoHelper->GetPDO()->prepare("SELECT * FROM IdeesCampaign
                                                                    WHERE campaign_id = :campaign_id");                                                         
                $reqIdeesPrint -> execute(array(":campaign_id" => $campaign_id));
                $IdeesPrint = $reqIdeesPrint -> fetchAll();
        
                foreach($IdeesPrint as $idee){
                ?>
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
                                if (SessionHelper::GetUser() !== null && SessionHelper::GetRole() == "Donateur" && $_GET['campaignAction'] == "rejoin" && $dateFin > $dateJour){
                            ?>
                                    <form class="form-ideeEvent" action="<?= SITE_URL ?>?controller=index&action=donationIdeesEvenement&campaign_id=<?= $_GET['campaign_id']?>&idee=<?= $idee['ideesCampaign_id']?>" method="POST">
                                        <input class="sub" type="submit" value="Je donne !" id="confirmPoint">
                                    </form>
                                <?php } ?>       
                        <p class="point">Cette idée à récolté : <?= $idee['ideesCampaign_points']; ?> points</p>
                        <p class="point">
                            <?php
                                if($idee['ideesCampaign_points'] < 35){
                                    echo "L'idée doit atteindre 35 points pour être voté par le jury";
                                }

                                else
                                    echo "Cette idée apparaitra dans la liste des jury";
                            ?>
                        </p>
                        <?php
                            if($dateFin < $dateJour && SessionHelper::GetUser() !== null && SessionHelper::GetRole() == "Jury" && $idee['ideesCampaign_points'] >= 35){
                        ?>
                                <div class="voteJury">
                                    <h4>Vote du jury : </h4>
                                        <?php
                                            $user_id = SessionHelper::GetIdUser();
                                            $campaign_id = $_GET['campaign_id'];
                                            $ideeCampaign_id = $idee['ideesCampaign_id'];
                                            $reqVerifChoiceExist = $pdoHelper->GetPDO()->prepare("SELECT * FROM JuryChoice WHERE ideesCampaign_id = :ideesCampaign_id
                                                                                                                                    AND campaign_id = :campaign_id
                                                                                                                                        AND user_id = :user_id");
                                            $reqVerifChoiceExist -> execute(array(":ideesCampaign_id" => $ideeCampaign_id, ":campaign_id" => $campaign_id, ":user_id" => $user_id));
                                            $verifChoiceExist = $reqVerifChoiceExist -> fetch();

                                                if($verifChoiceExist == true){ ?>
                                                    <p class="choiceRegister">Choix enregistré !</p>
                                               <?php }

                                                else{ ?>
                                                    <a href="<?= SITE_URL ?>?controller=index&action=ideesEvenement&campaign_id=<?= $_GET['campaign_id']?>&idee=<?= $idee['ideesCampaign_id']?>&vote=1">
                                                        <i class="fas fa-times-circle"></i>
                                                        <?php
                                                            IdeaModel::addChoiceJury();
                                                        ?>
                                                    </a>
                                                    <a href="<?= SITE_URL ?>?controller=index&action=ideesEvenement&campaign_id=<?= $_GET['campaign_id']?>&idee=<?= $idee['ideesCampaign_id']?>&vote=2">
                                                        <i class="fas fa-check-circle"></i>
                                                        <?php
                                                            IdeaModel::addChoiceJury();
                                                        ?>
                                                    </a>
                                               <?php } ?> 
                                </div>
                            <?php } ?>  
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