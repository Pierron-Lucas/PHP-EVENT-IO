<?php
    class EvenementModel{
        public static function addUserInCampaign(){
            $pdoHelper = new PdoHelper();

            //Ajout d'un donateur dans une campgne si il souhaite la rejoindre

            if ($_GET['campaignAction'] == "rejoin" && isset($_GET['campaignAction']) && !empty($_GET['campaignAction'])){
                $campaignId = $_GET['campaign_id'];
                $userId = SessionHelper::GetIdUser();

                $sql = $pdoHelper->GetPDO()->prepare("SELECT * FROM Campaign WHERE campaign_id = :campaign_id");
                $sql -> execute(array(":campaign_id"=>$campaignId));
                $campaignPoints = $sql -> fetchAll();

                foreach($campaignPoints as $tableCampaignPoints){
                    $pointsEvent = $tableCampaignPoints['campaign_pointsAtt'];
                    SessionHelper::SetPointEvent($pointsEvent);
                }
                    $pointsUser = SessionHelper::GetPointEvent();
                    $reqSql = "INSERT INTO UserPoint (`user_id`, campaign_id, pointsUser) 
                                VALUES (:userId, :campaignId, :pointsUser)";
                    $reqAddUserInCampaign = $pdoHelper->GetPDO()->prepare($reqSql);
                    $addUserInCampaign = $reqAddUserInCampaign->execute(array(":userId"=>$userId,":campaignId"=>$campaignId, ":pointsUser" => $pointsUser));        
            }
        }
    }
?>