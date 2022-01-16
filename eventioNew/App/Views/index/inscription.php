<div class="blockform abs">
    <div class="inscription">
        <h1>S'inscrire</h1>
        <form action="<?= SITE_URL ?>?controller=index&action=inscription" method="post">
            <div class="align-form">
                <p>Prénom</p>
                <input type="text" name="surname" required>
                <p>Nom</p>
                <input type="text" name="name" required>
                <p>Adresse e-mail</p>
                <input type="email" name="email" required>
            </div>
            <br>
            <input type="checkbox">
            En cochant cette case, j'accepte les <a href="">conditions générales d'utilisation</a>
            <br> <br>
            <input class="sub" type="submit" value="Je m'inscris">
            <br><br>
            <a href="<?= SITE_URL ?>?controller=index&action=connexion">J'ai déjà un compte</a>
        </form>
    </div>
</div>