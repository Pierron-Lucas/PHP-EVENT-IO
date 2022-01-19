<?php

class ConnexionController {
    //FONCTION ADD USER
    public static function addUser($surname, $name, $email){
        $pdoHelper = new pdoHelper();

        $username = strtolower($surname).'.'.strtolower($name);

        $reqVerifUser = $pdoHelper->GetPDO()->prepare("SELECT * FROM userBase WHERE user_username = :username");
        $reqVerifUser -> execute([':username' => $username]);
        $verifUser = $reqVerifUser -> fetch();
        $i = 0;
        if ($verifUser == true){
            ++$i;
            //Methode Count
            $username = $username.$i;

            //Génération du mot de passe aléatoirement
            $passwd = UserModel::GeneratePassword();

            //A des fins de simplicité nous avons fait ca en local et donc pas de hashage ni envoie de mail. Voici tout de meme notre facon de faire si nous devions l'implémenter
            $passwdHash = $passwd;
            
            //Envoie du mail
            //UserModel::SendMail();

            //Hashage du mot de passe pour plus de sécurité
            //$passwdHash = password_hash($passwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO userBase (`user_id`, user_surname, user_name, user_username, user_email, passwdHash, roleUser)
                VALUES ('', :surname, :name, :username, :email, :passwdHash, 'Utilisateur')";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":surname"=>$surname, ":name"=>$name, ":username"=>$username, ":email"=>$email, ":passwdHash"=>$passwdHash));
        }
        else{
            $passwd = UserModel::GeneratePassword();
            $passwdHash = $passwd;
            UserModel::SendMail();
            $passwdHash = password_hash($passwd, PASSWORD_BCRYPT);
            $sql = "INSERT INTO userBase (`user_id`, user_surname, user_name, user_username, user_email, passwdHash, roleUser)
            VALUES ('', :surname, :name, :username, :email, :passwdHash, 'Utilisateur')";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":surname"=>$surname, ":name"=>$name, ":username"=>$username, ":email"=>$email, ":passwdHash"=>$passwdHash));
        }
    }

    public static function delUser(){
        $pdoHelper = new PdoHelper();
        if(isset($_GET['supprimeId']) && !empty($_GET['supprimeId'])){
            $supprimeId = (int) $_GET['supprimeId'];

            $reqDelUser = $pdoHelper->GetPDO()->prepare("DELETE FROM userBase WHERE `user_id`= ?");
            $reqDelUser -> execute(array($supprimeId));
        }
    }
    
    public static function updateUser(){
        $pdoHelper = new PdoHelper();
        if(isset($_GET['idUser']) && !empty($_GET['idUser']) && isset($_GET['newRoleUser']) && !empty($_GET['newRoleUser'])){
            $idUser = (int) $_GET['idUser'];
            $newRoleUser = $_GET['newRoleUser'];

            $reqUpdateUser = $pdoHelper->GetPDO()->prepare("UPDATE userBase SET roleUser = :newRoleUser WHERE `user_id` = :idUser");
            
            $reqUpdateUser->bindParam(':newRoleUser', $newRoleUser);
            $reqUpdateUser->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $reqUpdateUser -> execute();
            header('Location: ' . SITE_URL . '?controller=index&action=administration');
                        return;
        }
    }
}
?>