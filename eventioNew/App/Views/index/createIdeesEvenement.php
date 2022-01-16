<?php
    if(SessionHelper::GetUser() != null && SessionHelper::GetRole() == "Organisateur" && isset($_GET['campaign_id']) && !empty($_GET['campaign_id'])){
        ?> 
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
    else
        echo ("Page interdite");
    ?>