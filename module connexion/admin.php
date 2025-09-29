<?php
session_start();
$conn = new mysqli("localhost", "root", "", "moduleconnexion");

if ($_SESSION["login"] !== "admin") {
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM utilisateurs");
?>
<!DOCTYPE html>
<html>
    <head>
            <!-- === STYLES CSS === -->
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/inscription.css">
        <link rel="stylesheet" href="./assets/css/connexion.css">
        <link rel="stylesheet" href="./assets/css/admin.css">
        <link rel="stylesheet" href="./assets/css/profil.css">

        <title>Administration</title>
    </head>

    <body>
        <h2>Gestion des utilisateurs</h2>
        <table border="1">
        <tr>
            <th>ID</th><th>Login</th><th>Prénom</th><th>Nom</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["login"] ?></td>
                <td><?= $row["prenom"] ?></td>
                <td><?= $row["nom"] ?></td>
            </tr>
        <?php endwhile; ?>
        </table>
    </body>
</html>
