<?php 
    class EvenementController {
        public static function addEvent($campaign_name, $campaign_des, $campaign_begin, $campaign_end, $pointsAtt){
            $pdoHelper = new pdoHelper();
            //Ajoute une campagne dans la base de données avec les attributs rempli par le formaulaire
            $sql = "INSERT INTO Campaign (campaign_id, campaign_name, campaign_des, campaign_begin, campaign_end, campaign_pointsAtt)
                        VALUES ('', :campaign_name, :campaign_des, :campaign_begin, :campaign_end, :pointsAtt)";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":campaign_name"=>$campaign_name, ":campaign_des"=>$campaign_des, 
                                            ":campaign_begin"=>$campaign_begin, ":campaign_end"=>$campaign_end, 
                                                ":pointsAtt"=>$pointsAtt));
            }

            
        public static function delEvent(){
            $pdoHelper = new PdoHelper();
            //Supprime une evenement via la table d'administration
            if(isset($_GET['supprimeEvent']) && !empty($_GET['supprimeEvent'])){
                $supprimeEvent = (int) $_GET['supprimeEvent'];

                $reqDelIdea = $pdoHelper->GetPDO()->prepare("DELETE FROM IdeesCampaign WHERE campaign_id= ?");
                $reqDelIdea -> execute(array($supprimeEvent));

                $reqDelEvent = $pdoHelper->GetPDO()->prepare("DELETE FROM Campaign WHERE campaign_id= ?");
                $reqDelEvent -> execute(array($supprimeEvent));
            }
        }
}
?>