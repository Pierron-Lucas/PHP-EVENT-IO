<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $html_head_title ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
</head>
<body>
    <header>
        <div class="nav">
            <div class="logo">
               <a href="<?= SITE_URL ?>"><img src="../image/logo.png" alt=""></a>
            </div>
            <div class="nav-link">
                <a href="<?= SITE_URL ?>?controller=index&action=evenement">Evenements</a>
                <?php if( SessionHelper::GetUser() != null && SessionHelper::GetRole() == "Administrateur") { ?>
                    <div class="no-responsive">
                        <a href="<?= SITE_URL ?>?controller=index&action=administration">Administration</a>
                    </div>
                   
                <?php } ?>
                <?php if( SessionHelper::GetUser() == null ) { ?>
                    <a href="<?= SITE_URL ?>?controller=index&action=connexion">Connexion</a>
                <?php } ?>
                <?php if( SessionHelper::GetUser() != null ) { ?>
                    <a href="<?= SITE_URL ?>?controller=index&action=deconnexion">Deconnexion</a>
                <?php } ?>
            </div>
        </div>
    </header>
    <?php echo $this->content ?>
    <div id="particles-js"></div>
    <script src="../js/particles.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>