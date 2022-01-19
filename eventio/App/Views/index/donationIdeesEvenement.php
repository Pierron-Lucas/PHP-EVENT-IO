<?php
    if(SessionHelper::GetUser() != null && SessionHelper::GetRole() == "Donateur" && isset($_GET['campaign_id']) && !empty($_GET['campaign_id']) && isset($_GET['idee']) && !empty($_GET['idee'])){
        ?> 
        <div class="create-event blockform abs">
        <h1>Donation pour l'idée de la campagne</h1>
            <form action="<?= SITE_URL ?>?controller=index&action=donationIdeesEvenement&campaign_id=<?= $_GET['campaign_id']?>&idee=<?= $_GET['idee']?>" method="POST">
                <div class="align-form">
                    <p>Points donnés</p>
                    <input type="number" name="pointsAtt" required>
                </div>
                <br><br>
                <input class="sub" type="submit" name="nbPointGive" value="Soumettre les points">
            </form>
        </div>
    <?php } 
    else
        echo ("Page interdite");
    ?>