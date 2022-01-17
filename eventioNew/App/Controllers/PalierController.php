<?php
    class PalierController {
        
        public static function addPalier($ideesCampaign_id, $palier_desc, $palier_points) {
            
            $pdoHelper = new pdoHelper();

            $req = $pdoHelper->GetPDO()->prepare("SELECT MAX(palier_number) FROM Palier WHERE ideesCampaign_id = :ideesCampaign_id");
            $req -> execute(array(":ideesCampaign_id"=>$ideesCampaign_id));
            $palier_number = $req -> fetch();
            // Determine le numero de palier
            if ($palier_number == NULL) $palier_number = 1;
            else {
                // Regarde que le nouveau palier n'ait pas un nombre de points inferieur au palier précédent
                $req2 = $pdoHelper->GetPDO()->prepare("SELECT palier_points FROM Palier WHERE ideesCampaign_id = :ideesCampaign_id AND palier_number = :palier_number");
                $req2 -> execute(array(":ideesCampaign_id"=>$ideesCampaign_id, ":palier_number"=>$palier_number));
                $palier_pointsMin = $req2 -> fetch();
                if ($palier_points <= $palier_pointsMin) return;
                $palier_number += 1;
            }
            $sql = "INSERT INTO Palier (ideesCampaign_id, palier_number, palier_description, palier_points, palier_unlock)
                        VALUES (:ideesCampaign_id, :palier_number, :palier_desc, :palier_points,'')";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":ideesCampaign_id"=>$ideesCampaign_id, ":palier_number"=>$palier_number, ":palier_desc"=>$palier_desc, 
                                            ":palier_points"=>$palier_points));
            if ($exec){
                echo "Nouveau palier inséré";
            }
            else {
                echo 'Echec';
            }
        }
        
        public static function updatePalier($ideesCampaign_id, $palier_number, $palier_desc = NULL, $palier_points = NULL, $palier_unlock = NULL) {
            
            $pdoHelper = new pdoHelper();

            if ($palier_desc == NULL) {
                $res1 = $pdoHelper->GetPDO()->prepare("SELECT palier_description FROM Palier WHERE ideesCampaign_id = :ideesCampaign_id AND palier_number = :palier_number ");
                $res1->execute(array(":ideesCampaign_id"=>$ideesCampaign_id, ":palier_number"=>$palier_number));
                $palier_desc = $res1 -> fetch();
            }

            if ($palier_points == NULL) {
                $res2 = $pdoHelper->GetPDO()->prepare("SELECT palier_points FROM Palier WHERE ideesCampaign_id = :ideesCampaign_id AND palier_number = :palier_number ");
                $res2->execute(array(":ideesCampaign_id"=>$ideesCampaign_id, ":palier_number"=>$palier_number));
                $palier_desc = $res2 -> fetch();
            }
            // Regarde que le palier modifié n'ait pas un nombre de points inferieur au palier précédent
            else {
                if($palier_number > 1) {
                    $req2bis = $pdoHelper->GetPDO()->prepare("SELECT palier_points FROM Palier WHERE ideesCampaign_id = :ideesCampaign_id AND palier_number = :palier_number");
                    $req2bis ->execute(array(":ideesCampaign_id"=>$ideesCampaign_id, ":palier_number"=>$palier_number));
                    $palier_pointsMin = $req2bis -> fetch();
                    if ($palier_points <= $palier_pointsMin) return;
                }
            }

            if ($palier_unlock == NULL) {
                $res3 = $pdoHelper->GetPDO()->prepare("SELECT palier_unlock FROM Palier WHERE ideesCampaign_id = :ideesCampaign_id AND palier_number = :palier_number ");
                $res3->execute(array(":ideesCampaign_id"=>$ideesCampaign_id, ":palier_number"=>$palier_number));
                $palier_desc = $res3 -> fetch();
            }

            $sql = "UPDATE Palier SET palier_desc = :palier_desc, palier_points = :palier_points, palier_unlock = :palier_unlock
            WHERE ideesCampaign_id = :ideesCampaign_id AND palier_number = :palier_number";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":palier_desc"=>$palier_desc, ":palier_points"=>$palier_points, "palier_unlock"=>$palier_unlock,":ideesCampaign_id"=>$ideesCampaign_id, ":palier_number"=>$palier_number));
            if ($exec){
                echo "Palier modifié";
            }
            else {
                echo 'Echec';
            }
        }
    }
?>