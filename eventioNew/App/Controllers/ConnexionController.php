<?php

class ConnexionController {
    
    public static function addUser($surname, $name, $email){
        $pdoHelper = new pdoHelper();

        $username = strtolower($surname).'.'.strtolower($name);

        $reqVerifUser = $pdoHelper->GetPDO()->prepare("SELECT * FROM userBase WHERE username = :username");
        $reqVerifUser -> execute(['username' => $username]);
        $verifUser = $reqVerifUser -> fetch();
        $i = 0;
        if ($verifUser == true){
            ++$i;
            //Methode Count
            $username = $username.$i;

            $passwd = UserModel::GeneratePassword();
            $passwdHash = $passwd;
            //$passwdHash = password_hash($passwd, PASSWORD_DEFAULT);
            //UserModel::SendMail();
            $sql = "INSERT INTO userBase (id, prenom, nom, username, email, passwdHash, role)
                VALUES ('', :surname, :name, :username, :email, :passwdHash, 'Utilisateur')";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":surname"=>$surname, ":name"=>$name, ":username"=>$username, ":email"=>$email, ":passwdHash"=>$passwdHash));
        
            if ($exec){
                echo 'Donnees insérées'; 
            }
            else 
                echo 'Echec';
            }
        else{
            $passwd = UserModel::GeneratePassword();
            $passwdHash = $passwd;
            //UserModel::SendMail();
            //$passwdHash = password_hash($passwd, PASSWORD_BCRYPT);
            $sql = "INSERT INTO userBase (id, prenom, nom, username, email, passwdHash, roleUser)
            VALUES ('', :surname, :name, :username, :email, :passwdHash, 'Utilisateur')";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":surname"=>$surname, ":name"=>$name, ":username"=>$username, ":email"=>$email, ":passwdHash"=>$passwdHash));
    
            if ($exec){
                echo 'Donnees insérées';
            }
            else 
                echo 'Echec';
            }
        }

    public static function delUser(){
        $pdoHelper = new PdoHelper();
        if(isset($_GET['supprimeId']) && !empty($_GET['supprimeId'])){
            $supprimeId = (int) $_GET['supprimeId'];

            $reqDelUser = $pdoHelper->GetPDO()->prepare("DELETE FROM userBase WHERE id= ?");
            $reqDelUser -> execute(array($supprimeId));
        }
    }
    
    public static function updateUser(){
        $pdoHelper = new PdoHelper();
        if(isset($_GET['idUser']) && !empty($_GET['idUser']) && isset($_GET['newRoleUser']) && !empty($_GET['newRoleUser'])){
            $idUser = (int) $_GET['idUser'];
            $newRoleUser = $_GET['newRoleUser'];

            $reqUpdateUser = $pdoHelper->GetPDO()->prepare("UPDATE userBase SET roleUser = :newRoleUser WHERE id = :idUser");
            
            $reqUpdateUser->bindParam(':newRoleUser', $newRoleUser);
            $reqUpdateUser->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $reqUpdateUser -> execute();
        }
    }
}
?>