<?php
    class UserModel{
        public static function VerifUserAndPass($username, $passwdHash){
            $pdoHelper = new PdoHelper();

            $req1 = $pdoHelper->GetPDO()->prepare("SELECT username, passwdHash 
                                                    FROM userBase 
                                                        WHERE username = :username
                                                                    AND passwdHash = :passwdHash");
            $req1 -> execute(array("username" => $username, ':passwdHash' => $passwdHash));
            $verifUserAndPass = $req1 -> fetch();

            $req2 = $pdoHelper->GetPDO()->prepare("SELECT roleUser
                                                    FROM userBase
                                                        WHERE username = :username");
            $req2 -> execute(array("username" => $username));
            $role = $req2 -> fetchAll();

            $req3 = $pdoHelper->GetPDO()->prepare("SELECT id
                                                    FROM userBase
                                                        WHERE username = :username");
            $req3 -> execute(array("username" => $username));
            $reqIdUser = $req3 -> fetchAll(); 

            //var_dump($result); //affiche le contenu de la requète

            if ($verifUserAndPass == true) //Le compte existe
            {
                    SessionHelper::SetUser($username);
                    SessionHelper::SetIdUser($idUser);
                    foreach($role as $roles)
                        {
                            $roleUser = $roles['roleUser'];
                            SessionHelper::SetRole($roleUser);
                        }
                    foreach($reqIdUser as $idUsers)
                    {
                        $idUser = $idUsers['id'];
                        SessionHelper::SetIdUser($idUser);
                    }   
                    
                    header('Location: ' . SITE_URL);
                    return;
                    echo "Juste !";
                }
            else 
            {
                echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        }
        public static function GeneratePassword() {
            $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $pass = array(); 
            $alphabetLength = strlen($alphabet) - 1; 
            for ($i = 0; $i < 10; $i++) {
                $passrand = rand(0, $alphabetLength);
                $pass[] = $alphabet[$passrand];
            }
            return implode($pass); 
        }
        
        public static function SendMail()
        {
            $email = $_POST['email'];
            $sujet = "Votre espace client E-event.io.";
            $mailto =$email;
            $txt = "Bienvenue sur E-event.io ! " +
                                                 "\n \n Voici votre identifiant : " . $username.
                                                 "\n \n Et votre mot de passe : " . $passwd.
                                                 "\n \n Merci pour votre confiance et à bientôt.  \n" ;
            
            mail($email, $sujet, $txt);
        }
}
?>