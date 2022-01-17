<?php
    class IdeesEvenementModel{
        public static function AddPoint($ideesCampaign_id, $points)
        {
            $pdoHelper = new PdoHelper();

            $sql = "SELECT IdeesCampaign_points FROM IdeesCampaign WHERE ideesCampaign_id = :ideesCampaign_id";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $res->execute(array(":ideesCampaign_id"=>$ideesCampaign_id));
            $points += $res -> fetch();

            IdeesEvenementController::updateIdee($ideesCampaign_id, NULL, NULL, $points);
            PalierModel::Verifpoints($ideesCampaign_id, $points);
        }
    }
?>