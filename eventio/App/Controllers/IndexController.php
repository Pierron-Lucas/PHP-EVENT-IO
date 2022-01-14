<?php

    class IndexController {

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
            $viewHelper = new ViewHelper();
            return $viewHelper->RenderView(
                $this,
                'Evenement',
                array(
                    'html_head_title' => 'Evenement'
                )
            );
            
        }

        public function Connexion() {
            if( $_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = isset($_POST['username']) ? $_POST['username'] : null;
                $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : null;

                $user = UserModel::VerifUserAndPass($username, $passwd);
                SessionHelper::SetUser($user);
                header('Location: ' . SITE_URL);
                return;
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

                $reqVerifEmail = $pdoHelper->GetPDO()->prepare("SELECT * FROM userBase WHERE email = :email");
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