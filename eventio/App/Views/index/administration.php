<?php
    if (SessionHelper::GetUser() !== null && SessionHelper::GetRole() == "Administrateur"){
            $pdoHelper = new PdoHelper();

            $reqUserPrint = $pdoHelper->GetPDO()->prepare("SELECT * FROM userBase ORDER BY `user_id`");
            $reqUserPrint -> execute();
            $userPrint = $reqUserPrint -> fetchAll();

            $reqCampaignPrint = $pdoHelper->GetPDO()->prepare("SELECT * FROM Campaign ORDER BY campaign_id");
            $reqCampaignPrint -> execute();
            $campaignPrint = $reqCampaignPrint -> fetchAll();
        ?>
        <div class="controlPanel">
            <div class="gestionPanel">
                <div class="gestionUser">
                    <div class="title-gestion">
                        <h3>Gestion des utilisateurs</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <table>
                        <tr>
                            <th>ID Utilisateur</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Option</th>
                        </tr>
                        <?php 
                            foreach($userPrint as $user){ //Affichage de la table admin pour les utilisateurs du site?>
                                <tr>
                                    <td><?= $user['user_id'];?></td>
                                    <td><?= $user['user_username']; ?></td>
                                    <td><?= $user['user_email']; ?></td>
                                    <td><?= $user['roleUser']; ?></td>
                                    <td>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&idUser=<?=$user['user_id']?>&newRoleUser=Administrateur">
                                            <i class="fas fa-users-cog"></i>
                                            <?php
                                                ConnexionController::updateUser();
                                            ?>
                                        </a>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&idUser=<?=$user['user_id']?>&newRoleUser=Jury">
                                            <i class="fas fa-gavel"></i>
                                            <?php
                                                ConnexionController::updateUser();
                                            ?>
                                        </a>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&idUser=<?=$user['user_id']?>&newRoleUser=Organisateur">
                                            <i class="fas fa-calendar-alt"></i>
                                            <?php
                                                ConnexionController::updateUser();
                                            ?>
                                        </a>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&idUser=<?=$user['user_id']?>&newRoleUser=Donateur">
                                            <i class="fas fa-hand-holding-usd"></i>
                                            <?php
                                                ConnexionController::updateUser();
                                            ?>
                                        </a>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&supprimeId=<?=$user['user_id']?>">
                                            <i class="fas fa-trash"></i>
                                            <?php
                                                ConnexionController::delUser();
                                            ?>
                                        </a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            
            <div class="gestionPanel">
                <div class="gestionCampaign">
                    <div class="title-gestion">
                        <h3>Gestion des campagnes</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <table>
                        <tr>
                            <th>ID Campagne</th>
                            <th>Nom Campagne</th>
                            <th>Début de la campagne</th>
                            <th>Fin de la campgne</th>
                            <th>Points attribués</th>
                            <th>Option</th>                        
                        </tr>
                        <?php 
                            foreach($campaignPrint as $campaign){ //Affichage de la table admin pour les campagnes du site?>
                                <tr>
                                    <td><?= $campaign['campaign_id']; ?></td>
                                    <td><?= $campaign['campaign_name']; ?></td>
                                    <td><?= $campaign['campaign_begin']; ?></td>
                                    <td><?= $campaign['campaign_end']; ?></td>
                                    <td><?= $campaign['campaign_pointsAtt']; ?></td>
                                    <td>
                                    <a href="<?= SITE_URL ?>?controller=index&action=administration&supprimeEvent=<?=$campaign['campaign_id']?>">
                                            <i class="fas fa-trash"></i>
                                            <?php
                                                EvenementController::delEvent();
                                            ?>
                                        </a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
   <?php 
   }
    else{
        echo "Vous n'avez pas les droits requis";
    }
   ?>


