<?php
    class PalierModel{
        public static function Verifpoints($ideesCampaign_id, $points) {

            $pdoHelper = new PdoHelper();

            $req = $pdoHelper->GetPDO()->prepare("SELECT MAX(palier_number) FROM Palier WHERE ideesCampaign_id = :ideesCampaign_id");
            $req -> execute(array(":ideesCampaign_id"=>$ideesCampaign_id));
            $palier_numbermax = $req -> fetch();
            if ($palier_numbermax == NULL) return;
            else {
                for ($palier_number = 1; $palier_number <= $palier_numbermax; $palier_number += 1) {
                    $sql = $pdoHelper->GetPDO()->prepare("SELECT palier_points FROM Palier WHERE ideesCampaign_id = :ideesCampaign_id AND palier_number = :palier_number");
                    $sql -> execute(array(":ideesCampaign_id"=>$ideesCampaign_id, ":palier_number"=>$palier_number));
                    $palier_points = $sql -> fetch();
                    if ($points >= $palier_points) {
                        PalierController::updatePalier($ideesCampaign_id, $palier_number, NULL, NULL, 1);
                    }
                }
            }
        }
    }
?>