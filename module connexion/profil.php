<?php
session_start();
$conn = new mysqli("localhost", "root", "", "moduleconnexion");

if (!isset($_SESSION["login"])) {
    header("Location: connexion.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $password = $_POST["password"];

    if (!empty($password)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE utilisateurs SET prenom=?, nom=?, password=? WHERE login=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $prenom, $nom, $hash, $_SESSION["login"]);
    } else {
        $sql = "UPDATE utilisateurs SET prenom=?, nom=? WHERE login=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $prenom, $nom, $_SESSION["login"]);
    }
    $stmt->execute();
    echo "Profil mis à jour !";
}
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
    <title>Mon profil</title>
</head>
<body>
    <div class="container">
        <h2>Mon profil</h2>
        <form method="post">
            Prénom : <input type="text" name="prenom" value="<?= $_SESSION['prenom'] ?>"><br>
            Nom : <input type="text" name="nom" value="<?= $_SESSION['nom'] ?>"><br>
            Nouveau mot de passe (laisser vide si inchangé) : <input type="password" name="password"><br>
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
