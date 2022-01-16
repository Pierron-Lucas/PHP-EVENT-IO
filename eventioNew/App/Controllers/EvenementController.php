<?php 
    class EvenementController {
        public static function addEvent($campaign_name, $campaign_des, $campaign_begin, $campaign_end, $pointsAtt){
            $pdoHelper = new pdoHelper();

            $sql = "INSERT INTO Campaign (campaign_id, campaign_name, campaign_des, campaign_begin, campaign_end, pointsAtt)
                        VALUES ('', :campaign_name, :campaign_des, :campaign_begin, :campaign_end, :pointsAtt)";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":campaign_name"=>$campaign_name, ":campaign_des"=>$campaign_des, 
                                            ":campaign_begin"=>$campaign_begin, ":campaign_end"=>$campaign_end, 
                                                ":pointsAtt"=>$pointsAtt));
            if ($exec){}
            else 
                echo 'Echec';
            }

            
        public static function delEvent(){
            $pdoHelper = new PdoHelper();
            if(isset($_GET['supprimeEvent']) && !empty($_GET['supprimeEvent'])){
                $supprimeEvent = (int) $_GET['supprimeEvent'];

                $reqDelEvent = $pdoHelper->GetPDO()->prepare("DELETE FROM Campaign WHERE campaign_id= ?");
                $reqDelEvent -> execute(array($supprimeEvent));
            }
        }

        public static function addUserInCampaign(){
            $pdoHelper = new PdoHelper();

            if ($_GET['campaignAction'] == "rejoin" && isset($_GET['campaignAction']) && !empty($_GET['campaignAction'])){
                $campaignId = $_GET['campaign_id'];
                $userId = SessionHelper::GetIdUser();

                $sql = $pdoHelper->GetPDO()->prepare("SELECT * FROM Campaign WHERE campaign_id = :campaign_id");
                $sql -> execute(array(":campaign_id"=>$campaignId));
                $campaignPoints = $sql -> fetchAll();

                foreach($campaignPoints as $tableCampaignPoints){
                    $pointsEvent = $tableCampaignPoints['pointsAtt'];
                    SessionHelper::SetPointEvent($pointsEvent);
                }
                    $pointsUser = SessionHelper::GetPointEvent();
                    $reqSql = "INSERT INTO UserPoint (user_id, campaign_id, pointsUser) 
                                VALUES (:userId, :campaignId, :pointsUser)";
                    $reqAddUserInCampaign = $pdoHelper->GetPDO()->prepare($reqSql);
                    $addUserInCampaign = $reqAddUserInCampaign->execute(array(":userId"=>$userId,":campaignId"=>$campaignId, ":pointsUser" => $pointsUser));
                    if ($addUserInCampaign){}
                    else 
                        echo 'Echec';
        }

        /*public static function checkcampaing($campaign_begin, $campaign_end){
            $pdoHelper = new PdoHelper();
            if 
        }*/
    }
}
?>