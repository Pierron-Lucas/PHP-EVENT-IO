<?php 
    class IdeesEvenementController {
        public static function addIdee($campaign_id, $ideesCampaign_name, $ideesCampaign_des){
            $pdoHelper = new pdoHelper();
            $user_id = SessionHelper::GetIdUser();
            //Ajoute une idée dans la base de données avec les attributs rempli par le formaulaire
            $sql = "INSERT INTO IdeesCampaign (campaign_id, ideesCampaign_id, ideesCampaign_name, ideesCampaign_des, ideesCampaign_points, user_id)
                        VALUES (:campaign_id, '', :ideesCampaign_name, :ideesCampaign_des, 0, :user_id)";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":campaign_id"=>$campaign_id, ":ideesCampaign_name"=>$ideesCampaign_name, 
                                            ":ideesCampaign_des"=>$ideesCampaign_des, ":user_id"=>$user_id));
            }

            
        public static function delIdee(){
            $pdoHelper = new PdoHelper();
            if(isset($_GET['supprimeIdee']) && !empty($_GET['supprimeIdee'])){
                $supprimeIdee = (int) $_GET['supprimeIdee'];

                $reqDelIdee = $pdoHelper->GetPDO()->prepare("DELETE FROM IdeesCampaign WHERE ideesCampaign_id= ?");
                $reqDelIdee -> execute(array($supprimeIdee));
            }
        }

        public static function updateIdee($campaign_id, $ideesCampaign_name, $ideesCampaign_des){
            $pdoHelper = new PdoHelper();
            $user_id = SessionHelper::GetIdUser();
            //Met à jour l'idée si celui qui à créé l'idée le souhaite
            $reqUpdateIdeaUser = $pdoHelper->GetPDO()->prepare("UPDATE `IdeesCampaign` 
                                                                    SET `ideesCampaign_name` = '$ideesCampaign_name', 
                                                                        `ideesCampaign_des` = '$ideesCampaign_des' 
                                                                            WHERE user_id = :user_id
                                                                                AND campaign_id = :campaign_id");
            $reqUpdateIdeaUser->execute(array(":user_id"=>$user_id, ":campaign_id"=>$campaign_id));
        }
    }
?>