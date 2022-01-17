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

        public static function updateIdee($ideesCampaign_id, $ideesCampaign_name = NULL, $ideesCampaign_des = NULL, $ideesCampaign_points = NULL) {

            $pdoHelper = new PdoHelper();

            if ($ideesCampaign_name == NULL) {
                $res1 = $pdoHelper->GetPDO()->prepare("SELECT ideesCampaign_name FROM IdeesCampaign WHERE ideesCampaign_id = :ideesCampaign_id");
                $res1->execute(array(":ideesCampaign_id"=>$ideesCampaign_id));
                $ideesCampaign_name = $res1 -> fetch();
            }
            if ($ideesCampaign_des == NULL) {
                $res2 = $pdoHelper->GetPDO()->prepare("SELECT ideesCampaign_des FROM IdeesCampaign WHERE ideesCampaign_id = :ideesCampaign_id");
                $res2->execute(array(":ideesCampaign_id"=>$ideesCampaign_id,));
                $ideesCampaign_des = $res2 -> fetch();
            }

            if ($ideesCampaign_points == NULL) {
                $res3 = $pdoHelper->GetPDO()->prepare("SELECT ideesCampaign_points FROM IdeesCampaign WHERE ideesCampaign_id = :ideesCampaign_id");
                $res3->execute(array(":ideesCampaign_id"=>$ideesCampaign_id));
                $ideesCampaign_points = $res3 -> fetch();
            }
            
            $sql = "UPDATE IdeesCampaign SET ideesCampaign_name = :ideesCampaign_name, ideesCampaign_des = :ideesCampaign_des, ideesCampaign_points = :ideesCampaign_points
            WHERE ideesCampaign_id = :ideesCampaign_id";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":ideesCampaign_name"=>$ideesCampaign_name, ":ideesCampaign_des"=>$ideesCampaign_des,
            ":ideesCampaign_points"=>$ideesCampaign_points, ":ideesCampaign_id"=>$ideesCampaign_id));
            if ($exec){
                echo "Idée modifié";
            }
            else {
                echo 'Echec';
            }
        }
    }
?>