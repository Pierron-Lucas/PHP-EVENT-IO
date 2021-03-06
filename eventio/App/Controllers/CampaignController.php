<?php
    class CampaignController {

        public static function AddCampaign($date_debut, $date_fin, $description)
        {
            try {
                $pdoHelper = new pdoHelper();
            }
            catch (PDOException $exception) {
         
                exit('Erreur de connexion à la base de données </br>' . $exception->getMessage());  
            };
            // On récupère le droit de l'utilisateur
            $user_right = $pdoHelper->GetPDO()->prepare("SELECT user_right FROM User WHERE User.user_username = :username");
            $user_right -> execute(['user_right' => $user_right]);
    
            // Selon le droit on peut créer une campagne
            if ($user_right > 0) {
                $sql = "INSERT INTO Campaign (campaign_id, campaign_begin, campaign_end, campaign_description)
                VALUES ('', :debut, :fin, :descript)";
                $res = $pdoHelper->GetPDO()->prepare($sql);
                $exec = $res->execute(array(":debut"=>$date_debut, ":fin"=>$date_fin, ":descript"=>$description));
                    if ($exec) {
                        echo 'Donnees insérées';
                    }
                    else {
                        echo 'Echec';
                    }
            }
        }

        public static function DelCampaign($campaign_id)
        {
            try {
                $pdoHelper = new pdoHelper();
            }
            catch (PDOException $exception) {
         
                exit('Erreur de connexion à la base de données </br>' . $exception->getMessage());  
            };
            // On récupère le droit de l'utilisateur
            $user_right = $pdoHelper->GetPDO()->prepare("SELECT user_right FROM User WHERE User.user_username = :username");
            $user_right -> execute(['user_right' => $user_right]);
    
            // Selon le droit on peut supprimer une campagne
            if ($user_right > 0) {
                $sql = "DELETE FROM Campaign WHERE Campaign.campaign_id = $campaign_id";
                $res = $pdoHelper->GetPDO()->prepare($sql);
                $exec = $res->execute();
                    if ($exec) {
                        echo 'Donnees insérées';
                    }
                    else {
                        echo 'Echec';
                    }
            }
        }

        public static function UpdateCampaign($campaign_id, $date_debut = NULL, $date_fin = NULL, $description = NULL)
        {
            try {
                $pdoHelper = new pdoHelper();
            }
            catch (PDOException $exception) {
         
                exit('Erreur de connexion à la base de données </br>' . $exception->getMessage());  
            };
            // On récupère le droit de l'utilisateur
            $user_right = $pdoHelper->GetPDO()->prepare("SELECT user_right FROM User WHERE User.user_username = :username");
            $user_right -> execute(['user_right' => $user_right]);
    
            // Selon le droit on peut modifier une campagne
            if ($user_right > 0) {

                if ($date_debut == NULL) {
                    $date_debut = $pdoHelper->GetPDO()->prepare("SELECT campaign_begin FROM Campaign WHERE Campaign.campaign_id = $campaign_id");
                    $date_debut -> execute(['campaign_begin' => $date_debut]);
                }
                if ($date_fin == NULL) {
                    $date_fin = $pdoHelper->GetPDO()->prepare("SELECT campaign_end FROM Campaign WHERE Campaign.campaign_id = $campaign_id");
                    $date_fin -> execute(['campaign_end' => $date_fin]);
                }
                if ($description == NULL) {
                    $description = $pdoHelper->GetPDO()->prepare("SELECT campaign_description FROM Campaign WHERE Campaign.campaign_id = $campaign_id ");
                    $description -> execute(['campaign_description' => $description]);
                }

                $sql = "UPDATE FROM Campaign SET campaign_begin = $date_debut, campaign_end = $date_fin, campaign_description = $description WHERE Campaign.campaign_id = $campaign_id";
                $res = $pdoHelper->GetPDO()->prepare($sql);
                $exec = $res->execute();
                    if ($exec) {
                        echo 'Donnees insérées';
                    }
                    else {
                        echo 'Echec';
                    }
            }
        }
    }
?>