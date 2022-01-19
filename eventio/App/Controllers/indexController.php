<?php

    class IndexController {

        //CREATION D'UNE VUE POUR CHAQUE PAGE

            public function Index() {
            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'Index',
                array(
                    'html_head_title' => 'Accueil'
                )
            );
            
        }
        
        public function Evenement() {
            if( $_SERVER['REQUEST_METHOD'] === 'POST') {
                if ($_GET['campaignAction'] == "rejoin"){
                    if (SessionHelper::GetUser() !== null && SessionHelper::GetRole() == "Donateur"){
                        EvenementModel::addUserInCampaign();
                       /* header('Location: ' . SITE_URL . '?controller=index&action=evenement&campaign_id='.$_GET['campaign_id'].'&campaignAction=rejoin');
                        return;*/
                    }
                }
            }

            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'Evenement',  
                array(    
                    'html_head_title' => 'Nos evenements'
                )
            );
            
        }

        public function CreateEvenement() {
            if( $_SERVER['REQUEST_METHOD'] === 'POST') {
                $campaign_name = isset($_POST['campaign_name']) ? $_POST['campaign_name'] : null;
                $campaign_des = isset($_POST['campaign_des']) ? $_POST['campaign_des'] : null;
                $campaign_begin = isset($_POST['campaign_begin']) ? $_POST['campaign_begin'] : null;
                $campaign_end = isset($_POST['campaign_end']) ? $_POST['campaign_end'] : null;
                $pointsAtt = isset($_POST['pointsAtt']) ? $_POST['pointsAtt'] : null;
                
                EvenementController::addEvent($campaign_name, $campaign_des, $campaign_begin, $campaign_end, $pointsAtt);
            }

            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'CreateEvenement',
                array(
                    'html_head_title' => 'Crée son évènement'
                )
            );
        }

        public function IdeesEvenement(){
            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'IdeesEvenement',
                array(
                    'html_head_title' => 'Idées d\'évènement'
                )
            );
        }

        public function DonationIdeesEvenement(){
            if( $_SERVER['REQUEST_METHOD'] === 'POST') {
                $nbPoint = isset($_POST['pointsAtt']) ? $_POST['pointsAtt'] : null;
                
                IdeaModel::addPointIdea($nbPoint);
            }
            
            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'DonationIdeesEvenement',
                array(
                    'html_head_title' => 'Donation pour une idée'
                )
            );
        }

        public function CreateIdeesEvenement(){
            if( $_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $pdoHelper = new pdoHelper();
                $campaign_id = $_GET['campaign_id'];
                $user_id = SessionHelper::GetIdUser();
        
                $reqIdeaUserExist = $pdoHelper->GetPDO()->prepare("SELECT * FROM IdeesCampaign WHERE user_id = :user_id
                                                                                                    AND campaign_id = :campaign_id");
                $reqIdeaUserExist -> execute(array(":user_id"=>$user_id, "campaign_id"=>$campaign_id));
                $ideaUserExist = $reqIdeaUserExist -> fetchAll();

                $ideesCampaign_name = isset($_POST['ideesCampaign_name']) ? $_POST['ideesCampaign_name'] : null;
                    $ideesCampaign_des = isset($_POST['ideesCampaign_des']) ? $_POST['ideesCampaign_des'] : null;
                    $campaign_id = isset($_GET['campaign_id']) ? $_GET['campaign_id'] : null;

                if($ideaUserExist == false){
                    IdeesEvenementController::addIdee($campaign_id, $ideesCampaign_name, $ideesCampaign_des);
                }
                
                else{
                    IdeesEvenementController::updateIdee($campaign_id, $ideesCampaign_name, $ideesCampaign_des);
                }
            }


            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'CreateIdeesEvenement',
                array(
                    'html_head_title' => 'Crée son idée d\'évènement'
                )
            );
        }

        public function Administration(){
            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'Administration',
                array(
                    'html_head_title' => 'Administration'
                )
            );
        }

        public function Connexion() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = isset($_POST['username']) ? $_POST['username'] : null;
                $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : null;
                //$passwdHash = password_hash($passwd, PASSWORD_DEFAULT);
                $passwdHash = $passwd;

                UserModel::VerifUserAndPass($username, $passwdHash);
            }

            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'Connexion',
                array(
                    'html_head_title' => 'Connexion'
                )
            );
        }

        public function Inscription(){
            if( $_SERVER['REQUEST_METHOD'] === 'POST'){
                $surname = isset($_POST['surname']) ? $_POST['surname'] : null;
                $name = isset($_POST['name']) ? $_POST['name'] : null;
                $email = isset($_POST['email']) ? $_POST['email'] : null;

                $pdoHelper = new PdoHelper();

                $reqVerifEmail = $pdoHelper->GetPDO()->prepare("SELECT * FROM userBase WHERE user_email = :email");
                $reqVerifEmail -> execute(['email' => $email]);
                $verifEmail = $reqVerifEmail -> fetch();

                if ($verifEmail == true){
                    echo "Adresse email existante";
                }
                else{
                    ConnexionController::addUser($surname, $name, $email);
                }
            }
            
            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'Inscription',
                array(
                    'html_head_title' => 'Inscription'
                )
            );
        }
    
        public function Deconnexion() {
            SessionHelper::UnsetUser();
            header('Location: ' . SITE_URL);
            return;
        }
}   
?>