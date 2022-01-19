<?php
    if(SessionHelper::GetUser() != null && SessionHelper::GetRole() == "Organisateur" && isset($_GET['campaign_id']) && !empty($_GET['campaign_id'])){
        $pdoHelper = new pdoHelper();
        $campaign_id = $_GET['campaign_id'];
        $user_id = SessionHelper::GetIdUser();

        $reqIdeaUserExist = $pdoHelper->GetPDO()->prepare("SELECT * FROM IdeesCampaign WHERE user_id = :user_id
                                                                                            AND campaign_id = :campaign_id");
        $reqIdeaUserExist -> execute(array(":user_id"=>$user_id, "campaign_id"=>$campaign_id));
        $ideaUserExist = $reqIdeaUserExist -> fetchAll();
        if($ideaUserExist == false){ ?>
            <div class="create-event blockform abs">
            <h1>Créer son idée</h1>
                <form action="<?= SITE_URL ?>?controller=index&action=createIdeesEvenement&campaign_id=<?= $_GET['campaign_id']?>" method="POST">
                    <div class="align-form">
                        <p>Nom de l'idée</p>
                        <input type="text" name="ideesCampaign_name" required>
    
                        <p>Description de l'idée</p>
                        <textarea name="ideesCampaign_des" id="textarea-campaign"></textarea>
                    </div>
                    <br><br>
                    <input class="sub" type="submit" value="Soumettre l'idée">
                </form>
            </div>
        <?php } 
        else{ 
            foreach($ideaUserExist as $ideaUser){ //Si une idée d'un utilisateur existe deja dans une campagne, il peut la modifier?>
                <div class="create-event blockform abs">
                    <h1>Modifier son idée</h1>
                    <form action="<?= SITE_URL ?>?controller=index&action=createIdeesEvenement&campaign_id=<?= $_GET['campaign_id']?>" method="POST">
                        <div class="align-form">
                            <p>Nom de l'idée</p>
                            <input type="text" name="ideesCampaign_name" value="<?= $ideaUser['ideesCampaign_name']?>" required>
    
                            <p>Description de l'idée</p>
                            <input type="text" name="ideesCampaign_des" value="<?= $ideaUser['ideesCampaign_des']?>" required>
                        </div>
                        <br><br>
                        <input class="sub" type="submit" value="Soumettre l'idée">
                    </form>
                </div>
            <?php } ?>
            
        <?php } ?> 
        
    <?php } 
    else
        echo ("Page interdite");
    ?>