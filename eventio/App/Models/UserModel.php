<?php
    class UserModel{
        public static function VerifUserAndPass($username, $passwd){
            $pdoHelper = new PdoHelper();

            $req1 = $pdoHelper->GetPDO()->prepare("SELECT * FROM userBase WHERE username = :username");
            $req1 -> execute(['username' => $username]);
            $verifUser = $req1 -> fetch();

            $req2 = $pdoHelper->GetPDO()->prepare("SELECT * FROM userBase WHERE passwd = :passwd");
            $req2 -> execute(['passwd' => $passwd]);
            $verifPasswd = $req2 -> fetch();

            //var_dump($result); //affiche le contenu de la requète

            if ($verifUser == true) //Le compte existe
            {
                if ($verifPasswd == true)
                {
                    
                }
                else 
                {
                    echo "Le mot de passe est incorrect, veuillez réessayer.";

                }
                //$hashpassword = $result['passwd'];
                //if (password_verify($passwd, $hashpassword))
                //{
                //    echo "Le mot de passe est correct, connexion en cours";
                //}
                //else
                //{
                //    echo "Le mot de passe est incorrect, veuillez réessayer.";
                //}
            }
            else 
            {
                echo "Le compte portant le nom d'utilisateur " .$username. " n'existe pas.";
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
                                                 "\n \n Votre identifiant: " . $username.
                                                 "\n \n Votre mot de passe: " . $passwd.
                                                 "\n \n Merci pour votre confiance à bientôt  \n" ;
            
            mail($email, $sujet, $txt);
        }
}
?>