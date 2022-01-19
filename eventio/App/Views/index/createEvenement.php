<?php
    if(SessionHelper::GetUser() != null && SessionHelper::GetRole() == "Administrateur"){
        ?> 
        <div class="create-event blockform abs">
        <h1>Créer sa campagne</h1>
            <form action="<?= SITE_URL ?>?controller=index&action=createEvenement" method="POST">
                <div class="align-form">
                    <p>Nom de la campagne</p>
                    <input type="text" name="campaign_name" required>

                    <p>Description de la campagne</p>
                    <textarea name="campaign_des" id="textarea-campaign"></textarea>

                    <p>Date début campagne</p>
                    <input type="date" name="campaign_begin" required>

                    <p>Date fin campagne</p>
                    <input type="date" name="campaign_end" required>

                    <p>Points attribués</p>
                    <input type="number" name="pointsAtt" required>
                </div>
                <br><br>
                <input class="sub" type="submit" value="Soumettre la campagne">
            </form>
        </div>
    <?php } 
    else
        echo ("Page interdite");
    ?>