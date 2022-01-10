<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
</head>
<body>
    <?php
    // Création de la db

    $db = 'mysql:host=sql480.main-hosting.eu;dbname=u697824263_eventIO;port=3306;charset=utf8';

    // Création et test de la connexion

    try {
 
    $pdo = new PDO($db, 'u697824263_adminEventIO' , 'No;WaC3TW4@');

    }
    catch (PDOException $exception) {
 
    exit('Erreur de connexion à la base de données </br>' . $exception->getMessage());
 
    }
    ?>
    <header>
        <div class="nav">
            <div class="logo">
               <a href="index.php"><img src="image/logo.png" alt=""></a>
            </div>
            <div class="nav-link">
                <a href="event.php"><i class="fas fa-calendar-check"></i>Evenements</a>
                <a href="connection.php"><i class="far fa-user-circle"></i>Connexion</a>
            </div>
        </div>
    </header>
        <div class="blockform abs">
            <div class="inscription">
                <h1>S'inscrire</h1>
                <form action="connection.php" method="post">
                    <div class="align-form">
                        <p>Prénom</p>
                        <input type="text" name="surname" required>
                        <p>Nom</p>
                        <input type="text" name="name" required>
                        <p>Nom d'utilisateur</p>
                        <input type="text" name="newUsername" required>
                        <p>Adresse e-mail</p>
                        <input type="email" name="email" required>
                        <p>Mot de passe</p>
                        <input type="password" name="newPassword" required>
                        <p>Confirmez votre mot de passe</p>
                        <input type="password" name="newPasswordConfirmed" required>
                    </div>
                        <input type="checkbox">
                        En cochant cette case, je valide les <a href="">conditions générales d'utilisations</a>
                    <br> <br>
                    <input class="sub" type="submit" value="Je m'inscris">
                </form>
            </div>
            <div class="separater"></div>
            <div class="connexion">
                <h1>Se connecter</h1>
                <form action="profil.php" method="post">
                    <div class="align-form">
                        <p> Nom d'utilisateur</p>
                        <input type="text" name="username" required>
                        <p> Mot de passe</p>
                        <input type="password" name="password" required>    
                    </div>
                    <br>
                    <input class="sub" type="submit" value="Connexion">
                </form>
                <div class="other-connect">
                    <p>Connectez-vous aussi via</p>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>

        <?php
        
        $sql = "INSERT INTO `userBase` (`id`, `prenom`, `nom`, `username`, `email`, `password`)
                VALUES ('', '$_POST[surname]', '$_POST[name]', '$_POST[newUsername]', '$_POST[email]', '$_POST[newPassword]')";

        $pdo->exec($sql);
        
        ?>

<!-- scripts -->
<script src="js/particles.js"></script>
<script src="js/app.js"></script>

</body>
</html>