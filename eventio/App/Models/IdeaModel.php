<?php
    class IdeaModel{
        public static function addPointIdea($nbPoint){
            //Ajout le nombre de point dans une idée, le nombre de point est défini par le donateur
            $pdoHelper = new pdoHelper();

            $campaign_id = (int) $_GET['campaign_id'];
            $user_id = SessionHelper::GetIdUser();
            $idea_id = (int) $_GET['idee'];
            
            //Vérification si le donateur à assez de point
            $reqVerifPointUser = $pdoHelper->GetPDO()->prepare("SELECT * FROM UserPoint WHERE `user_id` = :user_id
                                                                                        AND campaign_id = :campaign_id");
            $reqVerifPointUser -> execute(array(":user_id"=>$user_id, ":campaign_id"=>$campaign_id));
            $verifPointUser = $reqVerifPointUser->fetchAll();
            $nbPoint = (int) $nbPoint;
            foreach($verifPointUser as $pointUser){
                $ptUser = $pointUser['pointsUser'];
                if($ptUser < $nbPoint){
                    echo "Désolé, vous n'avez pas assez de point </br>";
                    echo "Il vous reste : " . $ptUser . " points";
                }
                else if ($nbPoint < 0){
                    echo "Veuillez rentrer un nombre de points supérieur à 0";
                }

                else{
                    /*MET A JOUR LE NOMBRE DE POINT TOTAL QUE POSSEDE LE DONATEUR*/
                    IdeaModel::updateUserPointInEvent($nbPoint);

                    /*AJOUT DES POINTS DANS L'DEE*/
                    IdeaModel::updateIdeaPointInEvent($nbPoint);
                }
        }
    }
        public static function updateUserPointInEvent($nbPoint){
            //Met à jour le nombre de point du donateur

            $campaign_id = (int) $_GET['campaign_id'];
            $user_id = SessionHelper::GetIdUser();
            $pdoHelper = new PdoHelper();
            $reqPrepareSubstractPointUser = $pdoHelper->GetPDO()->prepare("SELECT * FROM UserPoint
                                                                                    WHERE `user_id` = :user_id
                                                                                        AND campaign_id = :campaign_id");
            $reqPrepareSubstractPointUser -> execute(array(":user_id"=>$user_id, ":campaign_id"=>$campaign_id));
            $prepareSubstractPointUser = $reqPrepareSubstractPointUser->fetchAll();
            foreach($prepareSubstractPointUser as $oldpointUserInEvent){
                $oldPointUser = $oldpointUserInEvent['pointsUser'];
                $newPointUser = $oldPointUser - $nbPoint;
                $reqSubstractPointUser = $pdoHelper->GetPDO()->prepare("UPDATE UserPoint SET pointsUser = $newPointUser 
                                                                            WHERE `user_id` = :user_id
                                                                                AND campaign_id = :campaign_id");
                $reqSubstractPointUser -> execute(array(":user_id"=>$user_id, ":campaign_id"=>$campaign_id));
            
            }
        }

        public static function updateIdeaPointInEvent($nbPoint){
            //Met à jour le nombre de point de l'idée

            $campaign_id = (int) $_GET['campaign_id'];
            $user_id = SessionHelper::GetIdUser();
            $pdoHelper = new PdoHelper();
            $idea_id = (int) $_GET['idee'];
            $reqTakePointInIdea = $pdoHelper->GetPDO()->prepare("SELECT * FROM IdeesCampaign
                                                                            WHERE campaign_id = :campaign_id
                                                                                AND ideesCampaign_id = :idea_id");
            $reqTakePointInIdea -> execute(array(":campaign_id"=>$campaign_id, ":idea_id"=>$idea_id));
            $takePointInIdea = $reqTakePointInIdea->fetchAll();
            foreach($takePointInIdea as $oldPointIdea){
                $oldPoint = $oldPointIdea['ideesCampaign_points'];
                $newPointInIdea =  $oldPoint + $nbPoint;
                $reqAddPointInIdea = $pdoHelper->GetPDO()->prepare("UPDATE IdeesCampaign SET ideesCampaign_points = $newPointInIdea 
                                                                                        WHERE campaign_id = :campaign_id
                                                                                                AND ideesCampaign_id = :idea_id");
                $reqAddPointInIdea -> execute(array(":campaign_id"=>$campaign_id, ":idea_id"=>$idea_id));
            }
        }

        public static function addChoiceJury(){
            //Ajoute le choix du jury dans la table pour enlever la possibilité qu'il puisse revoter

            $pdoHelper = new pdoHelper();
            $user_id = SessionHelper::GetIdUser();
            $campaign_id = $_GET['campaign_id'];;

            if(isset($_GET['idee']) && !empty($_GET['idee']) && isset($_GET['vote']) && !empty($_GET['vote'])){
                $user_choice = (int) $_GET['vote'];
                $ideeCampaign_id = (int) $_GET['idee'];
                
                $reqAddJuryInVerifChoice = $pdoHelper->GetPDO()->prepare("INSERT INTO JuryChoice (ideesCampaign_id, campaign_id, user_id, user_choice)
                                                                            VALUES (:ideesCampaign_id, :campaign_id, :user_id, :user_choice)");

                $addJuryInVerifChoice = $reqAddJuryInVerifChoice -> execute(array(":ideesCampaign_id"=>$ideeCampaign_id, ":campaign_id" => $campaign_id, ":user_id" => $user_id, ":user_choice"=>$user_choice));
                header('Location: ' . SITE_URL . '?controller=index&action=ideesEvenement&campaign_id='.$campaign_id.'&campaignAction=see');
                        return;
            }
            
        }
    }
?>