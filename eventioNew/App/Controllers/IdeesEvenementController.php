<?php 
    class IdeesEvenementController {
        public static function addIdee($campaign_id, $ideesCampaign_name, $ideesCampaign_des){
            $pdoHelper = new pdoHelper();

            $sql = "INSERT INTO IdeesCampaign (campaign_id, ideesCampaign_id, ideesCampaign_name, ideesCampaign_des, ideesCampaign_points)
                        VALUES (:campaign_id, '', :ideesCampaign_name, :ideesCampaign_name, 0)";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":campaign_id"=>$campaign_id, ":ideesCampaign_name"=>$ideesCampaign_name, 
                                            ":ideesCampaign_des"=>$ideesCampaign_des));
            if ($exec){
                echo "Idée insérée";
            }
            else 
                echo 'Echec';
            }

            
        public static function delIdee(){
            $pdoHelper = new PdoHelper();
            if(isset($_GET['supprimeIdee']) && !empty($_GET['supprimeIdee'])){
                $supprimeIdee = (int) $_GET['supprimeIdee'];

                $reqDelIdee = $pdoHelper->GetPDO()->prepare("DELETE FROM IdeesCampaign WHERE ideesCampaign_id= ?");
                $reqDelIdee -> execute(array($supprimeIdee));
            }
        }

        /*public static function checkcampaing($campaign_begin, $campaign_end){
            $pdoHelper = new PdoHelper();
            if 
        }*/
    }
?>