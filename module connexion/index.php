<?php
session_start(); // On démarre la session pour savoir si quelqu’un est connecté
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <!-- === STYLES CSS === -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/inscription.css">
    <link rel="stylesheet" href="./assets/css/connexion.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/css/profil.css">
</head>
<body>
    <h1>Bienvenue sur mon site</h1>
    <p>Ceci est une page d’accueil simple.</p>
    
    <?php if (isset($_SESSION['login'])): ?>
        <p>Bonjour, <?= $_SESSION['login'] ?> !</p>

        <a href="profil.php">Mon profil</a>

        <?php if ($_SESSION['login'] === 'admin'): ?>

            <a href="admin.php">Administration</a>

        <?php endif; ?>

            <a href="logout.php">Déconnexion</a>

        <?php else: ?>
            <p>Vous n'êtes pas connecté.</p>
            <div class="links-connexion">

                <a href="inscription.php">Inscription</a>
                <a href="connexion.php">Connexion</a>
            </div>
        <?php endif; ?>

        <div class="image-container">
            <img src="./assets/images/OIP.webp" alt="photos" height="300px" width="300px" class="img">
        </div>


</body>
</html>
