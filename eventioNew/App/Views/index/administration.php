<?php
    if (SessionHelper::GetUser() !== null && SessionHelper::GetRole() == "Administrateur"){
            $pdoHelper = new PdoHelper();

            $reqUserPrint = $pdoHelper->GetPDO()->prepare("SELECT * FROM userBase ORDER BY id");
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
                            foreach($userPrint as $user){ ?>
                                <tr>
                                    <td><?= $user['id'];?></td>
                                    <td><?= $user['username']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['roleUser']; ?></td>
                                    <td>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&idUser=<?=$user['id']?>&newRoleUser=Administrateur">
                                            <i class="fas fa-users-cog"></i>
                                            <?php
                                                ConnexionController::updateUser();
                                                


                                            ?>
                                        </a>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&idUser=<?=$user['id']?>&newRoleUser=Jury">
                                            <i class="fas fa-gavel"></i>
                                            <?php
                                                ConnexionController::updateUser();
                                                

                                            ?>
                                        </a>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&idUser=<?=$user['id']?>&newRoleUser=Organisateur">
                                            <i class="fas fa-calendar-alt"></i>
                                            <?php
                                                ConnexionController::updateUser();
                                                

                                            ?>
                                        </a>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&idUser=<?=$user['id']?>&newRoleUser=Donateur">
                                            <i class="fas fa-hand-holding-usd"></i>
                                            <?php
                                                ConnexionController::updateUser();
                                                

                                            ?>
                                        </a>
                                        <a href="<?= SITE_URL ?>?controller=index&action=administration&supprimeId=<?=$user['id']?>">
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
                            foreach($campaignPrint as $campaign){ ?>
                                <tr>
                                    <td><?= $campaign['campaign_id']; ?></td>
                                    <td><?= $campaign['campaign_name']; ?></td>
                                    <td><?= $campaign['campaign_begin']; ?></td>
                                    <td><?= $campaign['campaign_end']; ?></td>
                                    <td><?= $campaign['pointsAtt']; ?></td>
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


