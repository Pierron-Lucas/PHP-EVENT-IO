<div class="blockform abs">
    <div class="connexion">
        <h1>Se connecter</h1>
        <form action="<?= SITE_URL ?>?controller=index&action=connexion" method="post">
            <div class="align-form">
                <p> Nom d'utilisateur</p>
                <input type="text" name="username" required>
                <p> Mot de passe</p>
                <input type="password" name="passwd" required>    
            </div>
            <br>
            <input class="sub" type="submit" value="Connexion">
        </form>
        <div class="other-connect">
            <p>Connectez-vous aussi via</p>
            <br>
            <a href="<?= SITE_URL ?>?controller=index&action=inscription">Je n'ai pas de compte</a>
        </div>
    </div>
</div>
<div id="particles-js"></div>
<script src="../js/particles.js"></script>
<script src="../js/app.js"></script>