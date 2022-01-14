 <?php

class ConnexionController {
    
    public static function addUser($surname, $name, $email){
        try {
 
            $pdoHelper = new pdoHelper();
        
        }
        catch (PDOException $exception) {
         
        exit('Erreur de connexion à la base de données </br>' . $exception->getMessage());
         
        }

        $username = strtolower($surname).'.'.strtolower($name);

        $reqVerifUser = $pdoHelper->GetPDO()->prepare("SELECT * FROM userBase WHERE username = :username");
        $reqVerifUser -> execute(['username' => $username]);
        $verifUser = $reqVerifUser -> fetch();
        $i = 0;
        if ($verifUser == true){
            ++$i;
            $username = $username.$i;

            $passwd = UserModel::GeneratePassword();
            //UserModel::SendMail();
            $sql = "INSERT INTO userBase (id, prenom, nom, username, email, passwd)
                VALUES ('', :surname, :name, :username, :email, :passwd)";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":surname"=>$surname, ":name"=>$name, ":username"=>$username, ":email"=>$email, ":passwd"=>$passwd));
        
            if ($exec){
                echo 'Donnees insérées';
            }
            else 
                echo 'Echec';
            }
        else{
            $passwd = UserModel::GeneratePassword();
            //UserModel::SendMail();
            $sql = "INSERT INTO userBase (id, prenom, nom, username, email, passwd)
            VALUES ('', :surname, :name, :username, :email, :passwd)";
            $res = $pdoHelper->GetPDO()->prepare($sql);
            $exec = $res->execute(array(":surname"=>$surname, ":name"=>$name, ":username"=>$username, ":email"=>$email, ":passwd"=>$passwd));
    
            if ($exec){
                echo 'Donnees insérées';
            }
            else 
                echo 'Echec';
            }
        }
    public static function delUser($username){

    }
    
    public static function updateUser($username){
    
    }
}
?>